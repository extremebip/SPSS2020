<?php

namespace App\Service\Modules;

use App\Model\DB\Jawaban;
use App\Model\Lookups\Tahap;
use App\Model\Lookups\Timeline;
use App\Model\Lookups\KodeFile;
use App\Service\Contracts\ILombaService;
use App\Repository\Contracts\IJawabanRepository;
use App\Repository\Contracts\ITimelineRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LombaService implements ILombaService
{
    private $jawabanRepository;

    private $timelineRepository;

    private $folderJawabanTahap = [
        Tahap::TAHAP_1 => 'tahap-1',
        Tahap::TAHAP_2 => 'tahap-2',
        Tahap::TAHAP_3 => 'tahap-3',
    ];

    public function __construct(
        IJawabanRepository $jawabanRepository,
        ITimelineRepository $timelineRepository
    ) {
        $this->jawabanRepository = $jawabanRepository;
        $this->timelineRepository = $timelineRepository;
    }

    public function GetJawabanByPesertaAndTahap($peserta_id, $tahap_id)
    {
        return $this->jawabanRepository->FindByPesertaAndTahap($peserta_id, $tahap_id);
    }

    public function SubmitAnswer($data)
    {
        $peserta = $data['peserta'];
        $tahap_id = $peserta->tahap_id;
        $file = $data['FileSubmit'];
        $storedFileName = sprintf("%s-%d-%s.%s"
            , $peserta->KodePeserta
            , $tahap_id - 1
            , (string) Str::uuid()
            , $file->extension()
        );

        $directories = collect(Storage::directories('peserta/'.$peserta->KodePeserta));
        $folderJawaban = join('/', [
            'peserta',
            $peserta->KodePeserta,
            $this->folderJawabanTahap[$tahap_id]
        ]);
        if(!$directories->contains($folderJawaban)){
            Storage::makeDirectory($folderJawaban);
        }

        $existingAnswer = $this->jawabanRepository->FindByPesertaAndTahap($peserta->id, $tahap_id);
        if (!is_null($existingAnswer)){
            $file_path = storage_path(join('\\', [
                'app\peserta',
                $peserta->KodePeserta,
                $this->folderJawabanTahap[$tahap_id],
                $existingAnswer->FileSubmit
            ]));
            if (File::exists($file_path)){
                Storage::delete($folderJawaban.'/'.$existingAnswer->FileSubmit);
            }
        }

        Storage::putFileAs($folderJawaban, $file, $storedFileName);
        
        if (!is_null($existingAnswer))
            $jawaban = $existingAnswer;
        else
            $jawaban = new Jawaban();
        
        $jawaban->peserta_id = $peserta->id;
        $jawaban->tahap_id = $tahap_id;
        $jawaban->FileSubmit = $storedFileName;
        $jawaban->FileName = $file->getClientOriginalName();
        $jawaban->WaktuSubmit = Carbon::now();

        $this->jawabanRepository->InsertUpdate($jawaban);
    }

    public function FinaliseAnswer($peserta_id, $tahap_id)
    {
        $jawaban = $this->jawabanRepository->FindByPesertaAndTahap($peserta_id, $tahap_id);
        $jawaban->WaktuFinalisasi = Carbon::now();
        $this->jawabanRepository->InsertUpdate($jawaban);
    }

    public function CheckDownloadEligibility($peserta, $kodeFile)
    {
        $mapAllowedKodeFileWithTahap = [
            KodeFile::PANDUAN_TAHAP_1 => Tahap::TAHAP_1,
            KodeFile::SOAL_TAHAP_1 => Tahap::TAHAP_1,
            KodeFile::PANDUAN_TAHAP_2 => Tahap::TAHAP_2,
            KodeFile::SOAL_TAHAP_2 => Tahap::TAHAP_2,
            KodeFile::PANDUAN_TAHAP_3 => Tahap::TAHAP_3,
            KodeFile::SOAL_TAHAP_3 => Tahap::TAHAP_3,
        ];

        $mapAllowedKodeFileWithTimeline = [
            KodeFile::PANDUAN_TAHAP_1 => [
                'min-lesser' => Timeline::AWAL_PENDAFTARAN, 
                'max-greater' => Timeline::AWAL_TAHAP_1
            ],
            KodeFile::SOAL_TAHAP_1 => [
                'min-lesser' => Timeline::AWAL_TAHAP_1, 
                'max-greater' => Timeline::AKHIR_TAHAP_1
            ],
            KodeFile::PANDUAN_TAHAP_2 => [
                'min-lesser' => Timeline::PENGUMUMAN_TAHAP_1, 
                'max-greater' => Timeline::AWAL_TAHAP_2
            ],
            KodeFile::SOAL_TAHAP_2 => [
                'min-lesser' => Timeline::AWAL_TAHAP_2, 
                'max-greater' => Timeline::AKHIR_TAHAP_2
            ],
            KodeFile::PANDUAN_TAHAP_3 => [
                'min-lesser' => Timeline::PENGUMUMAN_TAHAP_2, 
                'max-greater' => Timeline::AWAL_PENGERJAAN_TAHAP_3
            ],
            KodeFile::SOAL_TAHAP_3 => [
                'min-lesser' => Timeline::AWAL_PENGERJAAN_TAHAP_3, 
                'max-greater' => Timeline::AKHIR_PENGERJAAN_TAHAP_3
            ],
        ];
        
        $requiredTahap = $mapAllowedKodeFileWithTahap[$kodeFile];
        $timelines = $this->timelineRepository->FindTwoLessThanAndGreaterOrEqualThanAndWhereIn(Carbon::now()->toDateTimeString(), [
            Timeline::AWAL_PENDAFTARAN, Timeline::AKHIR_PENDAFTARAN, Timeline::AWAL_TAHAP_1, 
            Timeline::AKHIR_TAHAP_1, Timeline::PENGUMUMAN_TAHAP_1, Timeline::AWAL_TAHAP_2, 
            Timeline::AKHIR_TAHAP_2, Timeline::PENGUMUMAN_TAHAP_2, Timeline::AWAL_PENGERJAAN_TAHAP_3, 
            Timeline::AKHIR_PENGERJAAN_TAHAP_3
        ]);

        if (is_null($timelines['lesser']) || is_null($timelines['greater']))
            return false;
        
        if ($timelines['lesser']->id < $mapAllowedKodeFileWithTimeline[$kodeFile]['min-lesser']
            || $timelines['greater']->id > $mapAllowedKodeFileWithTimeline[$kodeFile]['max-greater'])
                return false;

        if ($peserta->tahap_id != $mapAllowedKodeFileWithTahap[$kodeFile])
            return false;

        return true;
    }

    public function DownloadAnswer($answerFileParam, $peserta)
    {
        $mapAllowedTimelineToDownload = [
            Tahap::TAHAP_1 => [
                'min-lesser' => Timeline::AWAL_TAHAP_1, 
                'max-greater' => Timeline::AKHIR_TAHAP_1
            ],
            Tahap::TAHAP_2 => [
                'min-lesser' => Timeline::AWAL_TAHAP_2, 
                'max-greater' => Timeline::AKHIR_TAHAP_2
            ],
            Tahap::TAHAP_3 => [
                'min-lesser' => Timeline::AWAL_PENGERJAAN_TAHAP_3, 
                'max-greater' => Timeline::AKHIR_PENGERJAAN_TAHAP_3
            ],
        ];
        $result = ['Downloadable' => false, 'File Path' => '', 'Download File Name' => ''];

        $answer = $this->jawabanRepository->FindByPesertaAndTahap($peserta->id, $peserta->tahap_id);
        if (is_null($answer))
            return $result;
        
        if ($answer->FileSubmit !== $answerFileParam)
            return $result;

        $timelines = $this->timelineRepository->FindAllWhereIn([
            $mapAllowedTimelineToDownload[$peserta->tahap_id]['min-lesser'],
            $mapAllowedTimelineToDownload[$peserta->tahap_id]['max-greater']
        ]);
        
        $now = Carbon::now();
        if ($now->lessThan($timelines[0]) || $now->greaterThan($timelines[1]))
            return $result;
            
        if (!is_null($answer->WaktuFinalisasi))
            return $result;

        $filePath = $file_path = storage_path(join('\\', [
            'app\peserta',
            $peserta->KodePeserta,
            $this->folderJawabanTahap[$peserta->tahap_id],
            $answer->FileSubmit
        ]));
        if (!File::exists($file_path))
            return $result;
        
        $result['Downloadable'] = true;
        $result['File Path'] = join('/', [
            'peserta', $peserta->KodePeserta, 
            $this->folderJawabanTahap[$peserta->tahap_id],
            $answer->FileSubmit
        ]);
        $result['Download File Name'] = $answer->FileName;
        return $result;
    }
}

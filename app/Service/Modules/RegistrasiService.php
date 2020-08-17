<?php

namespace App\Service\Modules;

use App\Model\DB\Pembayaran;
use App\Model\DB\DetailPeserta;
use App\Model\Lookups\Registrasi;
use App\Model\Lookups\Timeline;
use App\Service\Contracts\IRegistrasiService;
use App\Repository\Contracts\IPesertaRepository;
use App\Repository\Contracts\IPembayaranRepository;
use App\Repository\Contracts\IDetailPesertaRepository;
use App\Repository\Contracts\ITimelineRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrasiService implements IRegistrasiService
{
    private $pesertaRepository;
    private $pembayaranRepository;
    private $detailPesertaRepository;
    private $timelineRepository;

    public function __construct(
        IPesertaRepository $pesertaRepository,
        IPembayaranRepository $pembayaranRepository,
        IDetailPesertaRepository $detailPesertaRepository,
        ITimelineRepository $timelineRepository
    ) {
        $this->pesertaRepository = $pesertaRepository;
        $this->pembayaranRepository = $pembayaranRepository;
        $this->detailPesertaRepository = $detailPesertaRepository;
        $this->timelineRepository = $timelineRepository;
    }

    public function GenerateKodePeserta($peserta_id)
    {
        $peserta = $this->pesertaRepository->Find($peserta_id);
        $peserta->KodePeserta = sprintf("%03d", $peserta->id) . substr($peserta->NoHP, -2);
        return $this->pesertaRepository->InsertUpdate($peserta);
    }

    public function CekRegistrasiPeserta($peserta_id)
    {
        $now = Carbon::now();
        $waktuAkhirRegistrasi = $this->timelineRepository->Find(Timeline::AKHIR_PENDAFTARAN);
        $pembayaran = $this->pembayaranRepository->FindByPeserta($peserta_id);

        if (is_null($pembayaran) && $now->greaterThan($waktuAkhirRegistrasi->DateTime)){
            return 0;
        }

        if (is_null($pembayaran)) {
            return Registrasi::PEMBAYARAN;
        }

        $detail_peserta = $this->detailPesertaRepository->FindByPeserta($peserta_id);
        if (is_null($detail_peserta) || $detail_peserta->isEmpty()){
            return Registrasi::DATA_PESERTA;
        }

        return 0;
    }

    public function StorePembayaran($data)
    {
        $peserta = $data['peserta'];
        $file = $data['file'];
        $storedFileName = sprintf("BuktiTransfer-%s-%s.%s"
            , $peserta->KodePeserta
            , str_replace(' ', '_', $peserta->name)
            , $file->extension()
        );
        Storage::putFileAs('bukti_pembayaran', $file, $storedFileName);

        $pembayaran = new Pembayaran();
        $pembayaran->peserta_id = $peserta->id;
        $pembayaran->Pengirim = $data['NamaPengirim'];
        $pembayaran->Bank = $data['NamaBank'];
        $pembayaran->BuktiTransfer = $storedFileName;
        return $this->pembayaranRepository->InsertUpdate($pembayaran);
    }

    public function StoreDataPeserta($data)
    {
        $peserta = $data['peserta'];
        $ktmFilePeserta1 = $data['file_ktm1'];
        $ktmFilePeserta2 = $data['file_ktm2'];

        Storage::makeDirectory('peserta//'.$peserta->KodePeserta);
        Storage::makeDirectory('peserta//'.$peserta->KodePeserta.'/ktm');

        $ktmFolderPath = 'peserta//'.$peserta->KodePeserta.'/ktm';
        $ktmFileNameFormat = "KTM-%s-%s.%s";

        $ktmPeserta1FileName = sprintf($ktmFileNameFormat
            , $peserta->KodePeserta
            , str_replace(' ', '_', $data['Peserta1']['Nama'])
            , $ktmFilePeserta1->extension()
        );

        $ktmPeserta2FileName = sprintf($ktmFileNameFormat
            , $peserta->KodePeserta
            , str_replace(' ', '_', $data['Peserta2']['Nama'])
            , $ktmFilePeserta2->extension()
        );

        Storage::putFileAs($ktmFolderPath, $ktmFilePeserta1, $ktmPeserta1FileName);
        Storage::putFileAs($ktmFolderPath, $ktmFilePeserta2, $ktmPeserta2FileName);

        $detail_peserta1 = new DetailPeserta();
        $data_peserta1 = $data['Peserta1'];

        $detail_peserta1->peserta_id = $peserta->id;
        $detail_peserta1->Nama = $data_peserta1['Nama'];
        $detail_peserta1->Jurusan = $data_peserta1['Jurusan'];
        $detail_peserta1->NoHP = $data_peserta1['NoHP'];
        $detail_peserta1->IDLine = $data_peserta1['IDLine'];
        $detail_peserta1->KTM = $ktmPeserta1FileName;
        $this->detailPesertaRepository->InsertUpdate($detail_peserta1);

        $detail_peserta2 = new DetailPeserta();
        $data_peserta2 = $data['Peserta2'];

        $detail_peserta2->peserta_id = $peserta->id;
        $detail_peserta2->Nama = $data_peserta2['Nama'];
        $detail_peserta2->Jurusan = $data_peserta2['Jurusan'];
        $detail_peserta2->NoHP = $data_peserta2['NoHP'];
        $detail_peserta2->IDLine = $data_peserta2['IDLine'];
        $detail_peserta2->KTM = $ktmPeserta2FileName;
        $this->detailPesertaRepository->InsertUpdate($detail_peserta2);
    }

    public function GetLatestPembayaranByPeserta($peserta_id)
    {
        return $this->pembayaranRepository->FindByPeserta($peserta_id);
    }

    public function RenameAndDeletePembayaran($peserta_id)
    {
        $all_pembayaran = $this->pembayaranRepository->FindAllWithDeletedByPeserta($peserta_id);
        $latest_pembayaran = $all_pembayaran->where('deleted_at', null)->first();

        $latestFileName = $latest_pembayaran->BuktiTransfer;
        $countPembayaran = $all_pembayaran->count();
        $newFileName = Str::replaceLast('.', '-Attempt-'.$countPembayaran.'.', $latestFileName);

        Storage::move('bukti_pembayaran\\'.$latestFileName, 'bukti_pembayaran\\'.$newFileName);
        $latest_pembayaran->BuktiTransfer = $newFileName;
        $latest_pembayaran->deleted_at = Carbon::now();
        $this->pembayaranRepository->InsertUpdate($latest_pembayaran);
    }
}

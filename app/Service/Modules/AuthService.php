<?php

namespace App\Service\Modules;

use App\Service\Contracts\IAuthService;
use App\Repository\Contracts\IPesertaRepository;
use App\Repository\Contracts\ITimelineRepository;
use App\Model\DB\Peserta;
use App\Model\Lookups\Tahap;
use App\Model\Lookups\Timeline;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{
    private $pesertaRepository;
    private $timelineRepository;

    public function __construct(
        IPesertaRepository $pesertaRepository,
        ITimelineRepository $timelineRepository
    ) {
        $this->pesertaRepository = $pesertaRepository;
        $this->timelineRepository = $timelineRepository;
    }

    public function GetPesertaByEmail($email){
        $peserta = $this->pesertaRepository->FindByEmail($email);
        if (!is_null($peserta))
            return $peserta;

        return null;
    }

    public function CheckRegistrationPeriod()
    {
        $timelines = $this->timelineRepository->FindAllWhereIn([
            Timeline::AWAL_PENDAFTARAN, Timeline::AKHIR_PENDAFTARAN
        ])
        ->sortBy('DateTime')
        ->pluck('DateTime');

        $now = Carbon::now();
        if ($now->lessThan($timelines[0]) || $now->greaterThan($timelines[1]))
            return false;
        else
            return true;
    }

    public function RegisterPeserta($data){
        $peserta = new Peserta();

        $peserta->name = $data['NamaLengkap'];
        $peserta->AsalUniversitas = $data['AsalUniversitas'];
        $peserta->email = $data['email'];
        $peserta->NoHP = $data['NoHP'];
        $peserta->password = Hash::make($data['password']);
        $peserta->tahap_id = Tahap::REGISTRASI;

        return $this->pesertaRepository->InsertUpdate($peserta);
    }

    public function ChangePassword($peserta_id, $new_password)
    {
        $peserta = $this->pesertaRepository->Find($peserta_id);
        
        $peserta->password = Hash::make($new_password);
        return $this->pesertaRepository->InsertUpdate($peserta);
    }
}
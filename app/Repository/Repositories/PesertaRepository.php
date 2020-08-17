<?php

namespace App\Repository\Repositories;

use App\Repository\Base\BaseRepository;
use App\Repository\Contracts\IPesertaRepository;
use App\Model\DB\Peserta;

class PesertaRepository extends BaseRepository implements IPesertaRepository
{
    public function __construct() {
        parent::__construct(new Peserta());
    }

    public function FindByEmail($email)
    {
        return Peserta::where('email', '=', $email)->first();
    }
}
<?php

namespace App\Repository\Repositories;

use App\Model\DB\Jawaban;
use App\Repository\Base\BaseRepository;
use App\Repository\Contracts\IJawabanRepository;

class JawabanRepository extends BaseRepository implements IJawabanRepository
{
    public function __construct() {
        parent::__construct(new Jawaban());
    }

    public function FindByPesertaAndTahap($peserta_id, $tahap_id)
    {
        return Jawaban::where('peserta_id', '=', $peserta_id)
                      ->where('tahap_id', '=', $tahap_id)
                      ->first();
    }
}

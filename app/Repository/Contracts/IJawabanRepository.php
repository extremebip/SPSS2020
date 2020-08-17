<?php

namespace App\Repository\Contracts;

interface IJawabanRepository
{
    public function FindByPesertaAndTahap($peserta_id, $tahap_id);
}
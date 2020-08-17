<?php

namespace App\Repository\Contracts;

interface IPesertaRepository
{
    public function FindByEmail($email);
}
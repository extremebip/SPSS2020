<?php

namespace App\Service\Contracts;

interface IAuthService
{
    public function GetPesertaByEmail($email);
    public function CheckRegistrationPeriod();
    public function RegisterPeserta($data);
    public function ChangePassword($peserta_id, $new_password);
}
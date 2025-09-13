<?php

namespace App\Commons\Enum;

enum CertificateConfirmationStatus: string
{
    case Accept = 'accept';
    case Denied = 'denied';
}

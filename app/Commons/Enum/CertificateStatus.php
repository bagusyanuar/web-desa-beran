<?php

namespace App\Commons\Enum;

enum CertificateStatus: string
{
    case Created = 'created';
    case Pending = 'pending';
    case Finished = 'finished';
    case Failed = 'failed';
}

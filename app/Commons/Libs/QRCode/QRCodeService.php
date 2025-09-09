<?php

namespace App\Commons\Libs\QRCode;


use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class QRCodeService
{
    public static function generate($value): string
    {
        $qrCode = new QrCode(
            data: $value,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );   // pakai constructor langsung

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $pngData = $result->getString();

        return 'data:image/png;base64,' . base64_encode($pngData);
    }
}

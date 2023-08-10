<?php
namespace Kiubo\QrCode\Model;

use Kiubo\QrCode\Api\QRCodeInterface;
use Endroid\QrCode\QrCode;

class KiuboQRCode implements QRCodeInterface
{
    public function generateQRCode($url)
    {
        $qrCode = new QrCode($url);
        return $qrCode->writeDataUri();
    }
}

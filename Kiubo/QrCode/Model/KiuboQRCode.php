<?php
namespace Kiubo\QrCode\Model;

use Kiubo\QrCode\Api\QRCodeInterface;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class KiuboQRCode implements QRCodeInterface
{
    public function generateQRCode($url)
    {
        //$qrCode = new QrCode($url);
        //return $qrCode->writeDataUri();
        $qrCode = QrCode::create($url);
        $dataUri = $qrCode->writeDataUri();

        return $dataUri;
    }
}

<?php
namespace Kiubo\QrCode\Model;

use Kiubo\QrCode\Api\QRCodeInterface;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class KiuboQRCode implements QRCodeInterface
{
    public function generateQRCode($url)
    {
        //$qrCode = new QrCode($url);
        //return $qrCode->writeDataUri();
        $qrCode = QrCode::create($url);
        $writer = new PngWriter();

        // Generate the data URI
        $dataUri = $writer->write($qrCode)->getDataUri();

        return $dataUri;
    }
}

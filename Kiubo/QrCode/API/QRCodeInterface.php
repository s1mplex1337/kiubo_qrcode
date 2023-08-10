<?php
namespace Kiubo\QrCode\Api;

interface QRCodeInterface
{
    public function generateQRCode($url);
}

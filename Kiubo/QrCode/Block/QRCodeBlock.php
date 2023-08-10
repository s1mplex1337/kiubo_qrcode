<?php
namespace Kiubo\QrCode\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\Product;
use Kiubo\QrCode\Api\QRCodeInterface;

class QRCodeBlock extends Template
{
    protected $qrCode;

    public function __construct(
        Template\Context $context,
        QRCodeInterface $qrCode,
        array $data = []
    ) {
        $this->qrCode = $qrCode;
        parent::__construct($context, $data);
    }

    public function getQRCodeUrl()
    {
        $product = $this->getProduct();
        $urlAttribute = $product->getCustomAttribute('3d_url'); // Replace with your attribute code

        if ($urlAttribute && $url = $urlAttribute->getValue()) {
            return $this->qrCode->generateQRCode($url);
        }

        return null;
    }

    public function getProduct()
    {
        return $this->_coreRegistry->registry('product');
    }
}

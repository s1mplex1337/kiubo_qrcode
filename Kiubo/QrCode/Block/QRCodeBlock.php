<?php
namespace Kiubo\QrCode\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\Product;
use Kiubo\QrCode\Api\QRCodeInterface;
use Kiubo\QrCode\Model\KiuboQRCode;
use Magento\Framework\Registry;

class QRCodeBlock extends Template
{
    protected $qrCode;
    protected $_coreRegistry;

    public function __construct(
        Template\Context $context,
        KiuboQRCode $qrCode,
        Registry $registry,
        array $data = []
    ) {
        $this->qrCode = $qrCode;
        $this->_coreRegistry = $registry;
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

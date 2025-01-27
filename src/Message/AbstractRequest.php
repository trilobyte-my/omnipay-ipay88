<?php

namespace Omnipay\IPay88\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    public function getBackendUrl()
    {
        return $this->getParameter('backendUrl');
    }

    public function setBackendUrl($backendUrl)
    {
        return $this->setParameter('backendUrl', $backendUrl);
    }

    public function getMerchantKey()
    {
        return $this->getParameter('merchantKey');
    }

    public function setMerchantKey($merchantKey)
    {
        return $this->setParameter('merchantKey', $merchantKey);
    }

    public function getMerchantCode()
    {
        return $this->getParameter('merchantCode');
    }

    public function setMerchantCode($merchantCode)
    {
        return $this->setParameter('merchantCode', $merchantCode);
    }

    protected function guardParameters()
    {
        $this->validate(
            'card',
            'amount',
            'currency',
            'description',
            'transactionId',
            'returnUrl'
        );
    }

    protected function createSignatureFromString($fullStringToHash, $merchantKey)
    {
        return hash_hmac('sha512', $fullStringToHash, $merchantKey);
    }

    // private function hex2bin($hexSource)
    // {
    //     $bin = '';
    //     for ($i = 0; $i < strlen($hexSource); $i = $i + 2) {
    //         $bin .= chr(hexdec(substr($hexSource, $i, 2)));
    //     }
    //     return $bin;
    // }
}

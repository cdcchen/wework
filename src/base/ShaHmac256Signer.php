<?php

namespace cdcchen\wework\base;


/**
 * Class ShaHmac256Signer
 * @package cdcchen\wework\base
 */
class ShaHmac256Signer implements SignerInterface
{
    /**
     * @param string $source
     * @param string $accessSecret
     * @return string
     */
    public function buildSignature($source, $accessSecret): string
    {
        return base64_encode(hash_hmac('sha256', $source, $accessSecret, true));
    }

    /**
     * @return string
     */
    public function getSignatureMethod(): string
    {
        return 'HMAC-SHA256';
    }

    /**
     * @return string
     */
    public function getSignatureVersion(): string
    {
        return '1.0';
    }

}
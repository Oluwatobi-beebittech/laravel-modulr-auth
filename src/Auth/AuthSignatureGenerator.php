<?php

/*
 * This file is part of the Laravel Modulr Auth package.
 *
 * (c) Oluwatobi Akanji <akanjioluwatobishadrach@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OluwatobiAkanji\ModulrAuth\Auth;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AuthSignatureGenerator
{
    private string $apiKey;
    private string $apiSecret; 

    public function __construct(string $apiKey, string $apiSecret){
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    private function getAPIKey(): string {
		return $this->apiKey;
	}

	private function getAPISecret(): string {
		return $this->apiSecret;
	}

    private function getSignature(string $nonce, string $timestamp): string {
        return "date: $timestamp\nx-mod-nonce: $nonce";
	}

    public function calculateHeaders(string $nonce, string $timestamp): AuthorizationResult{
        $apiKey = $this->getAPIKey();
        $apiSecret = $this->getAPISecret();

        $signature = $this->getSignature($nonce, $timestamp);
        $hashedSignature = hash_hmac('sha1', $signature, utf8_encode($apiSecret));
        $encodedSignature = urlencode(base64_encode(hex2bin($hashedSignature)));

        return new AuthResult($apiKey, $timestamp, $nonce, $encodedSignature);
    }

}

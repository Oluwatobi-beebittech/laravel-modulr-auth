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

class AuthResult {
    private string $timestamp;
    private string $nonce;
    private string $encodedSignature;

    public function __construct(string $key, string $timestamp, string $nonce, string $encodedSignature) {
		$this->timestamp = $timestamp;
		$this->nonce = $nonce;
		$this->encodedSignature = $encodedSignature;
		$this->authorisation = $this->getAuthorisation($key, $encodedSignature);
	}

    private function getAuthorisation(string $key, string $encodedSignature): string {
		return "Signature keyId=\"$key\",algorithm=\"hmac-sha1\",headers=\"date x-mod-nonce\",signature=\"$encodedSignature\"";
	}

	public function getHTTPHeaders(): array {
		return ([
            'Date'=> $this->timestamp,
			'x-mod-nonce'=> $this->nonce,
			'Authorization'=> $this->authorisation
        ]);
	}
}
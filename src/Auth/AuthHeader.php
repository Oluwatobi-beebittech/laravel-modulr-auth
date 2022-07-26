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
use Illuminate\Support\Facades\App;

class AuthHeader
{
    private ?string $nonce = null;
    private ?string $timestamp = null;

    public function getHeaders(?string $nonce=null, ?string $timestamp=null): array{
        $apiKey = config('modulr.key');
        $apiSecret = config('modulr.secret');

        $nonce = $nonce ?? $this->nonce ?? Str::uuid();
        $timestamp = $timestamp ?? $this->timestamp ?? now()->toRfc7231String();

        $auth = new AuthSignatureGenerator($apiKey, $apiSecret);
        return $auth->calculateHeaders($nonce, $timestamp)->getHTTPHeaders();
    }

    public function setNonce(string $nonce){
        $this->nonce = $nonce;
    }

    public function setTimestamp(string $timestamp){
        $this->timestamp = $timestamp;
    }
}

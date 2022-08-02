<?php

/*
 * This file is part of the Laravel Modulr Auth package.
 *
 * (c) Oluwatobi Akanji <akanjioluwatobishadrach@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OluwatobiAkanji\ModulrAuth\Tests\Feature;

use OluwatobiAkanji\ModulrAuth\Facades\AuthHeader;
use OluwatobiAkanji\ModulrAuth\Tests\TestCase;

class AuthHeaderTest extends TestCase {

    protected $apiKey;
    protected $encodedSignature;
    protected $expectedAuthorization;
    protected $nonce;
    protected $timestamp;

    public function setUp(): void {
        parent::setup();
        $this->apiKey = config('modulr.key');
        $this->encodedSignature ='WBMr%2FYdhysbmiIEkdTrf2hP7SfA%3D';
        $this->nonce = '28154b2-9c62b93cc22a-24c9e2-5536d7d';
        $this->timestamp = 'Mon, 25 Jul 2016 16:36:07 GMT';
        $this->expectedAuthorization = "Signature keyId=\"$this->apiKey\",algorithm=\"hmac-sha1\",headers=\"date x-mod-nonce\",signature=\"$this->encodedSignature\"";
    }

    public function test_auth_header_facade(): void {
        AuthHeader::shouldReceive('getHeaders')
                    ->with($this->nonce, $this->timestamp)
                    ->andReturn(["test"]);
        $response = AuthHeader::getHeaders($this->nonce, $this->timestamp);

        $this->assertEquals(["test"], $response);
    }

    public function test_auth_header(): void {
        $authHeaders = AuthHeader::getHeaders($this->nonce, $this->timestamp);
        
        $this->assertCount(3, $authHeaders);
        $this->assertEquals($authHeaders['Date'], $this->timestamp);
        $this->assertEquals($authHeaders['x-mod-nonce'], $this->nonce);
        $this->assertEquals($authHeaders['Authorization'], $this->expectedAuthorization);
    }

    public function test_auth_header_using_current_time(): void {
        $authHeaders = AuthHeader::getHeaders();
        
        $this->assertCount(3, $authHeaders);
        $this->assertIsString($authHeaders['Date']);
        $this->assertIsString($authHeaders['x-mod-nonce']);
        $this->assertIsString($authHeaders['Authorization']);
    }

    public function test_set_timestamp(): void {
        AuthHeader::setTimestamp($this->timestamp);
        $authHeaders = AuthHeader::getHeaders();
        
        $this->assertCount(3, $authHeaders);
        $this->assertEquals($authHeaders['Date'], $this->timestamp);
    }

    public function test_set_nonce(): void {
        AuthHeader::setNonce($this->nonce);
        $authHeaders = AuthHeader::getHeaders();
        
        $this->assertCount(3, $authHeaders);
        $this->assertEquals($authHeaders['x-mod-nonce'], $this->nonce);
    }
}
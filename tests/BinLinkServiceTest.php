<?php

require_once __DIR__."/../services/BinListService.php";

use PHPUnit\Framework\TestCase;

/**
 * Class BinLinkServiceTest
 */
class BinLinkServiceTest extends TestCase
{
    protected $binListService;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->binListService = new BinListService();
        $this->data = [
            'bin' => '45717360'
        ];
    }

    public function testGetContents() : void
    {
        // Create a stub for the BinListService class.
        $stub = $this->createStub(BinListService::class);

        $stub->method('getContents')
            ->with($this->equalTo('https://lookup.binlist.net/'))
            ->willReturn(json_decode('foo'));

        $result = $stub->getBinResult($this->data['bin']);

        $this->assertSame(null, $result);
    }


}
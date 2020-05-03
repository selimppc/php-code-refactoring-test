<?php

require_once __DIR__."/../services/RatesService.php";

use PHPUnit\Framework\TestCase;

/**
 * Class RatesServiceTest
 */
class RatesServiceTest extends TestCase
{
    protected $ratesService;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->ratesService = new RatesService();
        $this->data = [
            'EUR',
            'JPY'
        ];
    }

    public function testGetContents() : void
    {
        // Create a stub for the RatesService class.
        $stub = $this->createStub(RatesService::class);

        $stub->method('getJson')
            ->with($this->equalTo('https://api.exchangeratesapi.io/latest'))
            ->willReturn(json_decode('foo'));

        $this->assertSame(json_decode('foo'), $stub->setRate($this->data[1]));
        $this->assertSame(json_decode('foo'), $stub->getRate($this->data[1]));
    }


}
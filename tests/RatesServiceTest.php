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

    public function testGetRate() : void
    {
        $output = $this->ratesService->getRate( $this->data[0] );
        $this->assertEmpty( $output );
        $this->assertEquals( NULL, $output );
    }

    public function testGetRateNotNull() : void
    {
        $output = $this->ratesService->getRate( $this->data[1] );
        $this->assertNotEmpty( $output );
        $this->assertGreaterThan( 100, $output );
        $this->assertLessThan( 150, $output );
    }

    public function testSetRate() : void
    {
        $output = $this->ratesService->setRate( $this->data[0] );
        $this->assertEmpty( $output );
        $this->assertEquals( NULL, $output );
    }

    public function testSetRateNotNull() : void
    {
        $output = $this->ratesService->setRate( $this->data[1] );
        $this->assertNotEmpty( $output );
        $this->assertGreaterThan( 100, $output );
        $this->assertLessThan( 150, $output );
    }

    public function testGetJson() : void
    {
        $output = $this->ratesService->getJson();
        $this->assertNotEmpty( $output );
        $this->assertIsArray( $output );
        $this->assertArrayHasKey( 'DKK', $output );
        $this->assertArrayHasKey( 'JPY', $output );
    }


}
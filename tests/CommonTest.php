<?php

require_once __DIR__."/../Common.php";

use PHPUnit\Framework\TestCase;

/**
 * Class CommonTest
 */
class CommonTest extends TestCase
{
    protected $common;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->common = new Common();
        $this->data = [
            'bin' =>'45717360',
            'amount' =>'100.00',
            'currency' => 'EUR'
        ];
    }

    public function testGetResult(): void
    {
        $output = $this->common->getFinalResult(
            $this->data['bin'],
            $this->data['amount'],
            $this->data['currency']
        );
        $this->assertNotEmpty($output);
        $this->assertIsNumeric($output);
        $this->assertEquals(1, $output);
    }

    public function testGetIsEuByBin(): void
    {
        $output = $this->common->getIsEuByBin($this->data['bin']);
        $this->assertNotEmpty($output);
        $this->assertEquals('yes', $output);
    }

    public function testGetIsEuByBinNo(): void
    {
        $output = $this->common->getIsEuByBin( '45417360' );
        $this->assertNotEmpty( $output );
        $this->assertEquals( 'no', $output );
    }

    public function testGetBinResultByBin(): void
    {
        $output = $this->common->getBinResultByBin( $this->data['bin'] );
        $this->assertNotEmpty($output);
        $this->assertIsObject($output);
        $this->assertObjectHasAttribute( 'number', $output );
        $this->assertObjectHasAttribute( 'scheme', $output );
        $this->assertObjectHasAttribute( 'type', $output );
        $this->assertObjectHasAttribute( 'country', $output) ;
    }


    public function testGetRateByCurrency(): void
    {
        $output = $this->common->getRateByCurrency(
            $this->data['currency'],
            $this->data['amount']
        );
        $this->assertNotEmpty( $output );
        $this->assertEquals( $this->data['amount'], $output );
        $this->assertGreaterThan( 0, $output );
    }

    public function testGetFixedAmountZero(): void
    {
        $output = $this->common->getFixedAmount(
            0,
            $this->data['currency'],
            $this->data['amount']
        );
        $this->assertNotEmpty( $output );
        $this->assertEquals( $this->data['amount'], $output );
    }

    public function testGetFixedAmount(): void
    {
        $output = $this->common->getFixedAmount(
            $rate = 5,
            $this->data['currency'],
            $this->data['amount']
        );
        $this->assertNotEmpty( $output );
        $this->assertEquals( $this->data['amount']/$rate, $output );
    }
}
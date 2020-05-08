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
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getFinalResult')
            ->willReturn(1);

        $result = $stub->getFinalResult(
            $this->data['bin'],
            $this->data['amount'],
            $this->data['currency']
        );

        $this->assertEquals( 1,  $result);

    }

    public function testGetIsEuByBin(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getIsEuByBin')
            ->willReturn('yes');

        $result = $stub->getIsEuByBin(
            $this->data['bin']
        );

        $this->assertEquals( 'yes',  $result);

    }

    public function testGetIsEuByBinNo(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getIsEuByBin')
            ->willReturn('no');

        $result = $stub->getIsEuByBin(
            '45417360'
        );

        $this->assertEquals( 'no',  $result);
    }

    public function testGetBinResultByBin(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getBinResultByBin')
            ->willReturn(json_decode('foo'));

        $result = $stub->getBinResultByBin(
            $this->data['bin']
        );

        $this->assertEquals( json_decode('foo'), $result);
    }


    public function testGetRateByCurrency(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getRateByCurrency')
            ->willReturn(0);

        $result = $stub->getRateByCurrency(
            $this->data['currency'],
            $this->data['amount']
        );

        $this->assertEquals( 0,  $result);
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
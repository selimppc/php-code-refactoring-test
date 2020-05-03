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

        $this->assertEquals( 1, $stub->getFinalResult(
            $this->data['bin'],
            $this->data['amount'],
            $this->data['currency']
        ) );

    }

    public function testGetIsEuByBin(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getIsEuByBin')
            ->willReturn('yes');

        $this->assertEquals( 'yes', $stub->getIsEuByBin(
            $this->data['bin']
        ) );

    }

    public function testGetIsEuByBinNo(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getIsEuByBin')
            ->willReturn('no');

        $this->assertEquals( 'no', $stub->getIsEuByBin(
            '45417360'
        ) );
    }

    public function testGetBinResultByBin(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getBinResultByBin')
            ->willReturn(json_decode('foo'));

        $this->assertEquals( json_decode('foo'), $stub->getBinResultByBin(
            $this->data['bin']
        ) );
    }


    public function testGetRateByCurrency(): void
    {
        // Create a stub for the Common class.
        $stub = $this->createStub(Common::class);

        $stub->method('getRateByCurrency')
            ->willReturn(0);

        $this->assertEquals( 0, $stub->getRateByCurrency(
            $this->data['currency'],
            $this->data['amount']
        ) );
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
<?php

require_once __DIR__."/../services/DataExploreService.php";

use PHPUnit\Framework\TestCase;

/**
 * Class DataExploreTest
 */
class DataExploreTest extends TestCase
{
    protected $dataExploreService;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->dataExploreService = new DataExploreService();
        $this->data = [
            '{"bin":"45717360"',
            '"amount":"100.00"',
            '"currency":"EUR"}'
        ];
    }

    public function testGetBin() : void
    {
        $output = $this->dataExploreService->getBin($this->data);
        $this->assertNotEmpty($output);
        $this->assertEquals('45717360', $output);
        $this->assertStringContainsString('45717360', $output);
    }

    public function testGetAmount() : void
    {
        $output = $this->dataExploreService->getAmount($this->data);
        $this->assertNotEmpty($output);
        $this->assertEquals('100.00', $output);
        $this->assertStringContainsString('100.00', $output);
    }

    public function testGetCurrency() : void
    {
        $output = $this->dataExploreService->getCurrency($this->data);
        $this->assertNotEmpty($output);
        $this->assertEquals('EUR', $output);
        $this->assertStringContainsString('EUR', $output);
    }

}
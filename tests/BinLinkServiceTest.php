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

    public function testGetBinResult() : void
    {
        $output = $this->binListService->getBinResult($this->data['bin']);
        $this->assertNotEmpty($output);
        $this->assertStringContainsString('number', $output);
        $this->assertStringContainsString('scheme', $output);
        $this->assertStringContainsString('type', $output);
        $this->assertStringContainsString('country', $output);
    }

    public function testGetContents() : void
    {
        $output = $this->binListService->getContents($this->data['bin']);
        $this->assertNotEmpty($output);
        $this->assertStringContainsString('number', $output);
        $this->assertStringContainsString('scheme', $output);
        $this->assertStringContainsString('type', $output);
        $this->assertStringContainsString('country', $output);
    }


}
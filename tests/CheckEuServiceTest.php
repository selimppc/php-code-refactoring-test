<?php

require_once __DIR__."/../services/CheckEuService.php";

use PHPUnit\Framework\TestCase;

/**
 * Class CheckEuServiceTest
 */
class CheckEuServiceTest extends TestCase
{
    protected $checkEuService;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->checkEuService = new CheckEuService();
        $this->data = [
            'AT',
            'BE'
        ];
    }

    public function testIsEu() : void
    {
        $output = $this->checkEuService->isEu( $this->data[0] );
        $this->assertNotEmpty( $output );
        $this->assertEquals( 'yes', $output );
    }

    public function testIsEuNo() : void
    {
        $output = $this->checkEuService->isEu( 'SR' );
        $this->assertNotEmpty( $output );
        $this->assertEquals( 'no', $output );
    }
}
<?php declare(strict_types=1);

require_once __DIR__."/../app.php";

use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase
{
    public function testApp() : void
    {
        $output = `php app.php input.txt`;
        $this->assertNotEmpty( $output );
        $this->assertTrue(true, $output);
    }

    public function testGetBin() : void
    {
        $arr = ['{"bin":"45717360"', '"amount":"100.00"', '"currency":"EUR"}'];
        $output = getBin($arr);
        $this->assertNotEmpty($output);
        $this->assertEquals('45717360', $output);
        $this->assertStringContainsString('45717360', $output);
    }

    public function testGetAmount() : void
    {
        $arr = ['{"bin":"45717360"', '"amount":"100.00"', '"currency":"EUR"}'];
        $output = getAmount($arr);
        $this->assertNotEmpty($output);
        $this->assertEquals('100.00', $output);
        $this->assertStringContainsString('100.00', $output);
    }

    public function testGetCurrency() : void
    {
        $arr = ['{"bin":"45717360"', '"amount":"100.00"', '"currency":"EUR"}'];
        $output = getCurrency($arr);
        $this->assertNotEmpty($output);
        $this->assertEquals('EUR', $output);
        $this->assertStringContainsString('EUR', $output);
    }

}
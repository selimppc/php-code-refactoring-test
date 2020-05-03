<?php declare(strict_types=1);

require_once __DIR__."/../app.php";

use PHPUnit\Framework\TestCase;

/**
 * Class AppTest
 */
final class AppTest extends TestCase
{
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        $this->data = [
            '{"bin":"45717360"',
            '"amount":"100.00"',
            '"currency":"EUR"}'
        ];
    }
    public function testApp() : void
    {
        $output = `php app.php input.txt`;
        $this->assertNotEmpty( $output );
        $this->assertTrue(true, $output);
    }

    public function testGetBin() : void
    {
        $output = getBin($this->data);
        $this->assertNotEmpty($output);
        $this->assertEquals('45717360', $output);
        $this->assertStringContainsString('45717360', $output);
    }

    public function testGetAmount() : void
    {
        $output = getAmount($this->data);
        $this->assertNotEmpty($output);
        $this->assertEquals('100.00', $output);
        $this->assertStringContainsString('100.00', $output);
    }

    public function testGetCurrency() : void
    {
        $output = getCurrency($this->data);
        $this->assertNotEmpty($output);
        $this->assertEquals('EUR', $output);
        $this->assertStringContainsString('EUR', $output);
    }

}
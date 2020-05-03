<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class AppTest
 */
final class AppTest extends TestCase
{
    public function testApp() : void
    {
        $output = `php app.php input.txt`;
        $this->assertNotEmpty( $output );
        $this->assertTrue( true, $output );
    }

}
<?php


use PHPUnit\Framework\TestCase;

/**
 * Class AppTest
 */
final class AppTest extends TestCase
{
    CONST APP_FILE_NAME = 'app.php';
    protected $data;
    protected $appFile;


    public function setUp(): void
    {
        parent::setUp();
        $this->data = ['{"bin":"45717360","amount":"100.00","currency":"EUR"}',
                        '{"bin":"516793","amount":"50.00","currency":"USD"}'];

        $this->appFile = dirname(__FILE__) . '/../' . self::APP_FILE_NAME;
    }

    public function testAppFileExists() : void
    {
        $fileExist = file_exists($this->appFile);
        $this->assertTrue($fileExist);
    }

//    public function testAppTrue() : void
//    {
//        #$output = `php $this->appFile input.txt`;
//        #$this->assertNotEmpty( $output );
//        #$this->assertTrue( true, $output );
//    }



}
<?php

require_once __DIR__."/../BaseInterface.php";

use PHPUnit\Framework\TestCase;

/**
 * Class BaseInterfaceTest
 */
class BaseInterfaceTest extends TestCase
{

    public function testInterface(): void
    {
        $obj = $this->createMock(BaseInterface::class);
        $this->assertInstanceOf(BaseInterface::class, $obj);
    }

}
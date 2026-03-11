<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class Login extends TestCase
{
    private string $controllerPath;

    protected function setUp(): void
    {
        $this->controllerPath = __DIR__ . '/Login.php';
    }

    #[Test]
    #[TestDox('controller file exists and is readable')]
    public function testControllerFileExistsAndReadable(): void
    {
        $this->assertFileExists($this->controllerPath);

        $controllerCode = file_get_contents($this->controllerPath);
        $this->assertNotFalse($controllerCode);
    }
}

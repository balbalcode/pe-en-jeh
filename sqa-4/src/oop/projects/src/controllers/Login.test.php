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

    #[Test]
    #[TestDox('controller uses expected mvc flow')]
    public function testControllerUsesExpectedMvcFlow(): void
    {
        $controllerCode = (string) file_get_contents($this->controllerPath);

        $this->assertStringContainsString("require_once __DIR__ . '/../models/LoginModel.php';", $controllerCode);
        $this->assertStringContainsString("_SERVER['REQUEST_METHOD'] === 'POST'", $controllerCode);
        $this->assertStringContainsString("header('Location: index.php');", $controllerCode);
        $this->assertStringContainsString('new LoginRetriever()', $controllerCode);
        $this->assertStringContainsString('http_build_query($query)', $controllerCode);
    }
}

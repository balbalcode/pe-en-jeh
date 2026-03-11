<?php


use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class index extends TestCase
{
    private string $viewPath;

    protected function setUp(): void
    {
        $this->viewPath = __DIR__ . '/index.php';
    }

    #[Test]
    #[TestDox('view renders error messages when status is error')]
    public function testViewRendersErrorMessages(): void
    {
        $_GET = [
            'status' => 'error',
            'username' => 'ikbal',
            'error-uname' => '1',
            'error-pin' => '1',
        ];

        ob_start();
        require $this->viewPath;
        $outputError = (string) ob_get_clean();

        $this->assertStringContainsString('Invalid login data.', $outputError);
        $this->assertStringContainsString('Username must be at least 5 characters.', $outputError);
        $this->assertStringContainsString('PIN must be numeric and at least 6 digits.', $outputError);
    }

    #[Test]
    #[TestDox('view renders success message and username when status is success')]
    public function testViewRendersSuccessMessageAndUsername(): void
    {
        $_GET = [
            'status' => 'success',
            'username' => 'ikbalmaulana',
        ];

        ob_start();
        require $this->viewPath;
        $outputSuccess = (string) ob_get_clean();

        $this->assertStringContainsString('Login berhasil bal.', $outputSuccess);
        $this->assertStringContainsString('ikbalmaulana', $outputSuccess);
    }
}

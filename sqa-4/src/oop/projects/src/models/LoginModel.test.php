<?php

require_once __DIR__ . '/LoginModel.php';

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class LoginModel extends TestCase
{
    private LoginRetriever $retriever;

    protected function setUp(): void
    {
        $this->retriever = new LoginRetriever();
    }

    #[Test]
    #[TestDox('retrieve trims username and pin')]
    public function testRetrieveTrimsUsernameAndPin(): void
    {
        $retrieved = $this->retriever->retrieve([
            'username' => '  ikbalmaulana  ',
            'pin' => ' 123456 ',
        ]);

        $this->assertSame('ikbalmaulana', $retrieved['username']);
        $this->assertSame('123456', $retrieved['pin']);
    }

    #[Test]
    #[TestDox('validate accepts valid username and pin')]
    public function testValidateAcceptsValidUsernameAndPin(): void
    {
        $valid = $this->retriever->validate([
            'username' => 'ikbal',
            'pin' => '123456',
        ]);

        $this->assertTrue($valid['isValid']);
        $this->assertSame([], $valid['errors']);
    }

    #[Test]
    #[TestDox('validate rejects short username and invalid pin')]
    public function testValidateRejectsShortUsernameAndInvalidPin(): void
    {
        $invalid = $this->retriever->validate([
            'username' => 'abc',
            'pin' => '12ab',
        ]);

        $this->assertFalse($invalid['isValid']);
        $this->assertContains('Username must be at least 5 characters.', $invalid['errors']);
        $this->assertContains('PIN must be numeric and at least 6 digits.', $invalid['errors']);
    }
}

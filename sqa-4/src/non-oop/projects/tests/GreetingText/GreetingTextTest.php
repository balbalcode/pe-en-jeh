<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;


require_once __DIR__ . '/../../src/GreetingText.php';

class GreetingTextTest extends TestCase
{
    #[Test]
    #[TestDox("greet success, should normally run")]
    public function testGreetSuccess(): void
    {
        $user = greetUser("Ikbal", "ikbal@email.com");

        $this->assertEquals("Ikbal", $user['name']);
        $this->assertEquals("ikbal@email.com", $user['email']);
    }

    #[Test] 
    #[TestDox("greet without name, should throw an exception")]
    public function testGreetWithoutName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        greetUser("", "ikbal@email.com");
    }

    #[Test] 
    #[TestDox("greet with invalid email, should throw an exception")]
    public function testGreetInvalidEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);

        greetUser("Ikbal", "wrong-email");
    }

    #[Test] 
    #[TestDox("consoling user, should return a greeting message")]
    public function testConsolingUser(): void
    {
        $message = consolingUser("Ikbal");

        $this->assertEquals("Hello, Ikbal! Welcome to our platform.", $message);
    }
}

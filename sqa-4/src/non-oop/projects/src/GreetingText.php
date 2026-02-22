<?php

function greetUser(string $name, string $email): array
{
    if (empty($name)) {
        throw new InvalidArgumentException("Name is required");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidArgumentException("Invalid email format");
    }

    return [
        'name' => $name,
        'email' => $email
    ];
}


function consolingUser(string $name): string
{
    return "Hello, $name! Welcome to our platform.";
}
?>

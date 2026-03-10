<?php

class LoginRetriever
{
    public function retrieve(array $request): array
    {
        $rawUsername = $request['username'] ?? $request['login-form__username-input'] ?? '';
        $rawPin = $request['pin'] ?? $request['login-form__pin-input'] ?? '';

        $username = trim((string) $rawUsername);
        $pin = trim((string) $rawPin);

        return [
            'username' => $username,
            'pin' => $pin,
        ];
    }

    public function validate(array $loginData): array
    {
        $username = (string) ($loginData['username'] ?? $loginData['login-form__username-input'] ?? '');
        $pin = (string) ($loginData['pin'] ?? $loginData['login-form__pin-input'] ?? '');

        $errors = [];

        if (mb_strlen($username) < 5) {
            $errors[] = 'Username must be at least 5 characters.';
        }

        if (!ctype_digit($pin) || strlen($pin) < 6) {
            $errors[] = 'PIN must be numeric and at least 6 digits.';
        }

        return [
            'isValid' => $errors === [],
            'errors' => $errors,
        ];
    }
}

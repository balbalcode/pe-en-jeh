<?php

final class LoginRetriever
{
    public function retrieve(array $request): array
    {
        $username = isset($request['login-form__username-input']) ? trim((string) $request['login-form__username-input']) : '';
        $pin = isset($request['login-form__pin-input']) ? trim((string) $request['login-form__pin-input']) : '';

        return [
            'username' => $username,
            'pin' => $pin,
        ];
    }

    public function validate(array $loginData): array
    {
        $username = isset($loginData['login-form__username-input']) ? (string) $loginData['login-form__username-input'] : '';
        $pin = isset($loginData['login-form__pin-input']) ? (string) $loginData['login-form__pin-input'] : '';

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

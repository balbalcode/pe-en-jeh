<?php


require_once __DIR__ . '/../models/LoginModel.php';

$isSubmitted = $_SERVER['REQUEST_METHOD'] === 'POST';

if (!$isSubmitted) {
    header('Location: index.php');
    exit;
}

$retriever = new LoginRetriever();
$result = $retriever->retrieve($_POST);
$validation = $retriever->validate($result);

$query = [
    'status' => $validation['isValid'] ? 'success' : 'error',
    'username' => $result['username'],
    'error-uname' => in_array('Username must be at least 5 characters.', $validation['errors'], true) ? '1' : '0',
    'error-pin' => in_array('PIN must be numeric and at least 6 digits.', $validation['errors'], true) ? '1' : '0',
];

header('Location: index.php?' . http_build_query($query));
exit;
<?php

declare(strict_types=1);

$status = $_GET['status'] ?? null;
$username = isset($_GET['username']) ? trim((string) $_GET['username']) : '';
$userError = ($_GET['e_user'] ?? '0') === '1';
$pinError = ($_GET['e_pin'] ?? '0') === '1';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login Form</title>
</head>

<body class="min-h-screen bg-white-950 text-white-100">
  <div class="mx-auto flex min-h-screen w-full  items-center justify-center px-0 py-10">
    <div class="w-full rounded-lg border border-white-700 bg-white-800 p-8 shadow-lg sm:w-[400px]">
      <h1 class="text-2xl font-semibold tracking-tight">Login</h1>
      <p class="mt-1 text-sm text-white-400">Secure access to your account</p>

      <?php if ($status === 'success'): ?>
        <div class="mt-6 rounded-lg border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-300">
          <p class="font-medium">Login berhasil bal.</p>
        </div>
      <?php elseif ($status === 'error'): ?>
        <div class="mt-6 rounded-lg border border-rose-500/30 bg-rose-500/10 p-4 text-sm text-rose-300">
          <p class="font-medium">Invalid login data.</p>
          <ul class="mt-2 list-inside list-disc space-y-1">
            <?php if ($userError): ?>
              <li>Username must be at least 5 characters.</li>
            <?php endif; ?>
            <?php if ($pinError): ?>
              <li>PIN must be numeric and at least 6 digits.</li>
            <?php endif; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="Login.php" method="post" class="mt-6 space-y-5" id="login-form" data-testid="login-form">
        <div>
          <label for="username" class="mb-2 block text-sm font-medium text-white-300">Username</label>
          <input
            type="text"
            id="login-form__username-input"
            name="login-form__username-input"
            minlength="5"
            data-testid="login-form__username-input"
            required
            class="w-full rounded-lg border border-white-700 bg-white-800 px-3 py-2.5 text-white-100 outline-none transition placeholder:text-white-500 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40"
            placeholder="Enter your username">
        </div>

        <div>
          <label for="pin" class="mb-2 block text-sm font-medium text-white-300">PIN</label>
          <input
            type="password"
            id="login-form__pin-input"
            name="login-form__pin-input"
            inputmode="numeric"
            data-testid="login-form__pin-input"
            pattern="[0-9]{6,}"
            minlength="6"
            required
            class="w-full rounded-lg border border-white-700 bg-white-800 px-3 py-2.5 text-white-100 outline-none transition placeholder:text-white-500 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/40"
            placeholder="Enter your PIN">
        </div>

        <button type="submit" data-testid="login-form__submit-button" id="login-form__submit-button" class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-white-900">
          Login
        </button>
      </form>
    </div>
  </div>
</body>

</html>
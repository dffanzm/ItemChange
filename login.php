<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - ITEMSCHANGE</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-light min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-primary mb-6 text-center">Login</h2>
    <?php if (isset($_SESSION['login_error'])): ?>
      <div class="bg-error text-white p-3 rounded mb-4"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
    <?php endif; ?>
    <form action="auth/login.php" method="POST" class="space-y-4">
      <input type="text" name="username" placeholder="Username" required class="w-full p-3 border border-muted rounded focus:outline-none focus:ring-2 focus:ring-primary">
      <input type="password" name="password" placeholder="Password" required class="w-full p-3 border border-muted rounded focus:outline-none focus:ring-2 focus:ring-primary">
      <button type="submit" class="w-full bg-primary hover:bg-secondary text-white font-semibold py-2 rounded">Login</button>
    </form>
    <p class="text-muted text-sm text-center mt-4">Belum punya akun? <a href="register.php" class="text-secondary hover:underline">Register</a></p>
  </div>
</body>
</html>

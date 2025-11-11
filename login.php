<?php

session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
  $username = trim($_POST['username'] ?? '');
  $pass = $_POST['password'] ?? '';

  if ($username === '' || $pass === '') {
    echo "<script>alert('username dan password wajib diisi');</script>";
  } else {
    $stmt = mysqli_prepare($conn, "SELECT password, role FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_pass, $db_role);

    if (mysqli_stmt_fetch($stmt)) {
      if ($pass === $db_pass) {
        if ($db_role === 'admin') {
          $_SESSION['role'] = 'admin';
          mysqli_stmt_close($stmt);
          header('Location: admin.php');
          exit;
        } else {
          $_SESSION['username'] = $username;
          mysqli_stmt_close($stmt);
          header('Location: form.php');
          exit;
        }
      } else {
        echo "<script>alert('password atau username salah');</script>";
      }
    } else {
      echo "<script>alert('password atau username salah');</script>";
    }

    mysqli_stmt_close($stmt);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-[#0B2447]">
    <form method="POST" action="" class="bg-white w-[555px] h-[572px] mx-auto rounded-lg">
      <div class="grid justify-center">
        <h2
          class="text-center text-[35px] text-[#2E7D32] underline mt-10 mb-15"
        >
          <strong>LOGIN</strong>
        </h2>
        <div class="h-[299px]">
          <div class="grid m-2">
            <label for="username">Username</label>
            <input
              class="border border-[#2E7D32] h-[50px] w-[380px] rounded-sm p-2"
              name="username"
              type="text"
            />
          </div>
          <div class="grid m-2">
            <label for="password">password</label>
            <input
              class="border border-[#2E7D32] h-[50px] w-[380px] rounded-sm p-2"
              name="password"
              type="password"
            />
          </div>
          <div class="flex items-center gap-2 m-2">
            <input type="checkbox" name="showpw" id="showpw" />
            <p>show password</p>
          </div>
          <button
            class="bg-[#2E7D32] text-white h-[50px] w-[380px] m-2 rounded-sm"
            type="submit"
            name="login"
          >
            LOGIN
          </button>
          <div class="flex gap-1 m-2">
            <p>don't have an account?</p>
            <a class="text-[#0B2447]" href="register.php">Register</a>
          </div>
        </div>
      </div>
    </form>

  </body>
</html>

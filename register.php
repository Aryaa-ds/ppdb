<?php
include "koneksi.php";

if(isset($_POST['register'])){
  $username = trim($_POST['username'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $pass = $_POST['password'] ?? '';

  if($username === '' || $email === '' || $pass === ''){
    echo "<script>alert('semua kolom wajib diisi');</script>";
  } else {
    // cek username sudah ada
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) > 0){
      echo "<script>alert('username sudah ada');</script>";
    } else {
      $stmt2 = mysqli_prepare($conn, "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
      mysqli_stmt_bind_param($stmt2, "sss", $username, $email, $pass);

      if(mysqli_stmt_execute($stmt2)){
        echo "<script>alert('register berhasil silahkan login'); window.location='login.php';</script>";
        exit;
      } else {
        echo "<script>alert('gagal registrasi: " . mysqli_real_escape_string($conn, mysqli_error($conn)) . "');</script>";
      }
      mysqli_stmt_close($stmt2);
    }

    mysqli_stmt_close($stmt);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-[#0B2447]">
    <form class="bg-white w-[555px] h-[572px] mx-auto rounded-lg" method="POST" novalidate>
      <div class="grid justify-center">
        <h2 class="text-center text-[35px] text-[#2E7D32] underline mt-10 mb-5">
          <strong>REGISTER</strong>
        </h2>
        <div class="h-[299px]">
          <div class="grid m-2">
            <label for="email">Email</label>
            <input
              id="email"
              class="border border-[#2E7D32] h-[50px] w-[380px] p-2 rounded-sm"
              name="email"
              type="email"
            />
          </div>
          <div class="grid m-2">
            <label for="username">Username</label>
            <input
              id="username"
              class="border border-[#2E7D32] h-[50px] w-[380px] p-2 rounded-sm"
              name="username"
              type="text"
            />
          </div>
          <div class="grid m-2">
            <label for="password">Password</label>
            <input
              id="password"
              class="border border-[#2E7D32] h-[50px] w-[380px] p-2 rounded-sm"
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
            name="register"
          >
            REGISTER
          </button>
        </div>
      </div>
    </form>
  </body>
</html>

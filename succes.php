<?php
session_start();
include 'koneksi.php';

// ambil nomor registrasi dari query string atau fallback ke session
$reg_no = isset($_GET['reg']) ? trim($_GET['reg']) : null;
if (!$reg_no && isset($_SESSION['last_reg_no'])) {
    $reg_no = $_SESSION['last_reg_no'];
    unset($_SESSION['last_reg_no']); // hapus agar tidak dipakai lagi
}

$reg_display = $reg_no ? htmlspecialchars($reg_no) : '— tidak tersedia —';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Registrasi Berhasil</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;background:#f4f7f6;margin:0;padding:40px}
    .card{max-width:640px;margin:0 auto;background:#fff;padding:24px;border-radius:8px;box-shadow:0 6px 20px rgba(0,0,0,0.06);text-align:center}
    h1{color:#0B2447;margin-bottom:8px}
    p{color:#333;margin-bottom:16px}
    .reg{display:inline-block;padding:12px 18px;background:#e9f7ef;border:1px solid #cfead6;color:#116530;border-radius:6px;font-weight:700}
    .btn{display:inline-block;margin-top:18px;padding:10px 16px;background:#0B2447;color:#fff;border-radius:6px;text-decoration:none}
  </style>
</head>
<body>
  <div class="card">
    <h1>Data Diterima</h1>
    <p>Terima kasih, data pendaftaran Anda telah berhasil diterima.</p>

    <div>Nomor Registrasi Anda:</div>
    <div class="reg"><?php echo $reg_display; ?></div>

    <div>
      <a class="btn" href="index.php">Kembali ke halaman utama</a>
      <?php if ($reg_no): ?>
        <a class="btn" style="background:#2E7D32;margin-left:10px" href="print.php?reg=<?php echo urlencode($reg_no); ?>">Cetak Bukti</a>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>
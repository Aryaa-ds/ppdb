<?php
session_start();
include 'koneksi.php';

$reg = isset($_GET['reg']) ? trim($_GET['reg']) : '';
if ($reg === '') {
    echo "Nomor registrasi tidak diberikan.";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM formulir_siswa WHERE reg_no = ? LIMIT 1");
if (!$stmt) {
    echo "Gagal menyiapkan query: " . htmlspecialchars($conn->error);
    exit;
}
$stmt->bind_param('s', $reg);
$stmt->execute();
$res = $stmt->get_result();
if (!$res || $res->num_rows === 0) {
    echo "Data dengan nomor registrasi <strong>" . htmlspecialchars($reg) . "</strong> tidak ditemukan.";
    $stmt->close();
    exit;
}
$data = $res->fetch_assoc();
$stmt->close();

function pretty_label($key) {
    $k = str_replace('_', ' ', $key);
    $k = preg_replace('/\b(id|no|nr|reg|telp|hp)\b/i', strtoupper('$1'), $k);
    return ucfirst($k);
}

// kelompokkan field ke section
$sections = [
    'Data Pendaftaran' => ['reg_no', 'tanggal', 'tingkat_kelas', 'program'],
    'Data Siswa' => ['nama_lengkap', 'jenis_kelamin', 'nisn', 'nik', 'tempat_lahir', 'tanggal_lahir', 'agama', 'tinggi_badan', 'berat_badan', 'jumlah_saudara_kandung'],
    'Data Alamat' => ['alamat', 'dusun', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'rt', 'rw', 'transportasi', 'jarak_tempat_tinggal_kesekolah', 'waktu_tempuh_berangkat_kesekolah', 'no_telepon'],
    'Data Ayah' => ['nama_ayah', 'nik_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah'],
    'Data Ibu' => ['nama_ibu', 'nik_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu'],
    'Data Wali' => ['nama_wali', 'nik_wali', 'pendidikan_wali', 'pekerjaan_wali', 'penghasilan_wali', 'tahun_lahir_wali'],
];

// tambahan: jika ada field lain yang tidak masuk grup, tampilkan di bawah "Lainnya"
$assigned = [];
foreach ($sections as $fields) {
    foreach ($fields as $f) $assigned[$f] = true;
}
$others = [];
foreach ($data as $k => $v) {
    if (!isset($assigned[$k])) $others[$k] = $v;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Cetak Pendaftaran - <?php echo htmlspecialchars($data['reg_no'] ?? $reg); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body{font-family:Arial,Helvetica,sans-serif;color:#222;margin:20px}
    .sheet{max-width:900px;margin:0 auto;background:#fff;padding:20px;border-radius:6px;border:1px solid #e2e8f0}
    h1{color:#0B2447;margin-bottom:6px}
    h2.section{color:#2E7D32;margin-top:18px;border-bottom:1px solid #eee;padding-bottom:6px}
    .grid{display:grid;grid-template-columns:1fr 1fr;gap:12px 24px;margin-top:12px}
    .item{
      padding:10px 12px;
      border:1px solid #e6e9ef;
      border-radius:6px;
      background:#fff;
      box-shadow:0 1px 0 rgba(0,0,0,0.02);
    }
    .header{
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            max-width: 800px;
        }
    .label{font-weight:700;color:#444;display:block;margin-bottom:6px}
    .value{color:#111}
    .controls{margin-top:18px;text-align:center}
    .btn{display:inline-block;padding:8px 14px;background:#0B2447;color:#fff;border-radius:6px;text-decoration:none;margin:0 6px}
    @media print{ .controls{display:none} body{margin:0} }
  </style>
</head>
<body>
  <div class="sheet">
        <div class="header">
            <img src="img/logo.png" alt="logo" style="width:145px; height:145px; margin-right:20px;">
            <h1>Formulir Pendaftaran Siswa Baru <br>
                SMK MULIA HARAPAN <br><span>2025/2026</span>
        </h1>
    </div>
    <hr>
    <div><strong>Nomor Registrasi:</strong> <?php echo htmlspecialchars($data['reg_no'] ?? $reg); ?></div>

    <?php foreach ($sections as $sectionTitle => $fields): ?>
        <h2 class="section"><?php echo htmlspecialchars($sectionTitle); ?></h2>
        <div class="grid">
            <?php foreach ($fields as $field): 
                if (!array_key_exists($field, $data)) continue;
                $val = $data[$field];
                ?>
                <div class="item">
                    <span class="label"><?php echo htmlspecialchars(pretty_label($field)); ?></span>
                    <div class="value"><?php echo nl2br(htmlspecialchars((string)$val)); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <?php if (!empty($others)): ?>
        <h2 class="section">Lainnya</h2>
        <div class="grid">
            <?php foreach ($others as $k => $v): ?>
                <div class="item">
                    <span class="label"><?php echo htmlspecialchars(pretty_label($k)); ?></span>
                    <div class="value"><?php echo nl2br(htmlspecialchars((string)$v)); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="controls">
      <a class="btn" href="form.php">Kembali</a>
      <a class="btn" href="#" onclick="window.print();return false;">Cetak</a>
    </div>
  </div>
</body>
</html>
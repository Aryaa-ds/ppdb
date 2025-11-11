<?php
session_start();

// Cek apakah user sudah login dan role-nya admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM formulir_siswa WHERE id_peserta = $id";
    
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert success'>Data siswa berhasil dihapus!</div>";
    } else {
        $message = "<div class='alert error'>Error: " . $conn->error . "</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $conn->real_escape_string($_POST['id']);
    
    $tanggal = $conn->real_escape_string($_POST['tanggal']);
    $tingkat_kelas = $conn->real_escape_string($_POST['tingkat_kelas']);
    $program = $conn->real_escape_string($_POST['program']);
    $reg_no = $conn->real_escape_string($_POST['reg_no']);
    $nama_lengkap = $conn->real_escape_string($_POST['nama_lengkap']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
    $nisn = $conn->real_escape_string($_POST['nisn']);
    $nik = $conn->real_escape_string($_POST['nik']);
    $tempat_lahir = $conn->real_escape_string($_POST['tempat_lahir']);
    $tanggal_lahir = $conn->real_escape_string($_POST['tanggal_lahir']);
    $agama = $conn->real_escape_string($_POST['agama']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $dusun = $conn->real_escape_string($_POST['dusun']);
    $kecamatan = $conn->real_escape_string($_POST['kecamatan']);
    $desa_kelurahan = $conn->real_escape_string($_POST['desa_kelurahan']);
    $kabupaten_kota = $conn->real_escape_string($_POST['kabupaten_kota']);
    $rt = $conn->real_escape_string($_POST['rt']);
    $rw = $conn->real_escape_string($_POST['rw']);
    $transportasi = $conn->real_escape_string($_POST['transportasi']);
    $no_telepon = $conn->real_escape_string($_POST['no_telepon']);
    $nama_ayah = $conn->real_escape_string($_POST['nama_ayah']);
    $nik_ayah = $conn->real_escape_string($_POST['nik_ayah']);
    $pendidikan_ayah = $conn->real_escape_string($_POST['pendidikan_ayah']);
    $pekerjaan_ayah = $conn->real_escape_string($_POST['pekerjaan_ayah']);
    $penghasilan_ayah = $conn->real_escape_string($_POST['penghasilan_ayah']);
    $nama_ibu = $conn->real_escape_string($_POST['nama_ibu']);
    $nik_ibu = $conn->real_escape_string($_POST['nik_ibu']);
    $pendidikan_ibu = $conn->real_escape_string($_POST['pendidikan_ibu']);
    $pekerjaan_ibu = $conn->real_escape_string($_POST['pekerjaan_ibu']);
    $penghasilan_ibu = $conn->real_escape_string($_POST['penghasilan_ibu']);
    $nama_wali = $conn->real_escape_string($_POST['nama_wali']);
    $nik_wali = $conn->real_escape_string($_POST['nik_wali']);
    $pendidikan_wali = $conn->real_escape_string($_POST['pendidikan_wali']);
    $pekerjaan_wali = $conn->real_escape_string($_POST['pekerjaan_wali']);
    $penghasilan_wali = $conn->real_escape_string($_POST['penghasilan_wali']);
    $tahun_lahir_wali = $conn->real_escape_string($_POST['tahun_lahir_wali']);
    $tinggi_badan = $conn->real_escape_string($_POST['tinggi_badan']);
    $berat_badan = $conn->real_escape_string($_POST['berat_badan']);
    $jarak_tempat_tinggal_kesekolah = $conn->real_escape_string($_POST['jarak_tempat_tinggal_kesekolah']);
    $waktu_tempuh_berangkat_kesekolah = $conn->real_escape_string($_POST['waktu_tempuh_berangkat_kesekolah']);
    $jumlah_saudara_kandung = $conn->real_escape_string($_POST['jumlah_saudara_kandung']);

    $sql = "UPDATE formulir_siswa SET 
        tanggal='$tanggal', tingkat_kelas='$tingkat_kelas', program='$program', reg_no='$reg_no', 
        nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', nisn='$nisn', nik='$nik', 
        tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', agama='$agama', alamat='$alamat', 
        dusun='$dusun', kecamatan='$kecamatan', desa_kelurahan='$desa_kelurahan', 
        kabupaten_kota='$kabupaten_kota', rt='$rt', rw='$rw', transportasi='$transportasi', 
        no_telepon='$no_telepon', nama_ayah='$nama_ayah', nik_ayah='$nik_ayah', 
        pendidikan_ayah='$pendidikan_ayah', pekerjaan_ayah='$pekerjaan_ayah', 
        penghasilan_ayah='$penghasilan_ayah', nama_ibu='$nama_ibu', nik_ibu='$nik_ibu', 
        pendidikan_ibu='$pendidikan_ibu', pekerjaan_ibu='$pekerjaan_ibu', 
        penghasilan_ibu='$penghasilan_ibu', nama_wali='$nama_wali', nik_wali='$nik_wali', 
        pendidikan_wali='$pendidikan_wali', pekerjaan_wali='$pekerjaan_wali', 
        penghasilan_wali='$penghasilan_wali', tahun_lahir_wali='$tahun_lahir_wali', 
        tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', 
        jarak_tempat_tinggal_kesekolah='$jarak_tempat_tinggal_kesekolah', 
        waktu_tempuh_berangkat_kesekolah='$waktu_tempuh_berangkat_kesekolah', 
        jumlah_saudara_kandung='$jumlah_saudara_kandung' 
        WHERE id_peserta=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php?message=updated");
        exit();
    } else {
        $message = "<div class='alert error'>Error: " . $conn->error . "</div>";
    }
}

 $view_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'view' && isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $view_sql = "SELECT * FROM formulir_siswa WHERE id_peserta = $id";
    $view_result = $conn->query($view_sql);
    if ($view_result->num_rows > 0) {
        $view_data = $view_result->fetch_assoc();
    }
}

 $edit_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $edit_sql = "SELECT * FROM formulir_siswa WHERE id_peserta = $id";
    $edit_result = $conn->query($edit_sql);
    if ($edit_result->num_rows > 0) {
        $edit_data = $edit_result->fetch_assoc();
    }
}

if (!$edit_data && !$view_data) {
    $sql = "SELECT * FROM formulir_siswa ORDER BY id_peserta DESC";
    $result = $conn->query($sql);
}

 $conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | PPDB</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: auto; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        .logout-btn { background-color: #d9534f; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; text-align: center; }
        .alert.success { background-color: #dff0d8; color: #3c763d; }
        .alert.error { background-color: #f2dede; color: #a94442; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .action-buttons a { margin-right: 5px; text-decoration: none; padding: 5px 10px; color: white; border-radius: 4px; font-size: 0.9em; }
        .btn-view { background-color: #5bc0de; }
        .btn-edit { background-color: #5cb85c; }
        .btn-delete { background-color: #d9534f; }
        .form-group, .view-group { margin-bottom: 15px; }
        .form-group label, .view-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .view-group p { padding: 8px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 4px; margin: 0; }
        fieldset { border: 1px solid #ccc; border-radius: 5px; padding: 15px; margin-bottom: 20px; }
        legend { font-weight: bold; padding: 0 10px; }
        .btn-submit, .btn-cancel { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-submit { background-color: #337ab7; color: white; }
        .btn-cancel { background-color: #777; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Dashboard Admin PPDB</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'updated') {
            echo "<div class='alert success'>Data siswa berhasil diperbarui!</div>";
        } elseif (!empty($message)) {
            echo $message;
        }
        ?>

        <?php if ($edit_data): ?>
            <!-- TAMPILAN FORM EDIT LENGKAP -->
            <h2>Edit Data Siswa: <?php echo htmlspecialchars($edit_data['nama_lengkap']); ?></h2>
            <form action="admin_dashboard.php" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $edit_data['id_peserta']; ?>">
                
                <fieldset><legend>Data Pendaftaran</legend>
                    <div class="form-group"><label for="tanggal">Tanggal</label><input type="date" name="tanggal" value="<?php echo $edit_data['tanggal']; ?>" required></div>
                    <div class="form-group"><label for="tingkat_kelas">Tingkat Kelas</label><select name="tingkat_kelas" required><option value="X" <?php echo ($edit_data['tingkat_kelas']=='X')?'selected':''; ?>>X</option><option value="XI" <?php echo ($edit_data['tingkat_kelas']=='XI')?'selected':''; ?>>XI</option><option value="XII" <?php echo ($edit_data['tingkat_kelas']=='XII')?'selected':''; ?>>XII</option></select></div>
                    <div class="form-group"><label for="program">Program</label><select name="program" required><option value="IPA" <?php echo ($edit_data['program']=='IPA')?'selected':''; ?>>IPA</option><option value="IPS" <?php echo ($edit_data['program']=='IPS')?'selected':''; ?>>IPS</option><option value="Bahasa" <?php echo ($edit_data['program']=='Bahasa')?'selected':''; ?>>Bahasa</option></select></div>
                </fieldset>

                <fieldset><legend>Data Pribadi</legend>
                    <div class="form-group"><label for="nama_lengkap">Nama Lengkap</label><input type="text" name="nama_lengkap" value="<?php echo htmlspecialchars($edit_data['nama_lengkap']); ?>" required></div>
                    <div class="form-group"><label for="jenis_kelamin">Jenis Kelamin</label><select name="jenis_kelamin" required><option value="L" <?php echo ($edit_data['jenis_kelamin']=='L')?'selected':''; ?>>Laki-laki</option><option value="P" <?php echo ($edit_data['jenis_kelamin']=='P')?'selected':''; ?>>Perempuan</option></select></div>
                    <div class="form-group"><label for="nisn">NISN</label><input type="text" name="nisn" value="<?php echo htmlspecialchars($edit_data['nisn']); ?>"></div>
                    <div class="form-group"><label for="nik">NIK</label><input type="text" name="nik" value="<?php echo htmlspecialchars($edit_data['nik']); ?>"></div>
                    <div class="form-group"><label for="tempat_lahir">Tempat Lahir</label><input type="text" name="tempat_lahir" value="<?php echo htmlspecialchars($edit_data['tempat_lahir']); ?>"></div>
                    <div class="form-group"><label for="tanggal_lahir">Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="<?php echo $edit_data['tanggal_lahir']; ?>"></div>
                    <div class="form-group"><label for="agama">Agama</label><input type="text" name="agama" value="<?php echo htmlspecialchars($edit_data['agama']); ?>"></div>
                    <div class="form-group"><label for="no_telepon">No. Telepon</label><input type="text" name="no_telepon" value="<?php echo htmlspecialchars($edit_data['no_telepon']); ?>"></div>
                </fieldset>

                <fieldset><legend>Data Alamat</legend>
                    <div class="form-group"><label for="alamat">Alamat</label><textarea name="alamat" rows="3"><?php echo htmlspecialchars($edit_data['alamat']); ?></textarea></div>
                    <div class="form-group"><label for="dusun">Dusun</label><input type="text" name="dusun" value="<?php echo htmlspecialchars($edit_data['dusun']); ?>"></div>
                    <div class="form-group"><label for="desa_kelurahan">Desa/Kelurahan</label><input type="text" name="desa_kelurahan" value="<?php echo htmlspecialchars($edit_data['desa_kelurahan']); ?>"></div>
                    <div class="form-group"><label for="kecamatan">Kecamatan</label><input type="text" name="kecamatan" value="<?php echo htmlspecialchars($edit_data['kecamatan']); ?>"></div>
                    <div class="form-group"><label for="kabupaten_kota">Kabupaten/Kota</label><input type="text" name="kabupaten_kota" value="<?php echo htmlspecialchars($edit_data['kabupaten_kota']); ?>"></div>
                    <div class="form-group"><label for="rt">RT</label><input type="text" name="rt" value="<?php echo htmlspecialchars($edit_data['rt']); ?>"></div>
                    <div class="form-group"><label for="rw">RW</label><input type="text" name="rw" value="<?php echo htmlspecialchars($edit_data['rw']); ?>"></div>
                    <div class="form-group"><label for="transportasi">Transportasi</label><input type="text" name="transportasi" value="<?php echo htmlspecialchars($edit_data['transportasi']); ?>"></div>
                </fieldset>

                <fieldset><legend>Data Ayah</legend>
                    <div class="form-group"><label for="nama_ayah">Nama Ayah</label><input type="text" name="nama_ayah" value="<?php echo htmlspecialchars($edit_data['nama_ayah']); ?>"></div>
                    <div class="form-group"><label for="nik_ayah">NIK Ayah</label><input type="text" name="nik_ayah" value="<?php echo htmlspecialchars($edit_data['nik_ayah']); ?>"></div>
                    <div class="form-group"><label for="pendidikan_ayah">Pendidikan Ayah</label><input type="text" name="pendidikan_ayah" value="<?php echo htmlspecialchars($edit_data['pendidikan_ayah']); ?>"></div>
                    <div class="form-group"><label for="pekerjaan_ayah">Pekerjaan Ayah</label><input type="text" name="pekerjaan_ayah" value="<?php echo htmlspecialchars($edit_data['pekerjaan_ayah']); ?>"></div>
                    <div class="form-group"><label for="penghasilan_ayah">Penghasilan Ayah</label><input type="text" name="penghasilan_ayah" value="<?php echo htmlspecialchars($edit_data['penghasilan_ayah']); ?>"></div>
                </fieldset>

                <fieldset><legend>Data Ibu</legend>
                    <div class="form-group"><label for="nama_ibu">Nama Ibu</label><input type="text" name="nama_ibu" value="<?php echo htmlspecialchars($edit_data['nama_ibu']); ?>"></div>
                    <div class="form-group"><label for="nik_ibu">NIK Ibu</label><input type="text" name="nik_ibu" value="<?php echo htmlspecialchars($edit_data['nik_ibu']); ?>"></div>
                    <div class="form-group"><label for="pendidikan_ibu">Pendidikan Ibu</label><input type="text" name="pendidikan_ibu" value="<?php echo htmlspecialchars($edit_data['pendidikan_ibu']); ?>"></div>
                    <div class="form-group"><label for="pekerjaan_ibu">Pekerjaan Ibu</label><input type="text" name="pekerjaan_ibu" value="<?php echo htmlspecialchars($edit_data['pekerjaan_ibu']); ?>"></div>
                    <div class="form-group"><label for="penghasilan_ibu">Penghasilan Ibu</label><input type="text" name="penghasilan_ibu" value="<?php echo htmlspecialchars($edit_data['penghasilan_ibu']); ?>"></div>
                </fieldset>
                
                <fieldset><legend>Data Wali</legend>
                    <div class="form-group"><label for="nama_wali">Nama Wali</label><input type="text" name="nama_wali" value="<?php echo htmlspecialchars($edit_data['nama_wali']); ?>"></div>
                    <div class="form-group"><label for="nik_wali">NIK Wali</label><input type="text" name="nik_wali" value="<?php echo htmlspecialchars($edit_data['nik_wali']); ?>"></div>
                    <div class="form-group"><label for="tahun_lahir_wali">Tahun Lahir Wali</label><input type="text" name="tahun_lahir_wali" value="<?php echo htmlspecialchars($edit_data['tahun_lahir_wali']); ?>"></div>
                    <div class="form-group"><label for="pendidikan_wali">Pendidikan Wali</label><input type="text" name="pendidikan_wali" value="<?php echo htmlspecialchars($edit_data['pendidikan_wali']); ?>"></div>
                    <div class="form-group"><label for="pekerjaan_wali">Pekerjaan Wali</label><input type="text" name="pekerjaan_wali" value="<?php echo htmlspecialchars($edit_data['pekerjaan_wali']); ?>"></div>
                    <div class="form-group"><label for="penghasilan_wali">Penghasilan Wali</label><input type="text" name="penghasilan_wali" value="<?php echo htmlspecialchars($edit_data['penghasilan_wali']); ?>"></div>
                </fieldset>

                <fieldset><legend>Data Fisik & Lainnya</legend>
                    <div class="form-group"><label for="tinggi_badan">Tinggi Badan (cm)</label><input type="number" name="tinggi_badan" value="<?php echo htmlspecialchars($edit_data['tinggi_badan']); ?>"></div>
                    <div class="form-group"><label for="berat_badan">Berat Badan (kg)</label><input type="number" name="berat_badan" value="<?php echo htmlspecialchars($edit_data['berat_badan']); ?>"></div>
                    <div class="form-group"><label for="jarak_tempat_tinggal_kesekolah">Jarak ke Sekolah (km)</label><input type="number" name="jarak_tempat_tinggal_kesekolah" value="<?php echo htmlspecialchars($edit_data['jarak_tempat_tinggal_kesekolah']); ?>"></div>
                    <div class="form-group"><label for="waktu_tempuh_berangkat_kesekolah">Waktu Tempuh (menit)</label><input type="number" name="waktu_tempuh_berangkat_kesekolah" value="<?php echo htmlspecialchars($edit_data['waktu_tempuh_berangkat_kesekolah']); ?>"></div>
                    <div class="form-group"><label for="jumlah_saudara_kandung">Jumlah Saudara</label><input type="number" name="jumlah_saudara_kandung" value="<?php echo htmlspecialchars($edit_data['jumlah_saudara_kandung']); ?>"></div>
                </fieldset>

                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                <a href="admin_dashboard.php" class="btn-cancel">Batal</a>
            </form>

        <?php elseif ($view_data): ?>
            <!-- TAMPILAN LIHAT DETAIL -->
            <h2>Detail Data Siswa: <?php echo htmlspecialchars($view_data['nama_lengkap']); ?></h2>
            <div class="view-data">
                <fieldset><legend>Data Pendaftaran</legend>
                    <div class="view-group"><label>Tanggal</label><p><?php echo date('d/m/Y', strtotime($view_data['tanggal'])); ?></p></div>
                    <div class="view-group"><label>Tingkat Kelas</label><p><?php echo htmlspecialchars($view_data['tingkat_kelas']); ?></p></div>
                    <div class="view-group"><label>Program</label><p><?php echo htmlspecialchars($view_data['program']); ?></p></div>
                </fieldset>
                <fieldset><legend>Data Pribadi</legend>
                    <div class="view-group"><label>Nama Lengkap</label><p><?php echo htmlspecialchars($view_data['nama_lengkap']); ?></p></div>
                    <div class="view-group"><label>Jenis Kelamin</label><p><?php echo ($view_data['jenis_kelamin']=='L')?'Laki-laki':'Perempuan'; ?></p></div>
                    <div class="view-group"><label>NISN</label><p><?php echo htmlspecialchars($view_data['nisn']); ?></p></div>
                    <div class="view-group"><label>NIK</label><p><?php echo htmlspecialchars($view_data['nik']); ?></p></div>
                    <div class="view-group"><label>Tempat, Tanggal Lahir</label><p><?php echo htmlspecialchars($view_data['tempat_lahir']) . ', ' . date('d/m/Y', strtotime($view_data['tanggal_lahir'])); ?></p></div>
                    <div class="view-group"><label>Agama</label><p><?php echo htmlspecialchars($view_data['agama']); ?></p></div>
                    <div class="view-group"><label>No. Telepon</label><p><?php echo htmlspecialchars($view_data['no_telepon']); ?></p></div>
                </fieldset>
                <fieldset><legend>Data Alamat</legend>
                    <div class="view-group"><label>Alamat</label><p><?php echo htmlspecialchars($view_data['alamat']); ?></p></div>
                    <div class="view-group"><label>Dusun</label><p><?php echo htmlspecialchars($view_data['dusun']); ?></p></div>
                    <div class="view-group"><label>Desa/Kelurahan</label><p><?php echo htmlspecialchars($view_data['desa_kelurahan']); ?></p></div>
                    <div class="view-group"><label>Kecamatan</label><p><?php echo htmlspecialchars($view_data['kecamatan']); ?></p></div>
                    <div class="view-group"><label>Kabupaten/Kota</label><p><?php echo htmlspecialchars($view_data['kabupaten_kota']); ?></p></div>
                    <div class="view-group"><label>RT/RW</label><p><?php echo htmlspecialchars($view_data['rt']) . '/' . htmlspecialchars($view_data['rw']); ?></p></div>
                    <div class="view-group"><label>Transportasi</label><p><?php echo htmlspecialchars($view_data['transportasi']); ?></p></div>
                </fieldset>
                <fieldset><legend>Data Ayah</legend>
                    <div class="view-group"><label>Nama Ayah</label><p><?php echo htmlspecialchars($view_data['nama_ayah']); ?></p></div>
                    <div class="view-group"><label>Pekerjaan Ayah</label><p><?php echo htmlspecialchars($view_data['pekerjaan_ayah']); ?></p></div>
                </fieldset>
                <fieldset><legend>Data Ibu</legend>
                    <div class="view-group"><label>Nama Ibu</label><p><?php echo htmlspecialchars($view_data['nama_ibu']); ?></p></div>
                    <div class="view-group"><label>Pekerjaan Ibu</label><p><?php echo htmlspecialchars($view_data['pekerjaan_ibu']); ?></p></div>
                </fieldset>
                <fieldset><legend>Data Wali</legend>
                    <div class="view-group"><label>Nama Wali</label><p><?php echo htmlspecialchars($view_data['nama_wali']); ?></p></div>
                    <div class="view-group"><label>Pekerjaan Wali</label><p><?php echo htmlspecialchars($view_data['pekerjaan_wali']); ?></p></div>
                </fieldset>
            </div>
            <a href="?action=edit&id=<?php echo $view_data['id_peserta']; ?>" class="btn-submit" style="margin-right:10px;">Edit Data</a>
            <a href="admin_dashboard.php" class="btn-cancel">Kembali</a>

        <?php else: ?>
            <!-- TAMPILAN TABEL DATA -->
            <h2>Data Pendaftar</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Program</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result) && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_peserta'] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row['tanggal'])) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                            echo "<td>" . ($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>";
                            echo "<td>" . htmlspecialchars($row['tingkat_kelas']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['program']) . "</td>";
                            echo "<td class='action-buttons'>
                                    <a href='?action=view&id=" . $row['id_peserta'] . "' class='btn-view'>Lihat</a>
                                    <a href='?action=edit&id=" . $row['id_peserta'] . "' class='btn-edit'>Edit</a>
                                    <a href='?action=delete&id=" . $row['id_peserta'] . "' class='btn-delete' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' style='text-align: center;'>Tidak ada data pendaftar</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
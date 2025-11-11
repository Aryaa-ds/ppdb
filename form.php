<?php

session_start();
include "koneksi.php";

// Cek apakah form telah disubmit dengan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil dan sanitasi data dari form untuk mencegah SQL Injection
    $tanggal = $conn->real_escape_string($_POST['tanggal']);
    $tingkat_kelas = $conn->real_escape_string($_POST['tingkat_kelas']);
    $program = $conn->real_escape_string($_POST['program']);
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
    $tinggi_badan = $conn->real_escape_string($_POST['tinggi_badan']);
    $berat_badan = $conn->real_escape_string($_POST['berat_badan']);
    $jarak_tempat_tinggal_kesekolah = $conn->real_escape_string($_POST['jarak_tempat_tinggal_kesekolah']);
    $waktu_tempuh_berangkat_kesekolah = $conn->real_escape_string($_POST['waktu_tempuh_berangkat_kesekolah']);
    $jumlah_saudara_kandung = $conn->real_escape_string($_POST['jumlah_saudara_kandung']);


    $sql = "INSERT INTO formulir_siswa (
        tanggal, tingkat_kelas, program, nama_lengkap, jenis_kelamin, nisn, nik, 
        tempat_lahir, tanggal_lahir, agama, alamat, dusun, kecamatan, desa_kelurahan, 
        kabupaten_kota, rt, rw, transportasi, no_telepon, nama_ayah, nik_ayah, 
        pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, nik_ibu, 
        pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, nama_wali, nik_wali, 
        pendidikan_wali, pekerjaan_wali, penghasilan_wali,
        tinggi_badan, berat_badan, jarak_tempat_tinggal_kesekolah, 
        waktu_tempuh_berangkat_kesekolah, jumlah_saudara_kandung
    ) VALUES (
        '$tanggal', '$tingkat_kelas', '$program', '$nama_lengkap', '$jenis_kelamin', '$nisn', '$nik', 
        '$tempat_lahir', '$tanggal_lahir', '$agama', '$alamat', '$dusun', '$kecamatan', '$desa_kelurahan', 
        '$kabupaten_kota', '$rt', '$rw', '$transportasi', '$no_telepon', '$nama_ayah', '$nik_ayah', 
        '$pendidikan_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$nama_ibu', '$nik_ibu', 
        '$pendidikan_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$nama_wali', '$nik_wali', 
        '$pendidikan_wali', '$pekerjaan_wali', '$penghasilan_wali', 
        '$tinggi_badan', '$berat_badan', '$jarak_tempat_tinggal_kesekolah', 
        '$waktu_tempuh_berangkat_kesekolah', '$jumlah_saudara_kandung'
    )";

if ($conn->query($sql) === TRUE) {
    $id_peserta = (int) $conn->insert_id;
    $tanggal_daftar = date('Ymd');
    $no_reg = 'REG' . $tanggal_daftar . str_pad($id_peserta, 4, '0', STR_PAD_LEFT);

    // update reg_no di DB
    $stmt_up = $conn->prepare("UPDATE formulir_siswa SET reg_no = ? WHERE id_peserta = ?");
    if ($stmt_up) {
        $stmt_up->bind_param('si', $no_reg, $id_peserta);
        $stmt_up->execute();
        $stmt_up->close();
    }

    $_SESSION['last_reg_no'] = $no_reg;
    echo "<script>setTimeout(function(){ window.location.href = 'succes.php?reg=" . rawurlencode($no_reg) . "'; }, 800);</script>";
    exit;

    } else {
        $message = "<div class='alert error'>Error: " . htmlspecialchars($conn->error) . "</div>";
    }
    // Tutup koneksi
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1,{
            text-align: center;
            color: #0B2447;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        /* Alert Box */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            text-align: center;
        }
        .alert.success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert.error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        fieldset {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        legend {
            font-weight: 700;
            color: #2E7D32;
            padding: 0 10px;
            font-size: 1.1em;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus,
        textarea:focus {
            border-color: #0056b3;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.3);
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }

        .radio-group label {
            font-weight: normal;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #0B2447;
            color: white;
            border: none;+
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        .header{
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            max-width: 800px;
        }
        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            .header{
                flex-direction: column;
                align-items: center;
            }
            .header img{
                margin-bottom: 15px;
                margin-right: 0;
                width: 100px;
                height: 100px;
            }
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="img/logo.png" alt="logo" style="width:145px; height:145px; margin-right:20px;">
            <h1>Formulir Pendaftaran Siswa Baru <br>
                SMK MULIA HARAPAN <br><span>2025/2026</span>
        </h1>
    </div>
    <hr>
    <p>Silakan isi formulir berikut dengan data yang benar.</p>

        <?php if (!empty($message)) { echo $message; } ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <!-- Data Pendaftaran -->
            <fieldset>
                <legend>Data Pendaftaran</legend>
                <div class="form-group">
                    <label for="tanggal">Tanggal Pendaftaran</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tingkat_kelas">Tingkat Kelas</label>
                        <select id="tingkat_kelas" name="tingkat_kelas" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="X">X (Sepuluh)</option>
                            <option value="XI">XI (Sebelas)</option>
                            <option value="XII">XII (Dua Belas)</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <div class="form-group">
  <label for="program">Program</label>
  <select id="program" name="program" required>
      <option value="">-- Pilih Program --</option>
      <option value="TKJ">Teknik Komputer dan Jaringan (TKJ)</option>
      <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
      <option value="TITL">Teknik Instalasi Tenaga Listrik(TITL) </option>
  </select>
</div>

            </fieldset>

            <!-- Data Pribadi Siswa -->
            <fieldset>
                <legend>Data Pribadi Siswa</legend>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required maxlength="100">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="L" required> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="P" required> Perempuan</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="number" id="nisn" name="nisn" required maxlength="20"> 
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" id="nik" name="nik" required maxlength="20">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select id="agama" name="agama" required>
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="no_telepon">No. Telepon</label>
                    <input type="text" id="no_telepon" name="no_telepon" required maxlength="15">
                </div>
            </fieldset>

            <!-- Data Alamat -->
            <fieldset>
                <legend>Data Alamat</legend>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="dusun">Dusun</label>
                        <input type="text" id="dusun" name="dusun" maxlength='225'>
                    </div>
                    <div class="form-group">
                        <label for="desa_kelurahan">Desa/Kelurahan</label>
                        <input type="text" id="desa_kelurahan" name="desa_kelurahan" required maxlength='225'>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" required maxlength='225'>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten/Kota</label>
                        <input type="text" id="kabupaten_kota" name="kabupaten_kota" required maxlength='225'>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="number" id="rt" name="rt" required maxlength="3">
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="number" id="rw" name="rw" required maxlength="3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="transportasi">Alat Transportasi</label>
                    <select id="transportasi" name="transportasi" required>
                        <option value="">-- Pilih Transportasi --</option>
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Sepeda">Sepeda</option>
                        <option value="Motor Pribadi">Motor Pribadi</option>
                        <option value="Mobil Pribadi">Mobil Pribadi</option>
                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                        <option value="Antar Jemput">Antar Jemput</option>
                    </select>
                </div>
            </fieldset>

            <!-- Data Ayah -->
            <fieldset>
                <legend>Data Ayah Kandung</legend>
                <div class="form-group">
                    <label for="nama_ayah">Nama Lengkap Ayah</label>
                    <input type="text" id="nama_ayah" name="nama_ayah" required maxlength="225">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nik_ayah">NIK Ayah</label>
                        <input type="number" id="nik_ayah" name="nik_ayah" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_ayah">Pendidikan Ayah</label>
                        <select id="pendidikan_ayah" name="pendidikan_ayah" required>
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1/D2/D3">D1/D2/D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required maxlength="220">
                    </div>
                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah</label>
                        <select id="penghasilan_ayah" name="penghasilan_ayah" required>
                            <option value="">-- Pilih Penghasilan --</option>
                            <option value="1.000.000"> Rp 1.000.000</option>
                            <option value="1.000.000 - 2.500.000">Rp 1.000.000 - 2.500.000</option>
                            <option value="2.500.001 - 5.000.000">Rp 2.500.001 - 5.000.000</option>
                            <option value="5.000.001 - 10.000.000">Rp 5.000.001 - 10.000.000</option>
                            <option value="> 10.000.000">> Rp 10.000.000</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <!-- Data Ibu -->
            <fieldset>
                <legend>Data Ibu Kandung</legend>
                <div class="form-group">
                    <label for="nama_ibu">Nama Lengkap Ibu</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" required maxlength="225">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nik_ibu">NIK Ibu</label>
                        <input type="number" id="nik_ibu" name="nik_ibu" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_ibu">Pendidikan Ibu</label>
                        <select id="pendidikan_ibu" name="pendidikan_ibu" required>
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1/D2/D3">D1/D2/D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required maxlength="220">
                    </div>
                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu</label>
                        <select id="penghasilan_ibu" name="penghasilan_ibu" required>
                            <option value="">-- Pilih Penghasilan --</option>
                            <option value="1.000.000">Rp 1.000.000</option>
                            <option value="1.000.000 - 2.500.000">Rp 1.000.000 - 2.500.000</option>
                            <option value="2.500.001 - 5.000.000">Rp 2.500.001 - 5.000.000</option>
                            <option value="5.000.001 - 10.000.000">Rp 5.000.001 - 10.000.000</option>
                            <option value="> 10.000.000">> Rp 10.000.000</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <!-- Data Wali -->
            <fieldset>
                <legend>Data Wali (Isi jika tidak tinggal dengan orang tua)</legend>
                <div class="form-group">
                    <label for="nama_wali">Nama Lengkap Wali</label>
                    <input type="text" id="nama_wali" name="nama_wali" maxlength="225">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nik_wali">NIK Wali</label>
                        <input type="number" id="nik_wali" name="nik_wali" maxlength="20">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="pendidikan_wali">Pendidikan Wali</label>
                        <select id="pendidikan_wali" name="pendidikan_wali">
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1/D2/D3">D1/D2/D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_wali">Pekerjaan Wali</label>
                        <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" maxlength="220">
                    </div>
                </div>
                <div class="form-group">
                    <label for="penghasilan_wali">Penghasilan Wali</label>
                    <select id="penghasilan_wali" name="penghasilan_wali">
                        <option value="">-- Pilih Penghasilan --</option>
                        <option value="1.000.000">Rp 1.000.000</option>
                        <option value="1.000.000 - 2.500.000">Rp 1.000.000 - 2.500.000</option>
                        <option value="2.500.001 - 5.000.000">Rp 2.500.001 - 5.000.000</option>
                        <option value="5.000.001 - 10.000.000">Rp 5.000.001 - 10.000.000</option>
                        <option value="> 10.000.000">> Rp 10.000.000</option>
                    </select>
                </div>
            </fieldset>

            <!-- Data Fisik & Lainnya -->
            <fieldset>
                <legend>Data Fisik & Lainnya</legend>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tinggi_badan">Tinggi Badan (cm)</label>
                        <input type="number" id="tinggi_badan" name="tinggi_badan" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="berat_badan">Berat Badan (kg)</label>
                        <input type="number" id="berat_badan" name="berat_badan" step="0.1" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="jarak_tempat_tinggal_kesekolah">Jarak Tempat Tinggal ke Sekolah (km)</label>
                        <input type="number" id="jarak_tempat_tinggal_kesekolah" name="jarak_tempat_tinggal_kesekolah" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_tempuh_berangkat_kesekolah">Waktu Tempuh ke Sekolah (menit)</label>
                        <input type="number" id="waktu_tempuh_berangkat_kesekolah" name="waktu_tempuh_berangkat_kesekolah" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
                    <input type="number" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" required>
                </div>
            </fieldset>

            <div class="form-group">
                <button type="submit" class="btn">Daftar Sekarang</button>
            </div>

        </form>
    </div>

</body>
</html>
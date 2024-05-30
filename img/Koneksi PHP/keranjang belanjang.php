<?php
session_start(); // Mulai sesi

// Cek apakah tombol 'Tambah ke Keranjang' diklik
if(isset($_POST["tambah_ke_keranjang"])) {
    // Data produk (biasanya diambil dari database)
    $produk_id = $_POST["produk_id"];
    $nama_produk = $_POST["nama_produk"];
    $harga_produk = $_POST["harga_produk"];
    $jumlah_produk = $_POST["jumlah_produk"];
    
    // Buat array untuk produk
    $produk = array(
        'id' => $produk_id,
        'nama' => $nama_produk,
        'harga' => $harga_produk,
        'jumlah' => $jumlah_produk
    );
    
    // Cek apakah keranjang belanja sudah ada
    if(!isset($_SESSION["keranjang"])) {
        $_SESSION["keranjang"] = array(); // Jika belum, buat keranjang baru
    }
    
    // Tambahkan produk ke keranjang belanja
    array_push($_SESSION["keranjang"], $produk);
    
    // Redirect ke halaman keranjang belanja
    header("Location: keranjang_belanja.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk ke Keranjang</title>
</head>
<body>

<h2>Form Tambah Produk ke Keranjang</h2>

<form method="post" action="">
    <input type="hidden" name="produk_id" value="1">
    <label for="nama_produk">Nama Produk:</label><br>
    <input type="text" id="nama_produk" name="nama_produk" value="Produk A"><br>
    <label for="harga_produk">Harga Produk:</label><br>
    <input type="text" id="harga_produk" name="harga_produk" value="100000"><br>
    <label for="jumlah_produk">Jumlah:</label><br>
    <input type="number" id="jumlah_produk" name="jumlah_produk" value="1"><br>
    <input type="submit" name="tambah_ke_keranjang" value="Tambah ke Keranjang">
</form>

</body>
</html>
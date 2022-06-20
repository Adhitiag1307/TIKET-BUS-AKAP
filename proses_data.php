<?php
require_once "config/database.php";


// $jumlah_lansia = 0 ;
// $jumlah_penumpang = 0 ;
// $kelas  = array('ekonomi' , 'bisnis' , 'eksekutif');

// $diskon = 0.1;
$harga  = 0;
$total  = 0;
if(isset($_POST['hitung'])){
  
  $berangkat        = $_POST['berangkat'];
	$jumlah_penumpang        = $_POST['jumlah_penumpang'];
	$jumlah_lansia        = $_POST['jumlah_lansia'];
  $kelas        = $_POST['kelas'];


if ($kelas=="ekonomi"){
  $harga=100000;
  }
else if ($kelas=="bisnis"){
  $harga=20000;
  }
else {
  $harga=25000;
  }
if ($jumlah_lansia>=1){
  $diskon = $harga/10;
  }
$totalbayar=$jumlah_penumpang*$harga;
$totalbayar1=$harga-$diskon;
$total=$totalbayar+$totalbayar1;
}
header('location: index.php');


if (isset($_POST['simpan'])) 
{

        $nama        = $_POST['nama'];
        $no_identitas        = $_POST['no_identitas'];
        $no_hp        = $_POST['no_hp'];
        $kelas        = $_POST['kelas'];
        $berangkat        = $_POST['berangkat'];
        $jumlah_penumpang        = $_POST['jumlah_penumpang'];
        $jumlah_lansia        = $_POST['jumlah_lansia'];

    if ($kelas=="ekonomi"){
        $harga=10000;
        }
    else if ($kelas=="bisnis"){
        $harga=20000;
        }
    else {
        $harga=25000;
        }
    if ($jumlah_lansia>=1){
        $diskon = $harga/10000;
        }
    $totalbayar=$jumlah_penumpang*$harga;
    $totalbayar1=$harga-$diskon;
    $total=$totalbayar+$totalbayar1;

    

        // perintah query untuk menyimpan data ke tabel is_siswa
        $query = mysqli_query($db, "INSERT INTO tb_pemesanan (nama,
                                                        no_identitas,
                                                        no_hp,
                                                        kelas,
                                                        berangkat,
                                                        jumlah_penumpang,
                            jumlah_lansia)	
                                                VALUES('$nama',
                                                        '$no_identitas',
                                                        '$no_hp',
                                                        '$kelas',
                                                        '$berangkat',
                                                        '$jumlah_penumpang',
                                                        '$jumlah_lansia')");		


        // cek hasil query
        if ($query) {
        // print_r($query);
            // die;
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: index.php');
            
        } else {
            // jika gagal tampilkan pesan kesalahan
            header('location: index.php');
        }	
}


?>
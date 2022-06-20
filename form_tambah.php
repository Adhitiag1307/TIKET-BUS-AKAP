<?php
require_once "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Aplikasi Pemesan Tiket</title>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    
    <!-- styles -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Fungsi untuk membatasi karakter yang diinputkan -->

  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
            <i class="glyphicon glyphicon-check"></i>
             Pemesan Tiket Trevel
          </a>
        </div>
      </div> <!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
 
    <?php
require_once "config/database.php";


// $jumlah_lansia = 0 ;
// $jumlah_penumpang = 0 ;
// $kelas  = array('ekonomi' , 'bisnis' , 'eksekutif');

$diskon = 10;
$harga  = 0;
$total  = 0;
// $jumlah_lansia  = 0;
if(isset($_POST['hitung'])){
  
  $berangkat        = $_POST['berangkat'];
	$jumlah_penumpang        = $_POST['jumlah_penumpang'];
	$jumlah_lansia        = $_POST['jumlah_lansia'];
  $kelas        = $_POST['kelas'];


if ($kelas=="ekonomi"){
  $harga=50000;
  }
else if ($kelas=="bisnis"){
  $harga=75000;
  }
else {
  $harga=100000;
  }
if ($jumlah_lansia>=1){
  $diskon = $harga/10;
  }
  $totalbayar=$jumlah_penumpang*$harga;
  $totalbayar2=$jumlah_lansia*$harga;
  // $totalbayar1=$harga-$diskon;
  $total=$totalbayar+$totalbayar2;
}





if (isset($_POST['simpan'])) 
{

	$nama        = $_POST['nama'];
	$no_identitas        = $_POST['no_identitas'];
	$no_hp        = $_POST['no_hp'];
	$kelas        = $_POST['kelas'];
	$berangkat        = $_POST['berangkat'];
	$jumlah_penumpang        = $_POST['jumlah_penumpang'];
	$jumlah_lansia        = $_POST['jumlah_lansia'];
	$harga_tiket        = $_POST['harga_tiket'];
	$total_bayar        = $_POST['total_bayar'];

  if ($kelas=="ekonomi"){
    $harga=50000;
    }
else if ($kelas=="bisnis"){
    $harga=75000;
    }
else {
    $harga=100000;
    }
if ($jumlah_lansia>=1){
    $diskon = $harga/10;
    }
    $totalbayar=$jumlah_penumpang*$harga;
    $totalbayar2=$jumlah_lansia*$harga;
    // $totalbayar1=$harga-$diskon;
    $total=$totalbayar+$totalbayar2;
  

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysqli_query($db, "INSERT INTO tb_pemesanan (nama,
													 no_identitas,
													 no_hp,
													 kelas,
													 berangkat,
													 jumlah_penumpang,
													 harga_tiket,
													 total_bayar,
                           jumlah_lansia)	
											  VALUES('$nama',
													 '$no_identitas',
													 '$no_hp',
													 '$kelas',
													 '$berangkat',
													 '$jumlah_penumpang',
													 '$harga_tiket',
													 '$total_bayar',
													 '$jumlah_lansia')");		


	// cek hasil query
	if ($query) {
    // print_r($query);
		// die;
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: form_tambah.php');
		
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: form_tambah.php');
	}	

}	?>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Input data tiket travel akap
        </h4>
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="form_tambah.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Lengkap </label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nama"  autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No Identitas</label>
              <div class="col-sm-3">
                <input type="text" class="form-control"  name="no_identitas" autocomplete="off"maxlength="16" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No Hp</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="no_hp"   autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kelas </label>
              <div class="col-sm-3">
                <select class="form-control"  name="kelas" placeholder="Pilih Agama" required>
                  <option value="">-- pilih data --</option>
                  <option value="ekonomi">ekonomi</option>
                  <option value="eksekutif">eksekutif</option>
                  <option value="bisnis">bisnis</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jadwal Kebarangkatan</label>
              <div class="col-sm-2">
                <input type="date" class="form-control"  name="berangkat" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Penumpang <br>
                <small >Bukan Lansia ( Usai < 60 )</small>
              </label>
              
              <div class="col-sm-2">
                <input type="text" class="form-control"  name="jumlah_penumpang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Penumpang Lansia
                <br>                 <small > Lansia ( usia > 60 )</small>
              </label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="jumlah_lansia"  autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Harga Tiket
              </label>
              <div class="col-sm-2"> 
                <input type="text" class="form-control" value="<?php echo $harga;
?>" name="harga_tiket" autocomplete="off"  onKeyPress="return goodchars(event,'0123456789',this)" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Total Bayar
              </label>
              <div class="col-sm-2">
                <input type="text" class="form-control"  value="<?php echo "Rp.".Number_format( $total) ; ?>" name="total_bayar" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" readonly>
              </div>
            </div>
            
            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="checkbox" name="ceklis" id=""> Saya  dan / atau dan rombongan telah membaca , memahami , dan setuju dan berdasarkan  <br>
                syarat dan ketentuan yang di tetapkan <br>
                <br>
                <input type="submit" class="btn btn-info btn-submit" name="hitung" value="Hitung ">
                <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Pesan ">
                <input type="reset" class="btn btn-info btn-submit" name="simpan" value="cencel ">
                <!-- <a href="index.php" class="btn btn-default btn-reset">Batal</a> -->
              </div>
            </div>
            <video controls>
    <source src="assets/video/interior_bus.mp4" type="video/mp4" />
    Browsermu tidak mendukung tag ini, upgrade donk!
  </video>
          </form>
        </div> <!-- /.panel-body -->
        <table class="table table-striped table-hover">
              
              <tbody>
              <?php
					$no = 1;
					$tampil = mysqli_query($db, "SELECT * from tb_pemesanan order by id_pemesanan desc");
					while ($data = mysqli_fetch_array($tampil)) :
					?>
						<tr>
              <th>Nama Pemesanan</th>
              <td><?= $data['nama'] ?></td>
						</tr>
						<tr>
              <th>Nomor Identitas</th>
              <td><?= $data['no_identitas'] ?></td>
						</tr>
						<tr>
              <th>kelas </th>
              <td><?php if($data['kelas']== 'ekonomi') {
                        echo "<img src=assets/img/data2.jpg></img>";
                        echo "<br>";
                        echo $data['kelas'];
                        }elseif($data['kelas']== 'bisnis') {
                          echo "<img src=assets/img/data3.jpg></img>";
                          echo "<br>";
                          echo $data['kelas'];
                        }elseif($data['kelas']== 'eksekutif') {
                          echo "<img src=assets/img/data4.jpg></img>";
                          echo "<br>";
                          echo $data['kelas'];
                        }?>
              </td>
						</tr>
            <!----Tempat video---->
            

						<tr>
              <th>jumlah_penumpang</th>
              <td><?= $data['jumlah_penumpang'] ?></td>
						</tr>
						<tr>
              <th>jumlah_lansia	</th>
              <td><?= $data['jumlah_lansia'] ?></td>
						</tr>
						<tr>
              <th>berangkat</th>
              <td><?= $data['berangkat'] ?></td>
						</tr>
						<tr>
              <th>No HP</th>
              <td><?= $data['no_hp'] ?></td>
						</tr>
            <tr>
              <th>Harga Tiket</th>
              <td><?= $data['harga_tiket'] ?></td>
              
						</tr>        
            <tr>
              <th>Total harga</th>
              <td><?= $data['total_bayar'] ?></td>
               
						</tr>        
					
					<?php endwhile; //penutup perulangan while 
					?>
              </tbody>   
             
            </table>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->

    </div> <!-- /.container-fluid -->
    
    <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted pull-left">&copy; 2022 Adhitia Gunardi</p>
        <!-- <p class="text-muted pull-right ">Theme by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p> -->
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();
      })
    </script>
  </body>
</html>
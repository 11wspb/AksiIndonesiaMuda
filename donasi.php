<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="img/favicon-aim.png">

    <title>Aksi Indonesia Muda | Donasi</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap for JS-->
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">

  </head>
  <body id="body">
    <?php

    $statusMsg = '';
    $msgClass = '';
    if(isset($_POST['submit'])){
        // Get the submitted form data
        $email = $_POST['email'];
        $name = $_POST['nama'];
        $nomor = $_POST['nomor'];
        $alamat = $_POST['alamat'];
        $donasi = $_POST['donasi'];
        $message = $_POST['pesan'];

        // Cek apakah ada data yang belum diisi
        if(!empty($email) && !empty($name) && !empty($nomor) && !empty($alamat) && !empty($donasi) && !empty($message)){

            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $statusMsg = 'Please enter your valid email.';
                $msgClassk = 'errordiv';
            }else{
                // Pengaturan penerima email dan subjek email
                $toEmail = 'aksiindonesiamuda@yahoo.com'; // Ganti dengan alamat email yang Anda inginkan
                $emailSubject = 'Pesan website dari '.$name;
                $htmlContent = '<h2> Form Donasi </h2>
                    <h4>Nama</h4><p>'.$name.'</p>
                    <h4>Nomor Hp.</h4><p>'.$nomor.'</p>
                    <h4>Alamat</h4><p>'.$alamat.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Jenis Donasi</h4><p>'.$donasi.'</p>
                    <h4>Pesan</h4><p>'.$message.'</p>';

                // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // Header tambahan
                $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";

                // Send email
                if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                    $statusMsg = 'Pesan Anda sudah terkirim dengan sukses !';
                    $msgClass = 'succdiv';
                }else{
                    $statusMsg = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
                    $msgClass = 'errordiv';
                }
            }
        }else{
            $statusMsg = 'Harap mengisi semua field data';
            $msgClass = 'errordiv';
        }
    }
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="box-shadow: 0 0px 12px 2px rgba(86, 99, 116, 0.25);background-color: white;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.html"><img src="img/judul1.png" alt="No gambar" id="aim-picture"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
      </div>
    </nav>

    <div class="container-fluid" style="padding-top: 140px;">
        <div class="col-sm-12 text-center">
          <h2 class="donasi-text">Ayo Berdonasi!</h2>
          <p class="text-form">Barang bekas anda dapat membantu beasiswa pendidikan anak sekolah dasar dan pemberdayaan masyarakat disabilitas.
          </p>
        </div>
  </div>
  <div id="donasi-contact" class="container-fluid" style="max-width: 700px;">
       <div class="col-sm-12" id="style-background" style="height: 780px;">
          <h2 class="text-cap text-center">Form Donasi</h2>
          <p class="text-center" id="text-cap">#ayodonasi</p>
          <form id="form-group" style=" font-family: sans-serif; font-weight: 500; margin-top: 45px;" id="myForm" action="#" method="POST" onSubmit="validasi()">
            <div class="form-group">
              <input align="center" name="nama" type="text" class="form-control" id="nama" placeholder="Nama" required="">
            </div>
            <div class="form-group">
              <input type="tel" name="nomor" class="form-control" id="telepon" placeholder="No. Telepon" required="">
            </div>
            <div class="form-group">
              <input align="center" name="alamat" type="text" class="form-control" id="nama" placeholder="Alamat" required="">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <select class="form-control" name="donasi" id="exampleFormControlSelect1">
                <option class="active">Jenis Donasi</option>
                <option>Pakaian</option>
                <option>Alat Tulis</option>
                <option>Sepatu</option>
                <option>Tas</option>
                <option>Sepatu</option>
                <option>Kertas</option>
                <option>Dana</option>
                <option>Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1" style="color: black">Pesan</label>
              <textarea class="form-control" name="pesan" id="pesan" rows="3" style="height: 100px;"></textarea>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-danger" style="font-weight: 600;" id="button-kirim">Kirim</button>
                <p style="font-family: sans-serif; font-weight: 500; font-size: 12px; margin-top: 5px; color: black;">Silahkan isi semua data yang ada diatas!</p>
              </div>
            </div>
        </form>
      </div>
  </div>
  <div id="footer">
    <div class="container-fluid" id="section-footer">
      <div class="row animated opacity mar-bot20" data-animation="animation">
      <div class="col-sm-12 align-center">
      <ul class="sosial-network social-circle">
        <li>
          <a href="https://www.facebook.com/AksiIndonesiaMuda/" class="fa fa-facebook" id="IcoFacebook"></a>
          <a href="https://twitter.com/aksi_muda?lang=en" class="fa fa-twitter" id="IcoTwitter"></a>
          <a href="https://www.instagram.com/aksiindonesiamuda/?hl=en" class="fa fa-instagram" id="IcoInstagram"></a>
          <a href="https://www.youtube.com/channel/UCobAaXnaHznKbNMyNyoR9vw" class="fa fa-youtube" id="IcoYoutube"></a>
        </li>
    </ul>
      </div>
      </div>
    <div class="row align-center copyright">
      <div class="col-sm-12">
        <p style="margin-bottom: 1px;" class="footer">Copyright © Aksi Indonesia Muda</p>
      </div>
    </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    function validasi(){
      var nama = document.getElementById("nama").value;
      var number = document.getElementById("telepon").value;
      var email = document.getElementById("email").value;
      var pesan = document.getElementById("pesan").value;
      if(nama != "" && number!="" && email !="" && pesan !=""){
        alert('Data anda telah terkirim, Silahkan menunggu konfirmasi kami melalui email');
        return true;
      }else{
        alert('Anda Harus mengisi data dengan lengkap !');
      }
    }
  </script>
</body>
</html>

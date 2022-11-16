<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Tracer Study UNIMAR AMNI Semarang</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="stylish Sign in and Sign up Form A Flat Responsive widget, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


	<link href="<?php echo base_url() ?>assets/1/css/style.css" rel='stylesheet' type='text/css' media="all" /><!--stylesheet-->
	<style type="text/css">
		.alert {
    padding: 20px;
    background-color: #32ea32;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}

.alert {
    opacity: 1;
    transition: opacity 0.6s; /* 600ms to fade out */
}

	</style>
</head>
<body>
  <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
      }else if($_GET['pesan'] == "logout"){
        echo "<div class='alert alert-danger'>Anda telah logout.</div>";
      }else if($_GET['pesan'] == "belumlogin"){
        echo "<div class='alert alert-success'>Silahkan login dulu.</div>";
      }
    }
    ?>
<h1>Tracer UNIMAR AMNI Semarang</h1>
<div class="form-w3ls">
	<div class="form-head-w3l" align="center">
		<img src="<?php echo base_url() ?>assets/1/images/amni-png.png" width="20%">
	</div>
    <ul class="tab-group cl-effect-4">
        <li class="tab active"><a href="#signin-agile">Masuk</a></li>
		<li class="tab"><a href="#signup-agile">Daftar</a></li>        
    </ul>
    <div class="tab-content">
        <div id="signin-agile">  
        <?php echo $this->session->flashdata('message');?> 
			<form action="<?php echo base_url() ?>Login/login" method="post">
				
				<p class="header">NIM / NRP</p>
				<input type="text" name="nim" placeholder="Masukan NIM / NRP" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" required="required">
				
				<p class="header">Password</p>
				<input type="password" name="password" id="password" placeholder="Masukan Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="required">
				
				<input type="checkbox" id="brand" value="" onclick="myFunction()">
				<label for="brand"><span></span> Tampilkan Password</label>
				
				<input type="submit" class="sign-in" value="Sign In">
			</form>
		</div>
		<div id="signup-agile">   
			<form action="<?php echo base_url() ?>Login/insertReg" method="post">

				<p class="header">NIM / NRP</p>
				<input type="text" name="nim" placeholder="Masukan NIM / NRP" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan NIM / NRP';}" required="required">

                <p class="header">NIK</p>
                <input type="text" name="nik" placeholder="Masukan Nomor Induk Kependudukan" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Nomor Induk Kependudukan';}" required="required">

							
				<p class="header">Password</p>
				<input type="password" name="password" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="required">

				<p class="header">Bekerja</p>
           <input type="radio" name="bekerja" id="bekerja" value="1" onclick="">
           <label>Ya</label>
           <input type="radio" name="bekerja" id="bekerja" value="2" onclick="">
           <label>Tidak</label>
           <div style="margin-bottom: 20px;"></div>
				
				<p class="header">Nama Perusahaan</p>
				<input type="text" name="nama_p" placeholder="Nama Perusahaan" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Nama Perusahaan';}" required="required">
				<p class="header">Jabatan</p>
				<input type="text" name="jabatan" placeholder="Jabatan" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Jabatan';}" required="required">

        <p class="header">Tahun Lulus </p>
        <input type="text" name="thn_lulus" placeholder="Isi dengan Tahun Lulus" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Jeda Waktu';}" required="required">

				<p class="header">Jeda (Bulan) </p>
				<input type="text" name="jeda" placeholder="Masa Tunggu Mendapatkan Pekerjaan (Bulan)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Jeda Waktu';}" required="required">
				
        <p class="header">Email </p>
        <input type="email" name="email" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Email';}" required="required">

        <p class="header">No. Telp / Hp </p>
        <input type="text" name="no_telp" placeholder="No Telp / Hp" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan No. Telepon / Hp';}" required="required">

         <p class="header">NPWP</p>
                <input type="text" name="npwp" placeholder="isi NPWP anda" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan NPWP';}" required="required">

           <p class="header">Domisili Sekarang </p>
				<input type="text" name="domisili" placeholder="Domisili Sekarang" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukan Domisili Sekarang';}" required="required">

            
			
				
				<input type="submit" class="register" value="Sign up">
			</form>
		</div> 
    </div><!-- tab-content -->
</div> <!-- /form -->	  
<p class="copyright">&copy; 2018 Tracer Study UNIMAR AMNI Semarang. All Rights Reserved | IT UNIMAR AMNI Semarang, Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
<!-- js files -->
<script src='<?php echo base_url() ?>assets/1/js/jquery.min.js'></script>
<script src="<?php echo base_url() ?>assets/1/js/index.js"></script>
<!-- /js files -->
</body>
</html>
<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
    // When someone clicks on a close button
    close[i].onclick = function(){

        // Get the parent of <span class="closebtn"> (<div class="alert">)
        var div = this.parentElement;

        // Set the opacity of div to 0 (transparent)
        div.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>

</script>
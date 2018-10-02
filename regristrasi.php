<?php
    $error_nim = "";
    $error_nama = "";
    $error_email = "";

if(isset($_POST['submit'])){
    $nim =$_POST['nim'];
    $nama =$_POST['nama'];
    $email =$_POST['email'];


    //validasi nim
    if($nim == ""){
        $error_nim= "NIM tidak boleh kosong";
    }else{
        if(strlen($nim)<>10){
        $error_nim= "NIM harus 10 karakter";
        };
        if(!is_numeric($nim)){
          $error_nim= " Harus berupa angka";
        } 
    }

    //validasi nama
    if ($nama == "") {
      $error_nama= "Nama tidak boleh kosong";
    }else{
      if(strlen($nama)>25){
        $error_nama= "Nama maksimal 25 karakter";
      }if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_nama = "Hanya huruf dan spasi yang diizinkan";
      }
    }

    //validasi email
    if ($email == "") {
      $error_email= "E-mail tidak boleh kosong";
    }else{
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email salah";
      }
    }

    include 'prosesregis.php';
    $data = "INSERT INTO `regis`(`nim`, `nama`, `email`) VALUES ('$nim','$nama','$email')";
    $simpan = $db->query($data);
    if ($simpan) {
      echo "<p>Data telah tersimpan di database!</p>";
    }else{
      echo "Proses penyimpanan error";
    }
  }
?>

<form method="post">
    NIM : 
    <input type="text" name="nim" id="nim"/><span style="color:red"><?php echo $error_nim; ?></span><br>
    NAMA : 
    <input type="text" name="nama"><span style="color:red"><?php echo $error_nama; ?></span><br>
    EMAIL : 
    <input type="text" name="email"><span style="color:red"><?php echo $error_email; ?></span><br>
    <input type="submit" name="submit" value="simpan" />
</form>

<?php  
	$error_komentar="";
	if (isset($_POST['submit'])) {
		$komentar=$_POST['komentar'];

		if(str_word_count($komentar)<5){
        $error_komentar= "Komentar harus lebih dari 5 kata!";
      	}else{
      		$jumlah=str_word_count($komentar);
      	echo "Jumlah kata pada Komentar adalah $jumlah .";
      	}	
	}
?>

<form method="POST">
	<p>Komentar : <textarea name="komentar"></textarea><span style="color:red"><?php echo $error_komentar; ?></span></p>
	<input type="submit" name="submit">
</form>

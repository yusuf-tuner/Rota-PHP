<?php require_once "connection.php"; ?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
	<title> Müşteri Bilgileri </title>
</head>
<body>
	<h2>Müşteri Bilgileri Düzenleme Ekranı</h2>
	<hr>

	<?php 
	if ($_GET["durum"]=="succes") {
		echo "İşlem Başarılıdır.."; 
	}
	elseif ($_GET["durum"]=="fail") {
		echo "İşlem Başarısızdır..";
	}

	?>

	<?php 
	$musteribilgi=$db->prepare("SELECT * from musteri where musteri_id=:id");
	$musteribilgi->execute(array(
		"id"=>$_GET["musteri_id"]
	));
	
	$mustericek=$musteribilgi->fetch(PDO::FETCH_ASSOC);
	?>

	<form action="process.php" method="POST" class="form-inline">

		<div class="form-group">
			<input type="text" style="width: 12%" name="musteri_ad" placeholder="İsim giriniz." value="<?php echo $mustericek["musteri_ad"] ?>" class="form-control">
			<input type="text" style="width: 12%" name="musteri_soyad" placeholder="Soyisim giriniz." value="<?php echo $mustericek["musteri_soyad"] ?>" class="form-control">
			<input type="text" style="width: 12%" name="musteri_tc" placeholder="T.C kimlik giriniz." value="<?php echo $mustericek["musteri_tc"] ?>" class="form-control">
			<input type="text" style="width: 12%" name="musteri_adres" placeholder="Adresinizi giriniz." value="<?php echo $mustericek["musteri_adres"] ?>" class="form-control">
			<input type="mail" style="width: 12%" name="musteri_mail" placeholder="Mail adresi Giriniz" value="<?php echo $mustericek["musteri_mail"] ?>" class="form-control">
			<input type="text" style="width: 12%" name="musteri_no" placeholder="Telefon no giriniz." value="<?php echo $mustericek["musteri_no"] ?>" class="form-control">

			<input type="hidden" name="musteri_id" value="<?php echo $mustericek["musteri_id"] ?>">
			<button type="submit" name="_updatebutton" class="form-control" > Düzenle </button>
		</div>
		
		<hr>		

	</form>
	
	<a href="index.php" class="anasayfa_buton" ><button  type="submit" name="anasayfa" class="form-control"> Anasayfa Dön </button></a>

</body>
</html>
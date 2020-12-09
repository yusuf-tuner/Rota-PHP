<?php require_once "connection.php"; ?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
	<title> Müşteri Bilgileri </title>
</head>
<body>
	<h2>Sipariş Bilgileri Düzenleme Ekranı</h2>
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
	
	$siparisbilgi=$db->prepare("SELECT * from siparis where siparis_id=:id");
	$siparisbilgi->execute(array(
		"id"=>$_GET["siparis_id"]
	));
	
	$sipariscek=$siparisbilgi->fetch(PDO::FETCH_ASSOC);

	?>

	<form action="process.php" method="POST" class="form-inline">

		<div class="form-group">
			<input class="form-control" style="width: 12%" type="text" name="siparis_no" placeholder="Siparis Numara" value="<?php echo $sipariscek["siparis_no"] ?>" >
			<input class="form-control" style="width: 12%" type="text" name="siparis_tarih" placeholder="Tarih" value="<?php echo $sipariscek["siparis_tarih"] ?>">
			<input class="form-control" style="width: 12%" type="text" name="urun_ad" placeholder="Ürün ad " value="<?php echo $sipariscek["urun_ad"] ?>" >
			<input class="form-control" style="width: 12%" type="text" name="urun_fiyat" placeholder="Ürün fiyat" value="<?php echo $sipariscek["urun_fiyat"] ?>" >
			<input class="form-control" style="width: 12%" type="mail" name="urun_adet" placeholder="Ürün adet" value="<?php echo $sipariscek["urun_adet"] ?>" >

			<select name="musteri_id" class="form-control">

				<?php


				$musterikontrol=$db->prepare("SELECT * from musteri ");
				$musterikontrol->execute(); // derleme yapıldı.


				while ($musteri_secim=$musterikontrol->fetch(PDO::FETCH_ASSOC)) { ?>

					<?php if ($sipariscek["musteri_id"]==$musteri_secim["musteri_id"]){ ?>

						<option selected="selected" value="<?php echo $musteri_secim["musteri_id"] ?> "> <?php echo $musteri_secim["musteri_id"]."-".$musteri_secim["musteri_ad"]." ".$musteri_secim["musteri_soyad"] ?> </option>

					<?php } else{  ?>

						<option value="<?php echo $musteri_secim["musteri_id"] ?>"> <?php echo $musteri_secim["musteri_id"]."-".$musteri_secim["musteri_ad"]." ".$musteri_secim["musteri_soyad"] ?> </option>
					<?php }  ?>

				<?php } ?>
				

			</select> 
			<input type="hidden" name="siparis_id" value="<?php echo $sipariscek["siparis_id"] ?>">
			<button type="submit" name="_updatesip" class="form-control"> Siparis Düzenle </button>
		</div>

		<hr>

	</form>
	<div class="form-group">
		<a href="siparis.php" class="anasayfa_buton"><button type="submit" name="siparis" class="form-control">Siparisler</button></a>

	</div>


</body>
</html>
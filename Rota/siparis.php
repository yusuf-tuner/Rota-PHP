<?php require_once "connection.php"; ?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
	
	<title> SİPARİŞ </title>
</head>
<body>
	<h2>Sipariş Bilgileri</h2>
	<hr>
	<button  type="submit" name="siparis" class="form-control" style="width: 100px; float: right;  margin-right: 5%; " > <a href="index.php" style="width: 100%; color:black;" > Müsteriler </a></button>
		<br><hr>
	
	<form action="process.php" method="POST" class="form-inline">
		<div class="form-group">
			<label>Müşteri Seçiminizi Yaparak devam edebilirsiniz.  </label>
			<select name="musteri_id" class="form-control" > 
				<?php


				$musterikontrol=$db->prepare("SELECT * from musteri ");
				$musterikontrol->execute(); // derleme yapıldı.


				while ($musteri_secim=$musterikontrol->fetch(PDO::FETCH_ASSOC)) { ?>

					<option value="<?php echo $musteri_secim["musteri_id"] ?> "> <?php echo $musteri_secim["musteri_id"]."- ".$musteri_secim["musteri_ad"]." ".$musteri_secim["musteri_soyad"]; ?> </option>

				<?php }; ?>

			</select> 
		</div>
		<br> <br>


		<div class="form-group">
			<input type="number" class="form-control" required="" name="siparis_no" placeholder="siparis numarası giriniz.">
		</div>
		<div class="form-group">
			<input type="date" class="form-control"  required="" name="siparis_tarih">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" required="" name="urun_ad" placeholder="sipariş adı giriniz.">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" required="" name="urun_fiyat" placeholder="sipariş fiyatı giriniz.">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" required="" name="urun_adet" placeholder="sipariş adet giriniz">
		</div>




		<button type="submit" class="form-control" name="_insertsiparis">Sipariş Ekle</button>

	</form>
	<hr>

	

	<br>
	<h3>Sipariş Listesi</h3>
	<hr>
	<table style="width: 80%" border="1" class="table">
		<tr>
			<th>Siparis ID</th>
			<th>Siparis No</th>
			<th>Müşteri</th>
			<th>Siparis Tarih</th>
			<th>Ürün Adı</th>
			<th>Ürün Fiyat</th>
			<th>Ürün Adet</th>

			<th width="50">İşlemler</th>
			<th width="50">İşlemler</th>
		</tr>

		<?php 
		$siparisbilgi=$db->prepare("SELECT * from siparis as s inner join musteri as m on s.musteri_id=m.musteri_id");
		$siparisbilgi->execute();

		while ($sipariscek=$siparisbilgi->fetch(PDO::FETCH_ASSOC)) { ?>

			<tr>
				<td> <?php echo $sipariscek["siparis_id"]; ?> </td>
				<td> <?php echo $sipariscek["siparis_no"]; ?> </td>
				<td> <?php echo $sipariscek["musteri_ad"]; ?> </td>
				<td> <?php echo $sipariscek["siparis_tarih"]; ?> </td>
				<td> <?php echo $sipariscek["urun_ad"]; ?> </td>
				<td> <?php echo $sipariscek["urun_fiyat"]; ?> </td>
				<td> <?php echo $sipariscek["urun_adet"]; ?> </td>



				<td align="center"> <a href="siparisEdit.php?siparis_id= <?php echo $sipariscek["siparis_id"] ?>"> <button>Düzenle</button></a> </td>

				<td align="center"> 
					<a href="process.php?siparis_id= <?php echo $sipariscek["siparis_id"] ?>&siparisBilgisi=ok"> <button>Sil</button></a> 
				</td>
			</tr>

		<?php 	}; ?>


	</table> <br><br>


</body>
</html>
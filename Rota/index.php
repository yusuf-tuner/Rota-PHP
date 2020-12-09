<?php require_once "connection.php"; ?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
	<title> Müşteri Bilgileri </title>
</head>
<body>
	<h2>Müşteri Bilgileri Ekleme</h2>
	<hr>
	<button  type="submit" name="müsteri" class="form-control" style="width: 100px; float: right;  margin-right: 5%; " > <a href="siparis.php" style="width: 100%; color:black;" > Siparişler </a></button>
	<br><hr>
	<h4>Müşteri Bilgilerini Giriniz</h1>

		<?php 

		if ($_GET["durum"]=="succes") {
			echo "işlem başarılı..";
		}
		elseif ($_GET["durum"]=="fail") {
			echo "işlem başarısız..";
		}

		?>

		<form action="process.php" method="POST" class="form-inline">

			<div class="form-group" >
				<input type="text" style="width: 12%" required="" name="musteri_ad" placeholder="İsim " class="form-control">


				<input type="text" style="width: 12%" required="" name="musteri_soyad" placeholder="Soyisim " class="form-control">

				<input type="number" style="width: 12%" required="" name="musteri_tc" placeholder="T.C kimlik " class="form-control">

				<input type="text" style="width: 15%" required="" name="musteri_adres" placeholder="Adres" class="form-control">

				<input type="email"style="width: 15%" required="" name="musteri_mail" placeholder="E-mail" class="form-control">

				<input type="number" style="width: 12%" required="" name="musteri_no" placeholder="Telefon No" class="form-control">
				

				
				<button type="submit" name="_insertbutton" class="form-control">Kullanıcı Ekle</button>
			</div>
			
		</form>

		

		<br>

		<h3> Müşterilerin Listesi</h3>
		<hr>
		<table style="width: 95%" border="1" class="table">
			<tr>
				<th>Sıra</th>
				<th>ID</th>
				<th>Ad</th>
				<th>Soyad</th>
				<th>T.C</th>
				<th>Müsteri Adres</th>
				<th>Müsteri Mail</th>
				<th>Müsteri Tel.</th>

				<th>İşlemler</th>
				<th>İşlemler</th>
			</tr>

			<?php 
			$musteribilgi=$db->prepare("SELECT * from musteri");
			$musteribilgi->execute();
			$sıraNo=0;

			while ($mustericek=$musteribilgi->fetch(PDO::FETCH_ASSOC)) {
				$sıraNo++; ?>

				<tr>
					<td> <?php echo $sıraNo; ?> </td>
					<td> <?php echo $mustericek["musteri_id"]; ?> </td>
					<td> <?php echo $mustericek["musteri_ad"]; ?> </td>
					<td> <?php echo $mustericek["musteri_soyad"]; ?> </td>
					<td> <?php echo $mustericek["musteri_tc"]; ?> </td>
					<td> <?php echo $mustericek["musteri_adres"]; ?> </td>
					<td> <?php echo $mustericek["musteri_mail"]; ?> </td>
					<td> <?php echo $mustericek["musteri_no"]; ?> </td>

					<td align="center"> <a href="edit.php?musteri_id= <?php echo $mustericek["musteri_id"] ?>"> <button>Düzenle</button></a> </td>

					<td align="center"> 
						<a href="process.php?musteri_id= <?php echo $mustericek["musteri_id"] ?>&musteribilgisil=ok"> <button>Sil</button></a> 
					</td>
				</tr>



			<?php 	}; ?>

			
		</table>


	</body>
	</html>
<?php 
require_once "connection.php";

if (isset($_POST["_insertbutton"])) { // veri tabanına müşteri bilgilerimi ekledim.
	
	$kaydet=$db->prepare("INSERT into musteri set 

		musteri_ad=:musteri_ad,
		musteri_soyad=:musteri_soyad,
		musteri_tc=:musteri_tc,
		musteri_adres=:musteri_adres,
		musteri_mail=:musteri_mail,
		musteri_no=:musteri_no
		");

	$insert=$kaydet->execute(array(

		'musteri_ad'=>$_POST['musteri_ad'],
		'musteri_soyad'=>$_POST['musteri_soyad'],
		'musteri_tc'=>$_POST['musteri_tc'],
		'musteri_adres'=>$_POST['musteri_adres'],
		'musteri_mail'=>$_POST['musteri_mail'],
		'musteri_no'=>$_POST['musteri_no'],
	));

	if ($insert) { // eklediğim amüsteri bilgileri için kontrol yaptırdım.
		header ("Location:index.php?durum=succes"); 
		exit;
	}
	else{
		header ("Location:index.php?durum=fail"); 
		exit;
	}
}

if (isset($_POST["_updatebutton"])) { // müsteri bilgileri üzerinde güncelleştirme yaptırdım.

	$musteri_id=$_POST["musteri_id"];  
	
	$güncelle=$db->prepare("UPDATE musteri set 

		musteri_ad=:musteri_ad,
		musteri_soyad=:musteri_soyad,
		musteri_tc=:musteri_tc,
		musteri_adres=:musteri_adres,
		musteri_mail=:musteri_mail,
		musteri_no=:musteri_no
		where musteri_id={$_POST["musteri_id"]}
		");

	$insert=$güncelle->execute(array(

		'musteri_ad'=>$_POST['musteri_ad'],
		'musteri_soyad'=>$_POST['musteri_soyad'],
		'musteri_tc'=>$_POST['musteri_tc'],
		'musteri_adres'=>$_POST['musteri_adres'],
		'musteri_mail'=>$_POST['musteri_mail'],
		'musteri_no'=>$_POST['musteri_no']
	));

	if ($insert) {   // post aldığım müsteri_id göre kontrol gerçekleştirdim.
		header ("Location:edit.php?durum=succes&musteri_id=$musteri_id"); 
		exit;
	}else{
		header ("Location:edit.php?durum=fail&musteri_id=$musteri_id"); 
		exit;
	} 
}



// müsteri bilgileri silinince hem müsteri hemde siparis alanında tanımlı müşterinin sipariş bilgilerinin silinmesi işlemini gerçekleştirdim.
// index.php sayfasından aldığım müsteribilgisil alanı kontrolü
if ($_GET["musteribilgisil"]=="ok") { 	
	
	$delete=$db->prepare("DELETE from musteri where musteri_id=:id");
	$delete2=$db->prepare("DELETE from siparis where musteri_id=:id");
	$kontrol=$delete->execute(array(
		"id"=> $_GET["musteri_id"]
	));
	$kontrol2=$delete2->execute(array(
		"id"=> $_GET["musteri_id"]
	));

	if ($kontrol and $kontrol2) {

		//echo "kayıt başarılı";

		header("Location:index.php?durum=succes");
		exit;

	}else{

		//echo "kayıt başarısız.";
		header("Location:index.php?durum=fail");
		exit;
	}
}




if (isset($_POST["_insertsiparis"])) {  	// sipariş bilgileri veri tabanı kayıt işlemi..
	
	$kaydet=$db->prepare("INSERT into siparis set 

		siparis_no=:siparis_no,
		siparis_tarih=:siparis_tarih,
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_adet=:urun_adet,
		musteri_id=:musteri_id
		");

	$insert=$kaydet->execute(array(

		'siparis_no'=>$_POST['siparis_no'],
		'siparis_tarih'=>$_POST['siparis_tarih'],
		'urun_ad'=>$_POST['urun_ad'],
		'urun_fiyat'=>$_POST['urun_fiyat'],
		'urun_adet'=>$_POST['urun_adet'],
		'musteri_id'=>$_POST['musteri_id']
		
	));

	if ($insert) {
		header ("Location:siparis.php?durum=succes"); 
		exit;
	}
	else{
		header ("Location:siparis.php?durum=fail"); 
		exit;
	}
}

if (isset($_POST["_updatesip"])) {			// sipariş bilgileri güncelleme işlemi..

	$siparis_id=$_POST["siparis_id"];
	
	$güncelle=$db->prepare("UPDATE siparis set 

		siparis_no=:siparis_no,
		siparis_tarih=:siparis_tarih,
		urun_ad=:urun_ad,
		urun_fiyat=:urun_fiyat,
		urun_adet=:urun_adet,
		musteri_id=:musteri_id
		where siparis_id={$_POST["siparis_id"]}
		");

	$insert=$güncelle->execute(array(

		'siparis_no'=>$_POST['siparis_no'],
		'siparis_tarih'=>$_POST['siparis_tarih'],
		'urun_ad'=>$_POST['urun_ad'],
		'urun_fiyat'=>$_POST['urun_fiyat'],
		'urun_adet'=>$_POST['urun_adet'],
		'musteri_id'=>$_POST['musteri_id']
	));

	if ($insert) {
		header ("Location:siparisEdit.php?durum=succes&siparis_id=$siparis_id"); 
		exit;
	}else{
		header ("Location:siparisEdit.php?durum=fail&siparis_id=$siparis_id"); 
		exit;
	}
}

if ($_GET["siparisBilgisi"]=="ok") {  		// siparis.php sayfasından aldığım siparisBilgisi alanına göre yaptırdığım kontrol..
	
	$delete=$db->prepare("DELETE from siparis where siparis_id=:id");
	$kontrol=$delete->execute(array(
		"id"=> $_GET["siparis_id"]
	));

	if ($kontrol) {

		//echo "kayıt başarılı";

		header("Location:siparis.php?durum=succes");
		exit;

	}else{

		//echo "kayıt başarısız.";
		header("Location:siparis.php?durum=fail");
		exit;
	}
}

?>
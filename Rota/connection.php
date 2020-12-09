<?php 

try{

	$db=new PDO("mysql:host=localhost;dbname=rota;charset=utf8",'root','695501966180');

	//echo "Veritabanı bağlantısı başarılı olmuştur.";
}
catch (PDOException $e){

	echo $e->getMessage();

}

?>
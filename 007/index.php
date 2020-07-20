<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php
		define('INC', '/includes/');
		require_once __DIR__ . INC . "/Global.inc.php";
		
		$thom = new Student("Thom","roman","thomtwd@gmail.com");
		$maurick = new Student("Maurick","roman","thom.maurick.r@gmail.com");

		$alexys = new Teacher("Alexys","Lozada","alexys@gmail.com");
		$yesiDays = new Teacher("Yesi","Days","yesi@gmail.com");

		$php = new Course("PHP",date('m/d/Y h:i:s'),$yesiDays,"USD",true);
		$goland = new Course("GO",date('m/d/Y h:i:s'),$alexys,"USD",true);

		echo $maurick::MONEDA;
		echo $alexys::MONEDA;

		var_dump($alexys);
		var_dump($yesiDays);

		var_dump($thom);
		var_dump($maurick);

		var_dump($goland);
		var_dump($php);


	?>
</body>

</html>
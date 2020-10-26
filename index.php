<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">



		
		
		<title>ApiApp</title>
	</head>
	<body>




<form>
<input type=text id="ide">

<input type=submit value="OK" onclick='buscar()'>
</form>



	</body>
</html>

<script type="text/javascript">
	function buscar(){

		var busca = document.getElementById("ide").value;



<?php

require_once 'app/config/config.php';
require_once 'app/modules/APIKey.php';



$sk = new TMDB_API(API_KEY);
$filme = $sk->movie_search();				
			


				 
				
foreach ($filme as $value) {
	var_dump($value['title'], $value['popularity']); 
}
 

?>

}

</script> 
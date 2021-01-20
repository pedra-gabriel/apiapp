<?php

require 'config.php';
require 'apikey.php';

?>


<html>
<head>
	<meta charset="utf-8">

	<style type="text/css">
	body {
		background-color: #111;
	}
	.card {
		background-color: #333;
		width: 30%;
		border-radius: 10px;
		text-align: center;
		display: inline-grid;
		margin-bottom: 20px;
		z-index: 1;
	}

	.card img {
		height: 200px;
		width: 100%;
		border-radius: 10px 10px 0 0;
		z-index: 1;
	}
	.card h3 {
		font-family: ubuntu;
	}
	#overview {
		height:130px;
		width:100%;
		overflow:auto;
	}
	#nav {
		background-color: black;
		border-radius: 5px;
	}
	.nav {
		display: inline-block;
		color: white;
		font-family: ubuntu;
	}

</style>

	<title>apiapp</title>
</head>
<body>

	<nav id="nav">

		<form method="POST" class="nav">
			<input type="text" name="search">
			<input type="submit"  value="Buscar">
		</form>

		<input type="checkbox" class="nav" id="rank">
		<p class="nav">ordenar por mais votado</p>


	</nav>

</body>
</html>

<?php

$sch = new API(API_KEY);
$busca = $sch->busca();

if(!is_null($busca)) { foreach ($busca as $key) { ?>

	<div class="card">
		<img src=<?php echo 'https://image.tmdb.org/t/p/w300/'.$key['backdrop_path']; ?>>
		<h3><?php echo $key['title']; ?></h3>
		<p><?php echo $key['vote_average']; ?>/10</p>
		<p id="overview"><?php echo $key['overview']; ?></p>
	</div>






	
	
<?php } }





?>
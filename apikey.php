<?php

require_once 'apiapp.php';

Class API
{	

	
	private $key = null;
	
	function __construct($api_key)
	{	
		
			$this->key = $api_key;
		
	}



	public function busca()
	{

		if(isset($_POST['search']))
		{

			$search = $_POST['search'];

			$uri = 'https://api.themoviedb.org/3/search/movie?api_key='. $this->key .'&language=en-US&query='. $search .'&page=1&include_adult=false';


			$get_cont = file_get_contents($uri);

			$data = json_decode($get_cont, true);



			return $data['results'];



		}

		

	

	}



}


















































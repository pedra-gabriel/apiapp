<?php

 require_once 'index.php';





class TMDB_API {



	private $key 	= null;
	private $error 	= false;

	function __construct ($key = null) {
		if (!empty($key)) $this->key = $key;
	}

	function request( $endpoint = '', $params = array() ) {
		$uri = "https://api.themoviedb.org/3/search/movie?api_key=" . $this->key . "&query=" . $endpoint . "&format=json";

		if (is_array($params) ) {

			foreach ($params as $key => $value) {
				if (empty($value)) continue;
				$uri .= $key . '=' . urlencode($value) . '&';
			}
			$uri		= substr($uri, 0, -1);
			$response	= @file_get_contents ($uri);
			$this->error = false;
			return json_decode($response, true);

		} else {
			$this->error = true;
			return false;
		}

	}

	

	function is_error() {
		return $this->error;
	}

	function movie_search() {

		global $busca;
		
		$data = $this->request($busca);

		if (!empty($data) && is_array($data['results']) ) {
			$this->error = false;
			return $data['results'];
			
		} else {
			$this->error = true;
			return false;
		}
	}




}
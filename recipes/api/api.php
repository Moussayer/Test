<?php

	require_once("Rest.inc.php");
	require_once("db.php");
	require_once("functions.php");

	class API extends REST {

		private $functions = NULL;
		private $db = NULL;

		public function __construct() {
			$this->db = new DB();
			$this->functions = new functions($this->db);
		}

		public function check_connection() {
			$this->functions->checkConnection();
		}

		/*
		 * ALL API Related android client -------------------------------------------------------------------------
		*/

		private function get_home() {
			$this->functions->getHome();
		}

		private function get_recent_recipes() {
			$this->functions->getRecentRecipes();
		}

		private function get_recipe_detail() {
			$this->functions->getRecipeDetail();
		}

		private function get_category_index() {
	        $this->functions->getCategoryIndex();
	    }

		private function get_category_posts() {
	        $this->functions->getCategoryPosts();
	    }

	    private function get_search_results() {
	        $this->functions->getSearchResults();
	    }

	    private function get_total_views() {
	        $this->functions->getTotalViews();
	    }

	    private function get_ads() {
	        $this->functions->getAds();
	    }

	    private function get_settings() {
	        $this->functions->getSettings();
	    }

	    private function get_user_token() {
	        $this->functions->getUserToken();
	    }

		/*
		 * End of API Transactions ----------------------------------------------------------------------------------
		*/

		public function processApi() {
			if(isset($_REQUEST['x']) && $_REQUEST['x']!=""){
				$func = strtolower(trim(str_replace("/","", $_REQUEST['x'])));
				if((int)method_exists($this,$func) > 0) {
					$this->$func();
				} else {
					echo 'processApi - method not exist';
					exit;
				}
			} else {
				echo 'processApi - method not exist';
				exit;
			}
		}

	}

	// Initiiate Library
	$api = new API;
	$api->processApi();

?>

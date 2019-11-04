<?php
    class Releases_moviesController
    {
        public $baseName = 'releases_movies';

        public function main(array $vars)
        {
            $options = array(
                "location" => SITE_ROOT . "soap/moviesservice.php",
                "uri" => SITE_ROOT . "soap/moviesservice.php",
                'keep_alive' => false,
                'trace' => true
            );
            
            try {
                $client = new SoapClient(null, $options);
                $view = new ViewLoader($this->baseName."_view");
                $view->assign('releases', $client->getMovies()['releases']);
            }
            catch (SoapFault $e) {
                echo $client->__getLastResponse();
                //var_dump($e);
            } 
        }
    }
?>
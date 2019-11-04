<?php
    class Releases_dvdsController
    {
        public $baseName = 'releases_dvds';

        public function main(array $vars)
        {
            $options = array(
                "location" => SITE_ROOT . "soap/dvdsservice.php",
                "uri" => SITE_ROOT . "soap/dvdsservice.php",
                'keep_alive' => false,
                'trace' => true
            );
            
            try {
                $client = new SoapClient(null, $options);
                $view = new ViewLoader($this->baseName."_view");
                $view->assign('releases', $client->getDvds()['releases']);
            }
            catch (SoapFault $e) {
                echo $client->__getLastResponse();
                //var_dump($e);
            } 
        }
    }
?>
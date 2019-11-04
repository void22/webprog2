<?php
    include('../includes/constant.inc.php');
    include('../includes/database.inc.php');
    include('../models/releasesmodel.php');

    class MoviesService
    {
        public function getMovies()
        {
            $releasesModel = new ReleasesModel(0);
            return $releasesModel->get_data(null);
        }
    }

    $options = array("uri" => SITE_ROOT . "soap/moviesservice.php");
    $server = new SoapServer(null, $options);
    $server->setClass('MoviesService');
    $server->handle();
?>
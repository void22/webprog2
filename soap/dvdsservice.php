<?php
    include('../includes/constant.inc.php');
    include('../includes/database.inc.php');
    include('../models/releasesmodel.php');

    class DvdsService
    {
        public function getDvds()
        {
            $releasesModel = new ReleasesModel(1);
            return $releasesModel->get_data(null);
        }
    }

    $options = array("uri" => SITE_ROOT . "soap/dvdsservice.php");
    $server = new SoapServer(null, $options);
    $server->setClass('DvdsService');
    $server->handle();
?>
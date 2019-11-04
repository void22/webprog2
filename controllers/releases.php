<?php
    class ReleasesController
    {
        public $baseName = 'releases';

        public function main(array $vars)
        {
            // Releases model get all data from Db
            // Constructor parameter: -1=all, 0-movies, 1-dvds
            $releasesModel = new ReleasesModel(-1);
            $retData = $releasesModel->get_data($vars);
            $view = new ViewLoader($this->baseName."_view");
            $view->assign('releases', $retData['releases']);
        }
    }
?>
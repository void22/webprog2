<?php
    class LogoutController
    {
        public $baseName = 'logout';
        public function main(array $vars)
        {
            $kilepesModel = new LogoutModel;
            $retData = $kilepesModel->get_data();
            $view = new ViewLoader($this->baseName.'_view');

            foreach($retData as $name => $value) {
                $view->assign($name, $value);
            }
        }
    }
?>
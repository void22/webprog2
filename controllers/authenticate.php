<?php
    class AuthenticateController
    {
        public $baseName = 'authenticate';

        public function main(array $vars)
        {
            $beleptetModel = new AuthenticateModel;
            $retData = $beleptetModel->get_data($vars);

            if($retData['eredmeny'] == "ERROR") {
                $this->baseName = "login";
            }

            $view = new ViewLoader($this->baseName.'_view');

            foreach($retData as $name => $value) {
                $view->assign($name, $value);
            }
        }
    }
?>
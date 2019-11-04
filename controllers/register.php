<?php
    class RegisterController
    {
        public $baseName = 'register';

        public function main(array $vars)
        {
            $regisztralModel = new RegisterModel;
            $retData = $regisztralModel->get_data($vars);

            if($retData['eredmeny'] == "ERROR") {
                $this->baseName = "registration";
            }

            $view = new ViewLoader($this->baseName.'_view');

            foreach($retData as $name => $value) {
                $view->assign($name, $value);
            }
        }
    }
?>
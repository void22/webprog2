<?php
    class LoginController
    {
        public $baseName = 'login';
        
        public function main(array $vars)
        {
            $view = new ViewLoader($this->baseName."_view");
        }
    }
?>
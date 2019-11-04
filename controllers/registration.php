<?php
    class RegistrationController
    {
        public $baseName = 'registration';
        
        public function main(array $vars)
        {
            $view = new ViewLoader($this->baseName."_view");
        }
    }
?>
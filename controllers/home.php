<?php
    class HomeController
    {
        public $baseName = 'home';

        public function main(array $vars)
        {
            $view = new ViewLoader($this->baseName . "_view");
        }
    }
?>
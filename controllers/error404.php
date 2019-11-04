<?php
    class Error404Controller
    {
        public $baseName = 'error404';

        public function main(array $vars)
        {
            $view = new ViewLoader($this->baseName . '_view');
        }
    }
?>
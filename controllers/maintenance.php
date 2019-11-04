<?php
    class MaintenanceController
    {
        public $baseName = 'maintenance';

        public function main(array $vars)
        {
            $view = new ViewLoader($this->baseName."_view");
        }
    }
?>
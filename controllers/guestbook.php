<?php
    class GuestbookController
    {
        public $baseName = 'guestbook';

        public function main(array $vars)
        {
            $guestbookModel = new GuestbookModel();
            $view = new ViewLoader($this->baseName."_view");
            $retData = $guestbookModel->get();
            $view->assign('entries', $retData['entries']);
        }
    }
?>
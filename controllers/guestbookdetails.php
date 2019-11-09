<?php
    class GuestbookdetailsController
    {
        public $baseName = 'guestbookdetails';

        public function main(array $vars)
        {
            $id = 0;
            $content = '';
            $guestbookModel = new GuestbookModel();

            if (isset($vars['id'])) {
                $id = $vars['id'];
            }

            if ($id > 0) {
                // Download entry by id
                $data = $guestbookModel->getEntry($id);
                $view = new ViewLoader("guestbookupdate_view");
                $view->assign('data', $data);
            }
            else {
                // Show empty page for new entry
                $view = new ViewLoader("guestbooknew_view");
            }
        }
    }
?>
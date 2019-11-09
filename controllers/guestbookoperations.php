<?php
    class GuestbookoperationsController
    {
        public $baseName = 'guestbookoperations';

        public function main(array $vars)
        {
            $id = 0;
            $content = '';

            if (isset($vars['id'])) {
                $id = $vars['id'];
            }

            if (isset($vars['content'])) {
                $content = $vars['content'];
            }

            $guestbookModel = new GuestbookModel();

            if ($id > 0 && isset($vars['update'])) {
                // Have id and update command -> update
                $guestbookModel->put($id, $content);
            }
            elseif ($id == 0 && $content != '') {
                // No id but have content -> create
                $guestbookModel->post($_SESSION['wp2uid'], $content);
            }
            elseif ($id > 0 && isset($vars['delete'])) {
                // Have id and delete command -> delete
                $guestbookModel->delete($id);
            }

            header("Location: " . SITE_ROOT . "guestbook");
        }
    }
?>
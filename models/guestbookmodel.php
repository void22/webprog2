<?php
    class GuestbookModel
    {
        public function getEntry($id)
        {
            $url = "http://localhost/webprog2/rest/guestbookservice.php";
            $data = Array("id" => $id);
            $url = sprintf("%s?%s", $url, http_build_query($data));
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $retData['entries'] = curl_exec($ch);
            curl_close($ch);

            return $retData;
        }

        public function get()
        {
            $url = "http://localhost/webprog2/rest/guestbookservice.php";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $retData['entries'] = curl_exec($ch);
            curl_close($ch);

            return $retData;
        }

        public function post($userid, $content)
        {
            $url = "http://localhost/webprog2/rest/guestbookservice.php";
            $data = Array("userid" => $userid, "content" => $content);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        }

        public function put($id, $content)
        {
            $url = "http://localhost/webprog2/rest/guestbookservice.php";
            $data = Array("id" => $id, "content" => $content);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        }

        public function delete($id)
        {
            $url = "http://localhost/webprog2/rest/guestbookservice.php";
            $data = Array("id" => $id);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        }
    }
?>
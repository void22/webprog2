<?php
    class LogoutModel
    {
        public function get_data()
        {
            $retData['eredmeny'] = "OK";
            $retData['uzenet'] = "Visszontlátásra kedves ".$_SESSION['wp2lastname']." ".$_SESSION['wp2firstname']."!";
            $_SESSION['wp2uid'] =  0;
            $_SESSION['wp2lastname'] =  "";
            $_SESSION['wp2firstname'] =  "";
            $_SESSION['wp2ulevel'] = "1__";
            Menu::setMenu();
            
            return $retData;
        }
    }
?>
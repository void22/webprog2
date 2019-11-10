<?php
    class AuthenticateModel
    {
        public function get_data($vars)
        {
            $retData['eredmeny'] = "";
            $retData['uzenet'] = "";

            try {
                $connection = Database::getConnection();
                $sql = "select id, lastname, firstname, access from users where login='".$vars['login']."' and password='".sha1($vars['password'])."'";
                $stmt = $connection->query($sql);
                $felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                switch(count($felhasznalo)) {
                    case 0:
                        $retData['eredmeny'] = "ERROR";
                        $retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
                        break;
                    case 1:
                        $retData['eredmeny'] = "OK";
                        $retData['uzenet'] = "Kedves ".$felhasznalo[0]['lastname']." ".$felhasznalo[0]['firstname']."!<br><br>
                                              Köszöntjük Önt a filmpremierek oldalán.<br><br>";
                        $_SESSION['wp2uid'] =  $felhasznalo[0]['id'];
                        $_SESSION['wp2lastname'] =  $felhasznalo[0]['lastname'];
                        $_SESSION['wp2firstname'] =  $felhasznalo[0]['firstname'];
                        $_SESSION['wp2ulevel'] = $felhasznalo[0]['access'];
                        Menu::setMenu();
                        break;
                    default:
                        $retData['eredmeny'] = "ERROR";
                        $retData['uzenet'] = "Több felhasználót találtunk a megadott felhasználói név -jelszó párral!";
                }
            }
            catch (PDOException $e) {
                        $retData['eredmeny'] = "ERROR";
                        $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
            }
            
            return $retData;
        }
    }
?>
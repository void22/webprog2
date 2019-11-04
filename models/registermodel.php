<?php
    class RegisterModel
    {
        public function get_data($vars)
        {
            $retData['eredmeny'] = "";
            $retData['uzenet'] = "";

            try {
                $connection = Database::getConnection();
                $sql = "select login from users where login='".$vars['login']."'";
                $stmt = $connection->query($sql);
                $felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($felhasznalo) > 0) {
                    $retData['eredmeny'] = "ERROR";
                    $retData['uzenet'] = "A felhasználónév már foglalt!";
                }
                else {
                    $stmt = $connection->prepare("insert into users values(0,?,?,?,?,?)");
                    $stmt->execute([$vars['lastname'], $vars['firstname'], $vars['login'], sha1($vars['password']), "_1_"]);
                    $retData['eredmeny'] = "OK";
                    $retData['uzenet'] = "Sikeres regisztráció!<br><a href=" . "login" . ">Itt</a> beléphet az oldalra.";
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
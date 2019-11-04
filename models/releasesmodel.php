<?php
    class ReleasesModel
    {
        private $releaseType;

        public function __construct($type)
        {
            $this->releaseType = $type;
        }

        public function get_data($vars)
        {
            $retData['eredmeny'] = "";
            $retData['uzenet'] = "";

            try {
                $connection = Database::getConnection();

                if ($this->releaseType < 0) {
                    $sql = "select title, release_date, directors, actors, description, type, rating from releases order by release_date desc";
                }
                elseif ($this->releaseType > 0) {
                    $sql = "select title, release_date, directors, actors, description, type, rating from releases where type=1 order by release_date desc";
                }
                else {
                    $sql = "select title, release_date, directors, actors, description, type, rating from releases where type=0 order by release_date desc";
                }

                $stmt = $connection->query($sql);
                $retData['releases'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch (PDOException $e) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
            }

            return $retData;
        }
    }
?>
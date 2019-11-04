<?php
    class UploadController
    {
        public $baseName = 'upload';
        
        public function main(array $vars)
        {
            $type = $_POST['type'];
            $title = $_POST['title'];
            $releasedate = $_POST['releasedate'];
            $rating = $_POST['rating'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $description = $_POST['description'];
            $result = array("result" => "error");

            if (isset($type) && isset($title) && isset($releasedate) && isset($rating) && isset($director) && isset($actors) && isset($description)) {
                // Save post to database
                try {
                    $connection = Database::getConnection();
                    $stmt = $connection->prepare("insert into releases values(0,?,?,?,?,?,?,?)");
                    $stmt->execute([$title, $releasedate, $director, $actors, $description, $type, $rating]);
                    $result["result"] = "ok";
                }
                catch (PDOException $e) {
                    // Result remains error
                }
            }

            echo json_encode($result);
        }
    }
?>
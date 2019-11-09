<?php
    include('../includes/constant.inc.php');
    include('../includes/database.inc.php');

    $method = $_SERVER['REQUEST_METHOD'];
    $par = array();
    parse_str($_SERVER['QUERY_STRING'], $par);

    try {
        $connection = Database::getConnection();

        switch ($method) {
            case 'GET':
                if (isset($par['id'])) {
                    $sql = "SELECT CONCAT(users.lastname, ' ', users.firstname) AS username, guestbook_entries.id, user_id, entry_date, last_updated, content FROM guestbook_entries INNER JOIN users ON guestbook_entries.user_id=users.id WHERE guestbook_entries.id=" . $par['id'];
                }
                else {
                    $sql = "SELECT CONCAT(users.lastname, ' ', users.firstname) AS username, guestbook_entries.id, user_id, entry_date, last_updated, content FROM guestbook_entries INNER JOIN users ON guestbook_entries.user_id=users.id ORDER BY last_updated DESC";
                }
                
                $stmt = $connection->query($sql);
                $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($entries);
                return;

            case 'POST':
                $stmt = $connection->prepare("INSERT INTO guestbook_entries VALUES(0,?,NOW(),NOW(),?)");
                $stmt->execute([$_POST['userid'], $_POST['content']]);
                $result = "OK";
                break;
            
            case 'PUT':
                $data = array();
                parse_str(file_get_contents("php://input"), $data);
                $stmt = $connection->prepare("UPDATE guestbook_entries SET content=?, last_updated=NOW() WHERE id=?");
                $stmt->execute([$data['content'], $data['id']]);
                $result = "OK";
                break;

            case 'DELETE':
                $data = array();
                parse_str(file_get_contents("php://input"), $data);
                $stmt = $connection->prepare("DELETE FROM guestbook_entries WHERE id=?");
                $stmt->execute([$data['id']]);
                $result = "OK";
                break;

            default:
                // Never can get here...
                break;
        }
    }
    catch (PDOException $e) {
        $result = $e->getMessage();
    }

    echo $result;
?>
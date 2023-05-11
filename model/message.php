<?php
    class message {
        public static function getMessages()
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM messages');
                $stmt->execute();
            
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $result;
        }

        public static function getMessagesByIncidenceId($incidence_id) {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM messages WHERE incidence_id=:incidence_id');
                $stmt->bindParam(':incidence_id', $incidence_id, PDO::PARAM_STR);
                $stmt->execute();
            
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $result;
        }

        public static function addMessage($description, $user_id, $incidence_id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare("INSERT INTO messages (description, user_id, incidence_id) VALUES (:description, :user_id, :incidence_id)");
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $stmt->bindParam(':incidence_id', $incidence_id, PDO::PARAM_STR);
                $stmt->execute();
                
                echo "<div class='alert alert-success' role='alert'> ¡Your comment has been published succesfully! </div>";
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function updateMessage()
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare("UPDATE messages SET description=:description WHERE id=:id");
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
                $stmt->bindParam(':description', $_GET['description'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function deleteMessage()
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('DELETE FROM messages WHERE id=:id');
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function updateIncidenceState($incidence_id) {
            include('connect-db.php');
            require_once('./model/incidence.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM messages WHERE incidence_id=:incidence_id');
                $stmt->bindParam(':incidence_id', $incidence_id, PDO::PARAM_STR);
                $stmt->execute();
            
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $rows = $stmt->rowCount();

                if($rows > 0) {
                    incidence::updateStateToPending($incidence_id);
                }
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            } 
            return $result;
        }
    }
?>
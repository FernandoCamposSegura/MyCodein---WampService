<?php
    class incidence {
        public static function addIncidence($title, $descrip, $user_id, $language_id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare("INSERT INTO incidences (title, descrip, user_id, language_id) VALUES (:title, :descrip, :user_id, :language_id)");
                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $stmt->bindParam(':language_id', $language_id, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function getIncidences()
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM incidences');
                $stmt->execute();
            
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $result;
        }

        public static function getIncidencesByLanguageId($language_id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM incidences WHERE language_id=:language_id');
                $stmt->bindParam(':language_id', $language_id, PDO::PARAM_STR);
                $stmt->execute();
            
                $incidence = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $incidence;
        }

        public static function getIncidencesByUserId($user_id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM incidences WHERE user_id=:user_id');
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $stmt->execute();
            
                $incidence = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $incidence;
        }

        public static function getIncidenceById($id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM incidences WHERE id=:id');
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
            
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $result;
        }

        public static function updateStateToPending($id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare("UPDATE incidences SET state='Pending' WHERE id=:id");
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function updateStateToResolve($id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare("UPDATE incidences SET state='Resolved' WHERE id=:id");
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function deleteIncidence()
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('DELETE FROM incidences WHERE id=:id');
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
    }
?>
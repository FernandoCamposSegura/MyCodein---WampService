<?php
    function addLanguage($name)
    {
        include('connect-db.php');
        try {
            $stmt = $dbh->prepare("INSERT INTO languages (name) VALUES (:name)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    function getLanguages()
    {
        include('connect-db.php');
        try {
            $stmt = $dbh->prepare('SELECT * FROM languages');
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        
        return $result;
    }

    function getLanguageByName($name)
    {
        include('connect-db.php');
        try {
            $stmt = $dbh->prepare("SELECT id FROM languages WHERE name=:name");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        
        return $result;
    }

    function updateLanguage($name, $colour)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare("UPDATE languages SET name=:name, colour=:colour WHERE id=:id");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':colour', $colour, PDO::PARAM_STR);
                $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

    function deleteLanguage($id)
    {
        include('connect-db.php');
        try {
            $stmt = $dbh->prepare('DELETE FROM languages WHERE id=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
?>
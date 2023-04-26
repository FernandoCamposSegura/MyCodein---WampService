<?php
    class user {
        protected $username;
        protected $email;
        protected $password;

        public function setUsername($username) {
            $this->username = $username;
        }

        public function getUsername() {
            return $this->username;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function getPassword() {
            return $this->password;
        }

        public static function addUser($username, $email, $password)
        {
            include('connect-db.php');
            try {
                $passHashed = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
                $stmt = $dbh->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $passHashed, PDO::PARAM_STR);
                $stmt->execute();
                echo "<div class='mt-2 alert alert-success' role='alert'> ¡Te has regitrado con éxito! </div>";
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function getUserByEmail($email)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT id, username, email, password FROM users WHERE email=:email');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->rowCount();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($rows > 0) {
                    return true;
                }
                return false;
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }

        public static function getUserById($id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT * FROM users WHERE id=:id');
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
                
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            
            return $user;
        }

        public static function login($email, $pass)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('SELECT id, username, email, password FROM users WHERE email=:email');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                $rows = $stmt->rowCount();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($rows == 1) {
                    foreach($users as $user) {
                        $currPass = $user['password'];
                        if(password_verify($pass, $currPass)) {
                            session_start();
                            $_SESSION['username'] = $user['username'];
                            $_SESSION['id'] = $user['id'];
                            $_SESSION['email'] = $user['email'];
                            $_SESSION['password'] = $user['password'];
                            return true;
                        }
                    }
                }
                return false; 
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
            return false;
        }

        public static function deleteUser($id)
        {
            include('connect-db.php');
            try {
                $stmt = $dbh->prepare('DELETE FROM users WHERE id=:id');
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();

                header( "index.php");
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
    }
?>
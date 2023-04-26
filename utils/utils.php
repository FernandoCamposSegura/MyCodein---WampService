<?php
    class util {

        public static function passwordValidation($pass) {
            if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,64}$/', $pass)){
                return true;
            }
            return false;
        }

        public static function usernameValidation($username) {
            if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,64}$/', $pass)){
                return true;
            }
            return false;
        }
    } 
?>
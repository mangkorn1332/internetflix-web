<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'movie_system');
    
    class SignInService {
        public $dbcon;
        function __construct() {
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $connect;

            if(mysqli_connect_errno()) {
                echo "Fail to connect MySQL: " . mysqli_connect_error();
            }      
        }

        public function signIn($user_email, $user_password) {
            $signIn = mysqli_query(
                $this->dbcon, 
                "SELECT user_id, user_fullname, created, modified
                FROM user
                WHERE user_email = '$user_email' AND user_password = '$user_password'"
            );
            return $signIn;
        }
    }
?>

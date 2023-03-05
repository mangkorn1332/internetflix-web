<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'movie_system');
    
    class SignUpService {
        public $dbcon;
        function __construct() {
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $connect;

            if(mysqli_connect_errno()) {
                echo "Fail to connect MySQL: " . mysqli_connect_error();
            }      
        }

        public function signUp($user_email, $user_password, $user_fullname) {
            $date = new DateTime("now", new DateTimeZone("Asia/Bangkok"));
            $now = $date->format('Y-m-d H:i:s');
            $signUp = mysqli_query(
                $this->dbcon, 
                "INSERT INTO user(user_email, user_password, user_fullname, created, modified) 
                VALUE ('$user_email', '$user_password', '$user_fullname', '$now', '$now')"
            );
            return $signUp;
        }
    }
?>

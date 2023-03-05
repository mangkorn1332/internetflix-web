<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'movie_system');
    
    class MovieService {
        public $dbcon;
        function __construct() {
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $connect;

            if(mysqli_connect_errno()) {
                echo "Fail to connect MySQL: " . mysqli_connect_error();
            }      
        }

        public function movieList() {
            $movies = mysqli_query(
                $this->dbcon, 
                "SELECT movie_id, movie_title, movie_release_date, movie_image
                FROM movie
                ORDER BY movie_id"
            );
            return $movies;
        }

        public function movieDetail($movie_id) {
            $movieDetail = mysqli_query(
                $this->dbcon, 
                "SELECT movie_id, movie_title, movie_release_date, movie_image
                FROM movie
                WHERE movie_id = '$movie_id'"
            );
            return $movieDetail;
        }
    }
?>

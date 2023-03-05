<?php

    class CommentService {
        public $dbcon;
        function __construct() {
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $connect;

            if(mysqli_connect_errno()) {
                echo "Fail to connect MySQL: " . mysqli_connect_error();
            }      
        }

        public function addComment($movie_id, $user_id, $comment_text, $comment_score) {
            $date = new DateTime("now", new DateTimeZone("Asia/Bangkok"));
            $now = $date->format('Y-m-d H:i:s');
            $comment = mysqli_query(
                $this->dbcon, 
                "INSERT INTO comment(movie_id, user_id, comment_text, comment_score, created) 
                VALUE ('$movie_id', '$user_id', '$comment_text', '$comment_score', '$now')"
            );
            return $comment;
        }

        public function commentList($movie_id) {
            $commentList = mysqli_query(
                $this->dbcon, 
                "SELECT c.*, m.*, u.*
                FROM comment AS c
                INNER JOIN movie AS m ON c.movie_id = m.movie_id
                INNER JOIN user AS u ON c.user_id = u.user_id
                WHERE c.movie_id = '$movie_id'
                ORDER BY c.created"
            );
            return $commentList;
        }
    }
?>

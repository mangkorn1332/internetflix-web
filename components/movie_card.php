<a href="movie-detail.php?mid=<?php echo $row_movies['movie_id']; ?>" style="text-decoration:none">
    <div class="col my-3 my-md-0 pb-4" style="color:white;">
        <div class="card shadow">
            <div>
                <img class="card-img-top" src="assets/movie_img/<?php echo $row_movies['movie_image']; ?>" alt="<?php echo $row_movies['movie_title']; ?>">
            </div>
            <div class="card-body">
                <p class="text-start fs-6"><?php echo $row_movies['movie_release_date']; ?></p>
                <p class="card-title fw-bold fs-5"><?php echo $row_movies['movie_title']; ?></p>
            </div>
        </div>
    </div>
</a>
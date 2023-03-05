<?php
session_start();
include_once('services/movie_service.php');
include_once('services/comment_service.php');

$movie_id = $_GET['mid'];
isset( $_SESSION['user_id'] ) ? $user_id = $_SESSION['user_id'] : $user_id = "";

$movieData = new MovieService();
$result = $movieData->movieDetail($movie_id);
$row = mysqli_fetch_array($result);

$commentData = new CommentService();
$comments = $commentData->commentList($movie_id);

if (isset($_POST['addComment'])) {

    $comment_text = $_POST['comment'];
    $comment_score = $_POST['rating'];

    $addComment = $commentData->addComment($movie_id, $user_id, $comment_text, $comment_score);

    if ($addComment) {
        echo "<script>window.location.href='movie-detail.php?mid=$movie_id'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internetflix-<?php echo $row['movie_title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="home">
    <?php include_once('components/navbar.php') ?>

    <!-- movie detail -->
    <div class="container my-4 pb-2">
        <div class="card shadow mx-auto" style="width: 950px; background-color: rgba(100, 100, 100, 0.1);">
            <div class="card-body">
                <div class="row mx-auto">
                    <div class="col my-auto mx-3">
                        <img src="assets/movie_img/<?php echo $row['movie_image']; ?>" alt="<?php echo $row['movie_title']; ?>" class="img-fluid card-img-top rounded">
                    </div>
                    <div class="col my-3 mx-3">
                        <h1><?php echo $row['movie_title']; ?></h1>
                        <p>Release date : <?php echo $row['movie_release_date']; ?></p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero excepturi maiores perferendis, ipsum libero culpa rerum quaerat eos velit neque? Quae assumenda ullam aliquid id odio velit, porro expedita. Unde.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- comment -->
    <div class="container my-4 pb-5">
        <div class="card shadow mx-auto" style="background-color: rgba(100, 100, 100, 0.1);">
            <div class="card-body">
                <h5 class="card-title mb-4 fs-3">Comments</h5>
                <?php foreach ($comments as $row_comments) { ?>
                    <div class="card shadow mx-auto mb-4" style="background-color: rgba(100, 100, 100, 0.1);">
                        <div class="card-body">
                            <p class="card-title mb-1 fs-5 fw-bold"><?php echo $row_comments['user_fullname']; ?></p>
                            <p class="mb-1 fs-6">Rating : <?php echo $row_comments['comment_score']; ?> out of 5</p>
                            <p class="mb-1 fs-6"><?php echo $row_comments['comment_text']; ?></p>
                            <p class="mb-1 d-flex justify-content-end" style="font-size: 12px;"><?php echo $row_comments['created']; ?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($user_id == "") { ?>
                    <div class="d-grid gap-2 col-12 mx-auto mb-4">
                        <a class="btn" href="signin.php">Sign in to comment</a>
                    </div>
                <?php } else { ?>
                    <form class="mx-auto" method="post">
                        <label for="comment" class="form-label">Add comment</label>
                        <div class="input-group mb-3" style="width: 10rem;">
                            <span class="input-group-text" id="rating">Rating</span>
                            <input min="1" max="5" value="1" aria-describedby="rating" type="number" id="rating" name="rating" class="form-control" onkeydown="return false" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Add a comment here" required></textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn" id="addComment" name="addComment">Comment</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
<?php
include_once('services/signup_service.php');
$userData = new SignUpService();
if (isset($_POST['signup'])) {
    $user_fullname = $_POST['user_fullname'];
    $user_email = $_POST['user_email'];
    $user_password = base64_encode($_POST['user_password']);

    $sql = $userData->signUp($user_email, $user_password, $user_fullname);

    if ($sql) {
        echo "<script>alert('Sign up successful!');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='signup.php'</script>";
    }

    $date = new DateTime();
    echo $date->format('Y-m-d H:i:s'); // 2022-12-27 12:53:42
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internetflix-Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('components/navbar.php') ?>

    <div class="container py-5">
        <div class="card mx-auto" style="width: 450px; background: rgba(0, 0, 0, 0.75);">
            <div class="card-body py-3">
                <div class="card-body my-auto py-5 px-5">
                    <h5 class="card-title mb-4 fs-3">Sign up</h5>
                    <form class="mx-auto" method="post">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="user_fullname" name="user_fullname" placeholder="Fullname" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto mb-4">
                            <button type="submit" class="btn" name="signup">Sign up</button>
                        </div>
                    </form>
                    <div class="mx-auto">
                        <span>Already have an account?</span>
                        <a href="signin.php">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
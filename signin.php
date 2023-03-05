<?php
session_start();
include_once('services/signin_service.php');
$userData = new SignInService();

if (isset($_POST['signin'])) {
    $user_email = $_POST['user_email'];
    $user_password = base64_encode($_POST['user_password']);

    $result = $userData->signIn($user_email, $user_password);
    $num = mysqli_fetch_array($result);

    if ($num > 0) {
        $_SESSION['user_id'] = $num['user_id'];
        $_SESSION['user_fullname'] = $num['user_fullname'];
        echo "<script>window.location.href='index.php'</script>";
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
    <title>Internetflix-Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once('components/navbar.php') ?>

    <div class="container py-5">
        <div class="card mx-auto" style="width: 450px; background: rgba(0, 0, 0, 0.75);">
            <div class="card-body py-3">
                <div class="card-body my-auto py-5 px-5">
                    <h5 class="card-title mb-4 fs-3">Sign in</h5>
                    <form class="mx-auto" method="post">
                        <div class="mb-4">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required>
                        </div>
                        <div class="d-grid gap-2 col-12 mx-auto mb-4">
                            <button type="submit" class="btn" name="signin">Sign in</button>
                        </div>
                    </form>
                    <div class="mx-auto">
                        <span>No account?</span>
                        <a href="signup.php">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
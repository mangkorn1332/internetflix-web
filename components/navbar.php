<nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container-fluid mt-3">
        <a class="navbar-brand mx-4" href="index.php">
            <img src="assets/logo/internetflix-logo.png" alt="logo" style="height: 40px; width: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($_SESSION['user_id'])) { ?>
            <div class="mx-4">
                <span class="mx-4">Hi, <?php echo $_SESSION['user_fullname']; ?></span>
                <a class="btn" href="signout.php">Sign out</a>
            </div>
        <?php } else { ?>
            <div class="mx-4">
                <a class="btn mx-2" href="signup.php">Sign up</a>
                <a class="btn" href="signin.php">Sign in</a>
            </div>
        <?php } ?>
    </div>
</nav>
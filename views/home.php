<?php require_once('includes/header.php'); ?>

    <div class="container d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand color: '#fff';" href="#">My MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse primary" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Home link -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="../../myMVC/">Home</a>
                </li> -->
                <!-- Signup link -->
                <li class="nav-item ">
                    <a class="nav-link" href="./views/user/signup.php">Signup</a>
                </li>
                <!-- Login link -->
                <li class="nav-item ">
                    <a class="nav-link" href="./views/user/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

        <h1>Welcome to My MVC</h1>
        <p>This is the homepage of the website.</p>
        <!-- Add more content here -->
    </div>

<?php require_once('includes/footer.php'); ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <?
                $user_id = $_SESSION['user_id'];
                if (isset($_SESSION['user_id'])) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?
                            if (isset($message)) {
                                foreach ($message as $message) { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <? }
                            }



                            $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'")
                                or die('query failed');
                            if (mysqli_num_rows($select_user) > 0) {
                                $fetch_user = mysqli_fetch_assoc($select_user);
                            }

                            ?>
                            <p>Welcome : <span><? echo $fetch_user['name']; ?></span></p>
                            <!-- <p>useremail: <span><? echo $fetch_user['email']; ?></span></p> -->
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <?
                            if (isset($_GET['logout'])) {
                                unset($user_id);
                                session_destroy();
                                header('location: login.php');
                            }
                            ?>
                            <li><a class="dropdown-item" name="logout" href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');">Logout</a></li>
                        </ul>
                    </li>
                <?
                } else {
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
<?
$page_title = "Login form";
include("includes/header.php");
session_start();


if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn,  md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE  email = '$email' AND password = '$password' ")
        or die('query failed');


    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $user_type = 'user';
        echo $_SESSION['user_id'] = $row['id'];
        header('location: index.php');
    $_SESSION['user_type'] = $user_type;
        if($user_type == 'admin')
        {
        
            $message = "Welcom admin";
            header('location:../admin/index.php');
        }
    } else {
        
        $message[] = 'incorrect password or email!';
    }
}




?>

<div class="py-5  mx-auto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?
                if (isset($message)) {
                    foreach ($message as $message) { ?>
                        
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?=$message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?
                        unset($message);
                    }
                } ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Login form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter your email" aria-describedby="emailHelp" required>

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter  password" id="exampleInputPassword1" required>
                            </div>

                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<? include("includes/footer.php") ?>
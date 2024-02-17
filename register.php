<?
    $page_title = "Registrtion form";
    include("includes/header.php");
    session_start();

    if(isset($_POST['register_btn']))
{
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn,  md5($_POST['password']) );
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE  'email' = '$email' AND 'password' = '$password' ")
    or die('query failed');


    if(mysqli_num_rows($select) > 0)
    {
        $message[] = 'user already exist!';
    }else{
        mysqli_query($conn, "INSERT INTO `users`( `name`, `email`, `phone`, `password`, `user_type`)
                VALUES ('$name', '$email', '$phone', '$password', ' $user_type')")
                or die('query failed');
                $message[] = 'registered successfully!';
                header('location: login.php');
    }

}

?>

<div class="py-5  mx-auto">
    <div class="container">
    <? 
    if(isset($message))
    {
        foreach($message as $message)
        {?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?=$message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?}
    }
    
?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Registrtion form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control"  name="email" placeholder="Enter your email" aria-describedby="emailHelp" required>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Enter your phone number" required>

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter  password" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm  password" required>
                            </div>
                            <div class="mb-3">
                                <select name="user_type" id="user_type">

                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                        
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<? include("includes/footer.php") ?>
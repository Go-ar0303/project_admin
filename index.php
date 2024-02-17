<?
$page_title = "Home page";
session_start();
include("includes/header.php");

// if(!isset($user_id))
// {
//     header('location: login.php');
// }


?>
<div class="py-5">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            


                <h1>Hello, world!</h1>
                <button class="btn btn-primary">Testing</button>
            </div>
        </div>
    </div>
</div>


<? include("includes/footer.php") ?>
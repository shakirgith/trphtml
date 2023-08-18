<?php

include('layout/header.php');
$login = false;
$showError = false;

if(isset($_POST['loginSubmit'])) {

    $email = $_POST['user_email'];
    $password = $_POST['password'];

    $email_search = "select * from register where email='$email' ";
    $query = mysqli_query($conn, $email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count) {

            while($email_pass = mysqli_fetch_assoc($query)) {

                if(password_verify($password, $email_pass['password'])){
                    $login = true;
                    //session_start();
                    $_SESSION['fname'] = $email_pass['fname'];
                    // header("location: profile.php");

                    ?>

                    <script type="text/javascript">
                        location.replace("profile.php");
                     </script> 

                     <?php

                } else {

                    $showError = "Invalid Email/Password";
                }

            }

        

    } else {

    $showError = "Invalid Credentials";
        
    }
}


?>

<div class="page-heading"><h1>Login</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container">
        <p>Please send us a message and we’ll be glad to help!</p>

        <p>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            } else {
                echo $_SESSION['msg'] = "";
            }
   

            ?>
            <?php echo $showError ?>
        </p>


        <div class="col-lg-6 mx-auto">
            <form class="mb-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
                <fieldset>
                    <div class="mb-3"><input type="email" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="Email Address" name="user_email" value="" autocomplete="off" required><span class="error-message"></span></div>
                    <div class="mb-3"><input type="password" class="form-control" placeholder="Password" name="password" value="" autocomplete="off" required><span class="error-message"></span></div>
                    <button name="loginSubmit" type="submit" class="btn dark-btn mt-4">Login</button>
                </fieldset>

            </form>
            <p>You have no account? <a href="signup.php">Regiter Here</a>

        </div>
    </div>
</section>

</main>

<?php
include('layout/footer.php');

?>

<script>
    $('#mydiv').delay(5000).hide(0); 
</script>




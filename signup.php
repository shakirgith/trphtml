
<?php
include('layout/header.php');


 $css_hide = 'style="display: none"'; 
 $css_hide2 = 'style="display: none"'; 
 $css_hide3 = 'style="display: none"'; 
 $css_hide_success = 'style="display: none"'; 


if(isset($_POST['registerSubmit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['gender']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $pass = md5($password);
    $cpass = md5($cpassword);

    $token = bin2hex(random_bytes(15));

    $emailquery = "select * from register where email='$email' ";

    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0) {

          //    echo "email already exists"; 
          $css_hide = 'style="display: block"'; 

    } else {

         if($password === $cpassword) {

            $insertquery = "insert into register (title, fname, mobile, email, password, cpassword, token, status) values('$title','$fname','$mobile','$email','$pass','$cpass','$token', 'inactive')";
            $iquery = mysqli_query($conn, $insertquery);

              if($iquery){
                
                //$to_email = "ansariwdinfo@gmail.com";
                $subject = "Email Activation";
                $body = "Hi, $fname . Click here to activate your account http://localhost/trphtml/activate.php?token=$token ";    
                $headers = "From:shakir@webcontxt.com";
     
                
                if(mail($email, $subject, $body, $headers)) {
                //    echo "Message successfully sent $to_email...";
                    $_SESSION['msg'] = "check you email to activate your account $email";

                    ?>

                    <script type="text/javascript">
                     location.replace("login.php");
                    </script>
                      <?php 
                }else {
                   echo "Message could not be sent...";
                }

              } else {
                 //echo "Not inserted"; 
                 $css_hide2 = 'style="display: block"'; 

              }


         } else {
          // echo "password are not matching";
            $css_hide3 = 'style="display: block"'; 
         }
        
    }


}


?>


<div class="page-heading"><h1>Register</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container">
        <p>Please send us a message and we’ll be glad to help!</p>


        <div class="col-lg-6 mx-auto">
            <p class="success-message" <?php echo $css_hide_success ?>>You have successfully registered</p>
            <p class="error-message" <?php echo $css_hide ?>>Your email already exists</p>
            <p class="error-message" <?php echo $css_hide2 ?>>You are not registered</p>
            <p class="error-message" <?php echo $css_hide3 ?>>Password and confirm password does not match</p>

            <form  class="mb-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
                <fieldset>
                    <div class="mb-3">
                        <select class="form-select form-control" name="gender" aria-label="Default select example">
                              <option selected>Select Title</option>
                              <option value="Mr">Mr</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Miss">Miss</option>
                        </select>
                    </div>
                    <div class="mb-3"><input type="text" name="fname" placeholder="Full Name" class="form-control" value="" autocomplete="off" required><span class="error-message"></span></div>
                     <div class="mb-3"><input type="number" name="mobile" maxlength="10" placeholder="Mobile Number" class="form-control" value="" autocomplete="off" required><span class="error-message"></span></div>
                    <div class="mb-3"><input type="email" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="Email Address" name="user_email" value="" autocomplete="off" required><span class="error-message"></span></div>
                    <div class="mb-3"><input type="password" class="form-control" placeholder="Password" name="password" value="" autocomplete="off" required><span class="error-message"></span></div>
                     <div class="mb-3"><input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="" autocomplete="off" required><span class="error-message"></span></div>

                    <button name="registerSubmit" type="submit" class="btn dark-btn mt-4">Register Now </button>
                </fieldset>

            </form>
            <p>Have an account? <a href="login.php">Login Here</a>

        </div>
    </div>
</section>

</main>

<?php
include('layout/footer.php');

?>

<script>
    // $('#hidiv').delay(1000).hide(0);   
</script>




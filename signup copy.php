
<?php
include('layout/header.php');

// $ok = '';
// $css_hide = 'style="display: none"'; 


if(isset($_POST['registerSubmit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['gender']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));

    $emailquery = "select * from register where email='$email' ";

    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0) {

          echo "email already exists"; 
        //  $_SESSION['errormsg'] = "Your email already exists";

    } else {

         if($password === $cpassword) {

            $insertquery = "insert into register (title, fname, mobile, email, password, cpassword, token, status) values('$title','$fname','$mobile','$email','$pass','$cpass','$token', 'inactive')";
            $iquery = mysqli_query($conn, $insertquery);

              if($iquery){
                 //echo "user data inserted successfully"; 
                 $_SESSION['successmsg'] = "You have successfully registered.";
                 header('login.php');
                
                //  $css_hide = 'style="display: block"'; 

              } else {
                 //echo "Not inserted"; 
                 $_SESSION['errormsg'] = "You are not registered.";
              }


         } else {
           echo "password are not matching";
            $_SESSION['errormsg'] = "Password and confirm password does not match.";
         }
        
    }


}


?>
<!-- success-message
error-message -->

<div class="page-heading"><h1>Register</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container">
        <p <?php // echo $css_hide ?>>Please send us a message and we’ll be glad to help!</p>

        <div class="col-lg-6 mx-auto">

        <p>
            <?php
            if(isset($_SESSION['successmsg'])){
                echo $_SESSION['successmsg'];
            } else {
                echo $_SESSION['successmsg'] = "";
            }
            ?>
        </p>


            <?php 
            // if(isset($_SESSION['successmsg'])){
             //   echo "<p>";
            //     echo $_SESSION['successmsg'];
             //   echo "</p>";
            // } else {
              //  echo "<p>";
            //     echo $_SESSION['successmsg'] = "";
              //  echo "</p>";
            // }
            ?>



       


            <form  class="mb-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <fieldset>
                    <div class="mb-3">
                        <select class="form-select form-control" name="gender" aria-label="Default select example">
                              <option selected>Select Title</option>
                              <option value="Mr">Mr</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Miss">Miss</option>
                        </select>
                    </div>
                    <div class="mb-3"><input type="text" name="fname" placeholder="Full Name" class="form-control" value="" required><span class="error-message"></span></div>
                     <div class="mb-3"><input type="number" name="mobile" maxlength="10" placeholder="Mobile Number" class="form-control" value="" required><span class="error-message"></span></div>
                    <div class="mb-3"><input type="email" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="Email Address" name="user_email" value="" required><span class="error-message"></span></div>
                    <div class="mb-3"><input type="password" class="form-control" placeholder="Password" name="password" value="" required><span class="error-message"></span></div>
                     <div class="mb-3"><input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="" required><span class="error-message"></span></div>

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
//     setTimeout(function () {
//    window.location.href= 'signup.php'; // the redirect goes here
//     },5000);

    //  window.onload = function() {
    //     $('#mydiv').delay(20000).hide(0); 
    //  }
    //  document.addEventListener("DOMContentLoaded", () => {
       
    //  }
    // $('#hidiv').delay(1000).hide(0); 
    // $('#hidiv2').delay(1000).hide(0); 
    
</script>




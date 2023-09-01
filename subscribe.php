<?php
include('inc/connection.php');

$email = "";

// $errors = array();
$showError = '';
$showSuccess = '';

//if user click continue button in forgot password form
if(isset($_POST['subscribeSubmitd'])) {
 
     $email = mysqli_real_escape_string($conn, $_POST['subs_email']);
     $check_email = "SELECT * FROM visitors WHERE sub_email = '{$email}'"; 
     $run_sql = mysqli_query($conn, $check_email);
 
     if(mysqli_num_rows($run_sql) > 0){

        $showError = "This email address does not exist!";  
 
    }else{  

        $insertquery = "insert into visitors (sub_email) values('{$email}')";
        $run_query = mysqli_query($conn, $insertquery);

             if($run_query){
                 $subject = "Subscribe user";

                $message = "
                <!DOCTYPE html><html><head><meta charset='utf-8'>
                <title>Confirmation Emailer</title>
                </head>
                <body>

                <div style='margin: 0px;padding:0px;'>
                <table style='width: 700px;margin:0px auto;background-color: #F5F5F5;'>
                <tbody>
                <tr>
                <td>
                <table style='max-width:640px; padding:0px 40px 20px 40px;margin:30px auto;background-color: #fff; width: 100%;'>
                <tbody>

                <tr>
                <td style='font-family:Arial,sans-serif;font-size:18px;line-height:35px;color:#3c3c3c;font-weight:700;padding-bottom:15px; text-align: center;'>
                <p style='margin-bottom: 0; padding-bottom:0px; display: block; text-align: center; line-height: 16px;'>
                <img style='border: 0; max-width: 200px; height: auto; display:none;' src='https://therainbowprint.com/assets/images/trp-logo.png' alt='Logo' />
                Welcome to Subscribe!
                </p>
                </td>
                </tr>

              
                
                <tr>
                <td style='font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#3c3c3c;font-weight:500;padding-bottom:15px; padding-top: 20px;'>Dear User, <br /> <br />
                We've received a request to reset the password for the (TRP) Admin
                account with $email. 
                </td>
                </tr>

                <tr>
                <td style='font-family:Arial,sans-serif;font-size:16px;line-height:26px;color:#515455;font-weight:500;padding-bottom:30px;'>
                    Your password reset code is: <strong style='font-family:Arial,sans-serif;font-size:18px;color:#515455;font-weight:bold;'> ss</strong> 
                </td>
                </tr>

                <tr>
                <td style='font-family:Arial,sans-serif;font-size:16px;line-height:26px;color:#515455;font-weight:500;padding-bottom:30px;'>
                If you did not ask to change your password, then you can ignore this email
                and your password will not be changed. 
               
                </td>
                </tr>

                <tr>
                <td style='font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#515455;font-weight:500;padding-bottom:0px'>
                <p>Warm regards <br />
                    TRP Team <br />
                    </p> 

                </td>
                </tr>

                </tbody>
                </table>
                
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: shakir@webcontxt.com' . "\r\n";
                // $headers .= 'Cc: shakir2@webcontxt.com' . "\r\n";

                //  $sender = "From: shakir@webcontxt.com";
                 if(mail($email, $subject, $message, $headers)){
                         $info = "We've received your email successfully - $email";
                         $_SESSION['info'] = $info;
                         $_SESSION['subs_email'] = $email;
                         header('location: subscribe.php');
                         exit();
                 }else{
                     $showError = "Failed while sending email!";
                 }

         }else{
            $showError = "Something went wrong!";
        }
        
        
    }
}
?>

<form action="" method="POST">
                    <div class="input-group">
                        <input type="email" class="form-control"name="subs_email" pattern="[^ @]*@[^ @]*"  placeholder="Enter your email" />
                        <button class="btn btn-outline-secondary my-button" type="submit" name="subscribeSubmit">Subscribe</button>
                    </div>
                    </form>

                                        <?php
                                            // include('inc/connection.php');
                                        // include 'subscribe.php';
                             
                                        if($showError != ''){  ?>

                                            <span class="alert-danger">
                                            <?php echo $showError ?> 
                                            </span>

                                          

                                            <?php 
                                        } else {
                                           
                                        }
                                        ?>
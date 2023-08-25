
<?php
include('layout/header.php');
// $css_hide = 'style="display: none"'; 
$statusMsg = '';
$successMsg = '';
$fileMsg = '';
// $folder = "";


if(isset($_POST['submit'])) {

        $errors = '';

        $file_name = $_FILES['uploadFile']['name'];
        $file_size = $_FILES['uploadFile']['size'];
        $file_temp = $_FILES['uploadFile']['tmp_name'];
        $file_type = $_FILES['uploadFile']['type'];
        $uploads_dir = 'media/'.$file_name;
        $file_expload = strtolower(end(explode('.',$_FILES['uploadFile']['name'])));
        $extension = array('jpeg', 'jpg', 'png', 'gif');


        if(in_array($file_expload, $extension) === false) {
            $errors .= "This extension file not allowed, Please choose a JPEG, JPG, PNG and GIF file only. <br />";

        } 

        if($file_size > 2097152){
            $errors .= "File size must be 2mb or lower. <br />";

        } 

        if(empty($errors) == true){
            move_uploaded_file($file_temp, $uploads_dir);  

        // } else {
        //     echo $errors;
        //     die
        // }


     // start form code
        $Title = mysqli_real_escape_string($conn, $_POST['gender']);
        $Name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $Email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $Subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $Message = mysqli_real_escape_string($conn, $_POST['message']);



        $insertquery = "insert into contactus (Title, Name, Email, Subject, file_name, Message) values('$Title','$Name','$Email','$Subject','$uploads_dir', '$Message')";

        $result = mysqli_query($conn, $insertquery);
     

                if($result) {
                      // $css_hide = 'style="display: block"'; 
                      $successMsg = "Your message has been successfully sent!";
                    ?>
                    <script>
                        $('.sucss-msg ').delay(5000).hide(0); 
                    </script> 
                    <?php
            
                } else {

                     $statusMsg = "Your message not sumbited";
                    
                }


}
}

?>


<div class="page-heading"><h1>Contact us</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container">
        <div class="heading"><span class="subtitle">Need more help?</span>
            <h2>Have a <span>Question?</span></h2><span class="dot1"></span><span class="dot1"></span><span class="dot1"></span><span class="dot"></span>
        </div>
        <p>Please send us a message and we’ll be glad to help!</p>

                     <?php if(!empty($statusMsg)) { ?>
                        <p class="error-message pt-4"><?php echo $statusMsg; ?></p>
                        <?php } ?>

                    <?php if(!empty($successMsg)) { ?>
                    <p class="sucss-msg success-message pt-4"><?php echo $successMsg; ?></p>
                <?php } ?>

                <?php if(!empty($errors)) { ?>
                        <p class="error-message pt-4"><?php echo $errors; ?></p>
                        <?php } ?>


        <div class="col-lg-6 mx-auto">
            <form action="https://therainbowprint.com/contactus" method="POST"  enctype="multipart/form-data" autocomplete="off" name="myContactusForm" onsubmit="return(validate());">
                <fieldset>
                    <div class="mb-3">
                        <select class="form-select form-control" name="gender" aria-label="Default select example">
                              <option value="-1" selected>Select Title</option>
                              <option value="Mr">Mr</option>
                              <option value="Mrs">Mrs</option>
                              <option value="Miss">Miss</option>
                        </select>
                         <span id="title_error" class="error-message"></span>
                    </div>
                    <div class="mb-3"><input type="text" name="user_name" placeholder="Name" class="form-control" value="" autocomplete="off">
                         <span id="name_error" class="error-message"></span>
                    </div>
                    <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address" name="user_email" value="" autocomplete="off">
                         <span id="email_error" class="error-message"></span></div>
                    <div class="mb-3"><input type="text" class="form-control" placeholder="Subject" name="subject" value="" autocomplete="off">
                         <span id="subj_error" class="error-message"></span>
                    </div>
                     
                    
                    
                    <div class="mb-3 "><input type="file" class="form-control" name="uploadFile">
                        <small class="small" style="color:rgba(0, 0, 0, 0.4); display:block; text-align: left;">We only accepts max. 2mb and (JPG, JPEG, PNG and Gif file).</small>
                        <span id="file_error" class="error-message"></span>

                         <?php if(!empty($fileMsg)) { ?>
                        <span class="error-message pt-4"><?php echo $fileMsg; ?></span>
                        <?php } ?>
                    </div> 

          
                    <div class="mb-3">
                        <textarea id="idmsg" class="form-control" cols="30" rows="8" minlength="50" maxlength="250" placeholder="Your message" value="" name="message" autocomplete="off"></textarea>
                         <span id="msg_error" class="error-message"></span>
                    </div>
                    <button name="submit" type="submit" class="btn dark-btn mt-4">Send Message </button>
                </fieldset>

            </form>
        </div>
    </div>
</section>


</main>

<?php
include('layout/footer.php');

?>

<script type = "text/javascript">

      // Contact Us Form validation code will come here.
      function validate() {
            
         if( document.myContactusForm.gender.value == "-1" ) {
            // alert( "Please select your title" );
             document.getElementById('title_error').innerHTML="Please select your title";
            return false;
         }

         if( document.myContactusForm.user_name.value == "" ) {
             document.getElementById('name_error').innerHTML="Please enter your fulname";
            document.myContactusForm.user_name.focus() ;
            return false;
         }

          if( document.myContactusForm.user_email.value == "" ) {
             document.getElementById('email_error').innerHTML="Please enter your email!";
            document.myContactusForm.user_email.focus() ;
            return false;
         }

           if( document.myContactusForm.subject.value == "" ) {
             document.getElementById('subj_error').innerHTML="Please enter your subject";
            document.myContactusForm.subject.focus();
            return false;
         }

           if( document.myContactusForm.uploadFile.value == "" ) {
             document.getElementById('file_error').innerHTML="Please upload your file";
            document.myContactusForm.uploadFile.focus();
            return false;
         }


        if( document.myContactusForm.message.value == "" ) {
              //document.getElementById('mgs_error').innerHTML="Enter your message min. 50 character";
              const inpObj = document.getElementById("idmsg");
              if (!inpObj.checkValidity()) {
                document.getElementById("mgs_error").innerHTML = inpObj.validationMessage;
              } else {
                // document.getElementById("demo").innerHTML = "Input OK";
              }   
            document.myContactusForm.message.focus();
            return false;
         }
        


         // if( document.myContactusForm.Zip.value == "" || isNaN( document.myForm.Zip.value ) ||
         //    document.myContactusForm.Zip.value.length != 5 ) {
            
         //    alert( "Please provide a zip in the format #####." );
         //    document.myContactusForm.Zip.focus() ;
         //    return false;
         // }
         // if( document.myContactusForm.Country.value == "-1" ) {
         //    alert( "Please provide your country!" );
         //    return false;
         // }
         return( true );
      }

</script>







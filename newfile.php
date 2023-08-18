
<?php

include('layout/header.php');
$statusMsg = '';
$successMsg = '';

if(isset($_POST['upload']))
{   
     
 $file = rand(1000,100000)."-".$_FILES['upFile']['name'];
 $file_loc = $_FILES['upFile']['tmp_name'];
 $file_size = $_FILES['upFile']['size'];
 $file_type = $_FILES['upFile']['type'];
 $folder="media/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */

$file_type = array('jpg','png','jpeg','gif','pdf');
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
  if(in_array($file_type, $new_size)){

         if(move_uploaded_file($file_loc,$folder.$final_file)) {
          $sql = mysqli_query($conn,"INSERT into NewFileUpload (file_name, file_type, file_size) VALUES ('$final_file', '$file_type', '$new_size')");

                    if($sql){
                        $successMsg = "The file ".$final_file. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                
          
         }else{
          
          $statusMsg = "Error.Please try again";
         }

 }else{
   $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed. <br/> and maximum file size 500 kb';
 }


    }

?>
  





<div class="page-heading"><h1>Upload file</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container fileUpload">
        <div class="heading">
            <h2>File Upload</h2><span class="dot1"></span><span class="dot1"></span><span class="dot1"></span><span class="dot"></span>
        </div>
          <?php if(!empty($statusMsg)) { ?>
            <p class="error-message"><?php echo $statusMsg; ?></p>
            <?php } ?>

            <?php if(!empty($successMsg)) { ?>
            <p class="success-message"><?php echo $successMsg; ?></p>
            <?php } ?>

        <div class="col-lg-6 mx-auto">

            <form action="" method="post" enctype="multipart/form-data">
               
                <input type="file" name="upFile" />
                <input type="submit" class="btn btn-success" name='upload' value="Upload"/>  
            </form>

            <div class="image_preview_wrap">
             <?php
                // Include the database configuration file
                // include 'inc/connection.php';

                // Get images from the database
                $query = mysqli_query($conn, "SELECT * FROM NewFileUpload ORDER BY DESC");

                    // $selectquery = " select * from contactus ";
                    // $query = mysqli_query($conn, $selectquery);

                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'media/'.$row["file_name"];
                    ?>
                     <img class="img-fluid" src="<?php echo $imageURL; ?>" alt="" />
                    <?php }
                    }else{ ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            </div><!-- end image_preview_wrap -->

        </div>
    </div>
</section>

</main>

<?php
include('layout/footer.php');

?>
 
s
<script>
    $('.success-message').delay(10000).hide(0); 
</script>





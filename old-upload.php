
<?php

include('layout/header.php');
$statusMsg = '';
if(isset($_FILES["uploadFile"])){
// File upload path
$targetDir = "media/";
$fileName = basename($_FILES["uploadFile"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["fileUploadSubmit"]) && !empty($_FILES["uploadFile"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','svg','pdf');

    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
             $insert = mysqli_query($conn,"INSERT into fileupload (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, SVG, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

}

// Display status message
echo $statusMsg;

?>
  





<div class="page-heading"><h1>Upload file</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container fileUpload">
        <div class="heading">
            <h2>File Upload</h2><span class="dot1"></span><span class="dot1"></span><span class="dot1"></span><span class="dot"></span>
        </div>
          <?php if(!empty($statusMsg)) { ?>
            <p class=“status-msg”><?php echo $statusMsg; ?></p>
            <?php } ?>

        <div class="col-lg-6 mx-auto">

            <form action="" method="post" enctype="multipart/form-data">
               
                <input type="file" name="uploadFile" />
                <input type="submit" class="btn btn-success" name='fileUploadSubmit' value="Upload"/>  
            </form>

<div class="image_preview_wrap">
                <?php
// Include the database configuration file
include 'inc/connection.php';


// Get images from the database

$query = mysqli_query($conn, "SELECT * FROM fileupload ORDER BY uploaded_on DESC");


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
 
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>   -->
<!-- <script>
    $('#mydiv').delay(5000).hide(0); 
</script> -->





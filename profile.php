
<?php
include('layout/header.php');

error_reporting(0);

$fileName = $_FILES["uploadFile"]["name"];
$tempname = $_FILES["uploadFile"]["tmp_name"];
// $file_size = $_FILES['uploadFile']['size'];
$folder = "media/".$fileName;
move_uploaded_file($tempname, $folder);


if(!isset($_SESSION['fname'])){
  echo "your are logged out";
 // header('location:login.php');
  ?>
        <script type="text/javascript">
            location.replace("login.php");
        </script>
<?php

}


?>



<div class="page-heading"><h1>Profile</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container">

          <div class="heading">
            <div class="row">
              <div class="col-sm-12 col-lg-3 ">
                 <p>you can change your profile pic</p>
                <div class="rounded-circle mb-4 bg-danger text-center" style="width: 200px; height: 200px;">
                    <img class="img-fluid" src="<?php echo $folder; ?>" alt="profile pic" />
                </div>
                
                <form class="mb-3" action="" method="post" enctype="multipart/form-data">
                   <input type="file" class="form-control" name="uploadFile">

                    <input name="submit" type="submit" value="Upload File" class="btn dark-btn mt-4">
                </form>

              </div>
              <div class="col-sm-12 col-lg-6"> 
              <span class="subtitle">Congratulations!</span>
              <h2>Welcome to<span> <?php echo $_SESSION['fname'];?></span></h2><span class="dot1"></span> <span class="dot1"></span><span class="dot1"></span><span class="dot"></span>
         
        <p>Please send us a message and we’ll be glad to help!</p>

        <a href="logout.php">Logout</a>
             </div>
       </div>
      </div>
       
    </div>
</section>

</main>

<?php

include('layout/footer.php');

?>
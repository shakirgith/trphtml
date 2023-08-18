
<?php
include('layout/header.php');
if(isset($_POST['submitImage']))  
{  
    for($i=0;$i<count($_FILES["uploadFile"]["name"]);$i++)  
    {  
        $uploadfile=$_FILES["uploadFile"]["tmp_name"][$i];  
        $folder="media/";  
        $fileName =  $folder.$_FILES["uploadFile"]["name"][$i];

        if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], "$folder".$_FILES["uploadFile"]["name"][$i]))  {

            $insert = mysqli_query($conn,"INSERT into fileupload (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            } else {

                echo "not uploaded";
            }

        }

    }  
    exit();  
}  else {
    echo "has been uploaded successfully";
   
}
  

?>  



<div class="page-heading"><h1>Upload file</h1></div>   
<main id="main" class="site-main mt-0">
       
  <section class="text-center">
    <div class="container">
        <div class="heading">
            <h2>Multiple Image Upload using PHP Ajax</h2><span class="dot1"></span><span class="dot1"></span><span class="dot1"></span><span class="dot"></span>
        </div>
        <p>Please send us a message and we’ll be glad to help!</p>

        <div class="col-lg-6 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">  
                <input type="file" id="uploadFile" name="uploadFile[]" multiple/>  
                <input type="submit" class="btn btn-success" name='submitImage' value="Upload Image"/>  
            </form> 
            <br/>  
  <div id="image_preview"></div>   
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

<script type="text/javascript">  
    
  $("#uploadFile").change(function(){  
     $('#image_preview').html("");  
     var total_file=document.getElementById("uploadFile").files.length;  
  
     for(var i=0;i<total_file;i++)  
     {  
      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[$i])+"'>");  
     }  
  
  });  
  
  $('form').ajaxForm(function()   
   {  
    alert("Successful Uploading");  
   });   
  
</script>  




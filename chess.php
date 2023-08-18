

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Rainbow" />
    <meta name="description" content="Rainbow" />
    <link rel="shortcut icon" href="assets/images/trp-favicon.png" />
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>
        .table2 {border: 1px solid #000}
        .table2 tr td {padding:20px}
        .bg-dark {background-color:#000}
    </style> 
</head>
<body>


<div class="page-heading"><h1>Chess</h1></div>
<section class="user-admin-table">
  
    <div class="container">
    <form class="row justify-content-center mb-5" method="POST" action="">
        <div class="col-md-8">
        <input type="text" class="form-control" name="cb" value="" required>
        </div> 
        <div class="col-md-4">
        <input type="submit" class="btn btn-danger" name="submit" value="Generate Chess Board">
        </div> 
    </form>

<table class="table2">
  <tbody>

  <?php
   if(isset($_POST['submit'])){
      $data = $_POST['cb'];

      // start FOR LOOP for row and collumn of table 
      for($row=1; $row<=$data; $row++){
        echo "<tr>";

             for($col=1; $col <= $data; $col++){
                if(($row + $col) % 2 == 0){
                    echo "<td class='bg-dark'> </td>";
                } else {
                    echo "<td> </td>";
                }
             }

        echo "</tr>";

      }


   }



   ?>

  </tbody>
</table>







    


</div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
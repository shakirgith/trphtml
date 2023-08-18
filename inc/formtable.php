<?php 

$adminurl = 'http://localhost/trphtml';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Rainbow" />
    <meta name="description" content="Rainbow" />
    <link rel="shortcut icon" href="assets/images/trp-favicon.png" />
    <link rel="stylesheet" type="text/css" href="../assets/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link href="../admin/assets/css/simple-datatables-style.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> 
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
</head>
<body>


<div class="page-heading"><h1>Display</h1></div>
<section class="user-admin-table">
  
    <div class="container">
        <div class="heading text-center">
            <span class="subtitle d-block text-center">Contact us </span>
            <h5>List of user details</h5>
            <span class="dot1"></span> <span class="dot1"></span><span class="dot1"></span><span class="dot"></span>
        </div>

<div class="table-responsive">
<table class="table table-bordered" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Upload File</th>
      <th scope="col">Title</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
    include('connection.php');   

    $selectquery = " select * from contactus ";

    // inserted data showing in table
    $query = mysqli_query($conn, $selectquery);

    $nums = mysqli_num_rows($query);

    // $res = mysqli_fetch_array($query);

    // loop increase the table
    while($res = mysqli_fetch_array($query)){
      // echo $res['Name'] . "<br>";


?>

      <tr>
      <td><?php echo $res['Id']; ?></td>
       <td><img class="img-table" style="width: 100px; height:auto;" src="<?php echo $adminurl; ?>/<?php echo $res['file_name']; ?>" alt="images"></td>
       <td><?php echo $res['Title']; ?></td>
      <td><?php echo $res['Name']; ?></td>
      <td><?php echo $res['Email']; ?></td>
      <td><?php echo $res['Subject']; ?></td>
      <td><?php echo $res['Message']; ?></td>
      <td align="center"><a href="delete.php?userid=<?php echo $res['Id']; ?>" data-bs-toggle="tooltip" title="Delete"> <i class="fa fa-trash"></i> </a> </td>
    </tr>

<?php
}
 ?>


    

  </tbody>
</table>


<nav aria-label="Page navigation example">

 <!--  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul> -->

</nav>

</div>


<div class="table-responsive userinfo mt-5">
<table class="table table-bordered" id="datatablesSimple">
  <thead>
    <tr>
       <th scope="col">ID</th>
        <th scope="col">Date</th>
       <th scope="col">Page URL</th>
        <th scope="col">User IP</th>
      <th scope="col">OS</th>
      <th scope="col">Device</th>
      <th scope="col">Visitors</th>
    </tr>
  </thead>
  <tbody>


    <?php
    include('connection.php');   

    $selectquery = " select * from visitor_logs ";

    // inserted data showing in table
    $query = mysqli_query($conn, $selectquery);

    $nums = mysqli_num_rows($query);

    // loop increase the table
    while($res2 = mysqli_fetch_array($query)){
      // echo $res['Name'] . "<br>";


?>


     <tr> 
       <td> <?php echo $res2['id']; ?></td>
       <td> <?php echo $res2['user_date']; ?></td>
      <td> <?php echo $res2['page_url']; ?></td>
      <td><?php echo $res2['user_ip_address']; ?></td>
      <td><?php echo $res2['user_os']; ?></td>
      <td><?php echo $res2['user_device']; ?></td>
      <td><?php echo $res2['visit_count']; ?></td>

    </tr>
   

<?php
}
 ?>
 <tr> 
       <td></td>
       <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>

      <?php 
 include('connection.php');   
      $selectcollumn = "select count(visit_count) as total from visitor_logs";
      // $sql = "select sum(column) from table";
      $sumquery = mysqli_query($conn, $selectcollumn);
      $sumquery  = $sumquery->fetch_row();
      $total_savings = $sumquery[0];

      ?>
      <td>Total: <?php echo $total_savings; ?></td>



    </tr>

  </tbody>
</table>

</div>

</div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
       <script src="../admin/assets/js/scripts.js"></script>
        <script src="../admin/assets/js/simple-datatables.min.js"></script>
        <script src="../admin/assets/js/datatables-simple-demo.js"></script>
</body>
</html>
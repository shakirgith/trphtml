<?php
include('layout/admin_header.php');
?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php
                include('layout/sidbar.php');
                ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a href="#">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User Activity
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
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
    include('../inc/connection.php');   

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
 include('../inc/connection.php');   
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

                    </div>
                </main>
                
<?php
include('layout/admin_footer.php');
?>
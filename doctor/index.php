<?php 
include 'include/check.php';
include '../include/db.php';
$num_rec_per_page=10;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
//$sql2 = "SELECT DISTINCT corder.transactionid,corder.ftotal,corder.status,details.loginID,login.nama as name FROM corder join details on corder.user_id = details.num join login on details.loginID = login.num  LIMIT $start_from, $num_rec_per_page";

$sql2 = "SELECT DISTINCT transactionid,ftotal,status FROM corder  LIMIT $start_from, $num_rec_per_page";

$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);
?>
  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">
       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Patient  <small>List</small>
                        </h1>
                        
                    </div>
                </div>
             

               
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Customer Order</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1">No.</th>
                                                <th class="col-lg-5">Transaction ID</th>
                                                
                                                <th class="col-lg-1">Total</th>
                                                <th class="col-lg-3">Status</th>
                                                <th class="col-lg-3">Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_rows = 1; while($row2 = mysqli_fetch_assoc($result2)){  ?>
                                              <tr>
                                                <td ><?php  echo $total_rows;  ?></td>
                                                <td><?php echo $row2['transactionid']; ?></td>
                                                
                                                <td><?php echo $row2['ftotal']; ?></td>
                                                <td><?php echo $row2['status']; ?></td>
                                                
                                                <td ><center><a  class = "btn btn-primary btn-sm"  href="edit.php?id=<?=$row2['transactionid'];?>" >Update</a>&nbsp;<a   onclick = "return del();" class = "btn btn-danger btn-sm" href="del.php?id=<?=$row2['transactionid'];?>&t=r" >Delete</a></center></td>
                                              </tr>
                                             <?php $total_rows++; }  ?> 
                                           
                                        </tbody>
                                    </table>
                                    <!--- bawah ni pagination-->
                                 	<?php 
                                            $sql = "SELECT distinct transactionid FROM corder"; 
                                            $rs_result = mysqli_query($connect,$sql); //run the query
                                            $total_records = mysqli_num_rows($rs_result);  //count number of records
                                            $total_pages = ceil($total_records / $num_rec_per_page); 

                                            echo '<ul class="pagination">'; 
                                            echo '<li><a href="index.php?page=1">&laquo;</a></li>';
                                            for ($i=1; $i<=$total_pages; $i++) { 

                                                         echo "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
                                            }; 
                                            echo "<li><a href='index.php?page=$total_pages'>&raquo;</a></li>";
                                            echo "</ul>";
                                        ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>


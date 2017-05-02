<?php 
include 'include/check.php';
include '../include/db.php';

$sql2 = "SELECT * FROM staffdetail ";
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
                            Staff <small>Management</small>
                        </h1>
                        
                    </div>
                </div>
             

               <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Adding a new user?</strong> Try out <a href="newu.php" class="alert-link">Here</a>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> User Credentials Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">                                    
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-4" rowspan="3">Name</th>
                                                <th class="col-lg-3" rowspan="3">Username</th>
                                                
                                                <th class="col-lg-2">Access Level</th>
                                                <th class="col-lg-2"><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row2 = mysqli_fetch_assoc($result2)){ $o=1; ?>
                                              <tr>
                                                <td ><?php echo $row2['name']; ?></td>
                                                <td ><?php echo $row2['username']; ?></td>
                                                
                                                <td ><?php if($row2['level'] == 1) {echo '<span class="label label-success">Admin</span>';}else echo '<span class="label label-primary">Staff</span>'; ?></td>
                                                <td ><center>
                                                    <a  class = "btn btn-primary btn-sm"  href="edit.php?id=<?=$row2['staffid'];?>" >Update</a>&nbsp;
                                                   
                                                    <a   id = "confirmation" class = "btn btn-danger btn-sm" href="del.php?id=<?=$row2['staffid'];?>&t=r" >Delete</a></center></td>
                                              </tr>
                                             <?php  }  ?> 
                                           
                                        </tbody>
                                    </table>
                                    <!--- bawah ni pagination-->
                                 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>


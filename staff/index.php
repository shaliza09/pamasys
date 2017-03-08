<?php 
include 'include/check.php';
include '../include/db.php';

$sql2 = "SELECT DISTINCT diagnosis.pid as pid,diagnosis.diagid as did,diagnosis.checkin as timecheckin,diagnosis.status as status ,patient.patientID as pid ,patient.name as name ,patient.ic as ic FROM diagnosis join patient on diagnosis.pid = patient.patientID WHERE status != 'Complete' ORDER BY diagnosis.checkin ASC ";


$result2 = mysqli_query($connect,$sql2);
$p=mysqli_num_rows($result2);


$sql3 = "SELECT * FROM patient";

$result3 = mysqli_query($connect,$sql3);
$p3=mysqli_num_rows($result3);

?>
  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">
       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Patient <small>Queue</small>
                        </h1>
                        
                    </div>
                </div>
             

               <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Adding a new Inpatient?</strong> Try out <a href = "list.php" class="alert-link">Here</a>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Patient List</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table">
                                     <div class="dataTable_wrapper">                                    
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1">No.</th>
                                                <th>Patient Name</th>
                                                <th>Patient IC</th>
                                               
                                                <th>Checkin Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_rows = 1; while($row2 = mysqli_fetch_assoc($result2)){  ?>
                                              <tr>
                                                <td><?=$total_rows;?></td>
                                                <td><?php echo $row2['name']; ?></td>
                                                <td><?php echo $row2['ic']; ?></td>
                                                <td><?php  echo $row2['timecheckin'];//echo substr($row2['itemDesc'],0,40); ?></td>
                                                 
                                                <td><?php echo $row2['status']; ?></td>
                                                
                                                <td ><center><a  class = "btn btn-primary btn-sm"  href="listdiagnosis.php?id=<?=$row2['pid'];?>" data-toggle="tooltip" data-placement="top" title="Attended"><span class="glyphicon glyphicon-eye-open" ></span></a>&nbsp;
                                                  &nbsp;
                                                    <a id="confirmation" class = "btn btn-danger btn-sm"  href="del.php?id=<?=$row2['did'];?>&t=p"  title="Cancel"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
                                              </tr>
                                             <?php $total_rows++; }  ?> 
                                           
                                        </tbody>
                                    </table>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
    </div>
    <!-- /.footer -->

   
    <?php include "include/footer.php"; ?>

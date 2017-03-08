 <?php 
//include 'include/check.php';
include '../include/db.php';
$transid = $_GET["id"];
if (isset($_GET["id"])) {
   
   $query3="SELECT distinct diagnosis.content as content,diagnosis.med as med, diagnosis.checkin as checkin,patient.name as name ,patient.phonenumber as notel, patient.ic as ic,patient.address as address FROM diagnosis join patient on diagnosis.pid = patient.patientID WHERE diagnosis.diagid = '$transid'"; //index details
	$result3 =mysqli_query($connect,$query3);
	$count = mysqli_num_rows($result3);

			
}?>
  <!-- Header Content -->
   <?php include "include/header.php"; ?>
    <!-- end header Content -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Patient Transaction <small>Details</small>
                            <div class="pull-right"><small>Patient ID: P<?php echo $transid;?></small></div>
                        </h1>
                        
                    </div>
                </div>
        <div class="row">
            <div class="col-lg-12">
                    <form method = "POST" action ="updateq.php">
                    
                    <table class = "table">
                          
                        <tr>

                            <?php while($row2 = mysqli_fetch_assoc($result3)){  
                            ?>
                            <td class = "col-md-6" colspan="2">
                            <Strong>Patient Information</Strong></br></br>
                                Check in Time :   <Strong><?php echo $row2['checkin']; ?></Strong></br>
                                Name : <?php echo $row2['name']; ?></br>
                                Identification Number : <?php echo $row2['ic']; ?></br>
                                Phone Number : <?php echo $row2['notel']; ?></br>
                                Address : <?php echo $row2['address']; ?></br>
                               </br>
                            
                                </td>


                              

                                
                        </tr>
                      </hr>
                        <tr>
                            <th >Diagnosis</th>
                            <th >Medication Prescription</th>
                           
                        </tr>
                        <tr>
                            
                            <td><textarea class = "form-control" cols = "77" name= "content" rows="5"><?php echo $row2['content']; ?></textarea></td>
                            <td><textarea class = "form-control" cols = "77" name ="med" rows="5"><?php echo $row2['med']; ?></textarea></td>
                            <input type = "hidden" name ="id" value = "<?=$transid;?>">
                                
                        </tr>
            <?php  }  ?>    
                    </table>
                    
                <hr>
                <div class="pull-right">
                    
                     <button type ="submit" class ="btn btn-success" >Save</button>
                    <a  class = "btn btn-primary" href="#" onclick="#" >Print</a>
                    <a  class = "btn btn-danger" href="#" onclick="window.history.go(-1);" >Cancel</a>
                </div>
                 </form>
                </div>
        </div>
       
</div>
    <!-- /.footer -->
    <?php include "include/footer.php"; ?>

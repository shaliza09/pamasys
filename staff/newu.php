<?php
include 'include/check.php';
include '../include/db.php';
$num = $_SESSION['sid'];
$sql = "SELECT login.username as username, d.name as name, d.address as address , d.notel as notel FROM userdetail d join login on login.num = d.staffid where staffid = '$num'";
$result = mysqli_query($connect,$sql);

include "include/header.php"; ?>
    <!-- end header Content -->

<div class="container">
       <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Credentials <small>Management</small>
                        </h1>
                        
                    </div>
                </div>

<div class="row">
    <div class="col-lg-6">
        <form method="POST" action = "reg_user.php">
            <?php while($row2 = mysqli_fetch_assoc($result)){ ?>
                <label>Name</label> </br>
                   <input class="form-control"  type="text" name = "name"  value="<?=$row2['name']; ?>" required>
                     </br>
             <label>Username</label> </br>
               <input class="form-control"  type="text" name = "user" value="<?=$row2['username']; ?>" required>
                 </br>
            <label>Password</label></br>  
               <input class="form-control"  type="password" name = "pass"  placeholder = "if want to change password only"></a>
                 </br>
            
            </br>

 </div> 
        <div class="col-lg-6">
            
                 
                <label>Address</label></br>  
                   <input class="form-control"  type="text" name = "add" value="<?=$row2['address']; ?>" required></a>
                     </br>
                <label>Phone Number</label></br>  
                   <input class="form-control"  type="text" name = "notel" value="<?=$row2['notel']; ?>" required></a>
                     </br>
                <label>Title</label></br>  
                    <select class ="form-control" name = "title">
                        <option value = "Mr.">Mr.</option>
                        <option value = "Miss">Miss</option>
                        <option value = "Madam">Madam</option>
                        <option value = "Dr.">Dr.</option>
                    </select>
                </br>
   
 
    </div>
<?php  }  ?>
</div>
<input class="btn btn-primary pull-right" type ="submit" name = "submit" id ="submit" value="Submit">
 </form>
  <?php include "include/footer.php"; ?>
<?php
       if(isset($_GET['s'])){
           $s = $_GET['s'];
         switch ($s){
            case 't':
            echo  '<script type="text/javascript" language="javascript"> 
            swal("Succesful", "", "success");</script>';
            break;
            case 'f':
            echo  '<script type="text/javascript" language="javascript"> swal("Failed", "", "error");
            </script>';
            break;
            case 'lt':
            echo  '<script type="text/javascript" language="javascript"> swal("Succesful", "Welcome user!", "success");
            </script>';
            break;
            case 'llt':
            echo  '<script type="text/javascript" language="javascript"> swal("Succesfully Registered", "Please Login to continue", "success");
            </script>';
            break;
             case 'lf':
            echo  '<script type="text/javascript" language="javascript"> swal("Failed", "username or password went wrong", "error");
            </script>';
            break;
            case 'sf':
            echo  '<script type="text/javascript" language="javascript"> swal("Failed", "You have no Access! Login First!", "error");
            </script>';
            case 'p':
            echo  '<script type="text/javascript" language="javascript"> swal("Succesful", "You have Successfully delete the record!", "success");
            </script>';
            break;
             case 'pt':
            echo  '<script type="text/javascript" language="javascript"> swal("Succesful", "You have Successfully save the record!", "success");
            </script>';
            break;
        default:  
            }
       }?>
 
    <div class="container">

        <hr>

        <!-- Footer -->
        <footer class="footer">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;<strong>G5CProjects</strong> 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
     
    <script src="../include/dataTables/jquery.dataTables.js"></script>
    <script src="../include/dataTables/dataTables.bootstrap.js"></script>
        

    
 	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

  
    </script>
   
    <script>
        $(function () {
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Patient Percentage shares January, 2016 to May, 2016'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Patients',
                colorByPoint: true,
               data: [{ name: 'Inpatients',y: 50 }, { name: 'Outpatients', y: 51, sliced: true, selected: true }]
                
            }]
        });
    });
         </script>
 <script>
        $('#confirmation').click(function(e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        warnBeforeRedirect(linkURL);
        });

         function warnBeforeRedirect(linkURL) {
            swal({
              title: "Delete This Record?", 
              text: "Caution! You cannot reverse this!", 
              type: "warning",
              showCancelButton: true
            }, function() {
              // Redirect the user
              window.location.href = linkURL;
            });
          }
    </script>
</body>

</html>
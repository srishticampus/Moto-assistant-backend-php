<?php
include 'header.php';


?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
          
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rating</h4>
                  <p class="card-description">
                  <!--   Add class <code>.table-bordered</code> -->
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered table-striped" id="example"  style="width:100%">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Review</th>
                          <th>Review Count</th>
                          <th>
                            User Name
                          </th>
                       <th>User Email</th>
                          <th>User Phone</th>
                          <th>Workshop Name</th>
                          <th>Workshop Email</th>
                          <th>Workshop Phone</th>
                          <th>Workshop Address</th>
                          <th>service_name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>UserImage</th>
                          
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sql ="SELECT  rating.service_id,rating.id,rating.count,rating.review,rating.workshop_id,rating.user_id,workshop.workshop_name,workshop.email,workshop.phone,workshop.place,workshop.address,user.name as uname,rating.created_at,user.profilePic,user.email as uemail,user.phone_number,user.address as uaddress FROM rating LEFT JOIN workshop ON rating.workshop_id=workshop.id INNER JOIN user on rating.user_id=user.id ";
                      $result=$con->query($sql);
                      $count=$result->num_rows;
                      $i=1;
                      if($count>0){
                      	while($row=$result->fetch_assoc()){
                           $created_at=$row['created_at'];
                $date=date('Y-m-d',strtotime($created_at));
                $time=date('h:i:s',strtotime($created_at));
                 $serviceid=$row['service_id'];
 $s="select * from services where id=$serviceid";
 $res=$con->query($s);
 $ro=$res->fetch_assoc();

 


                            
                      		?>

                      		
                        <tr>
                          <td>
                            <?php
                            echo $i++;
                            ?>
                          </td>
                          <td><?php echo $row['review'];?></td>
                           <td><?php echo $row['count'];?></td>
                          <td>
                            <?php echo $row['uname'];?>
                          </td>
                          <td>
                            <?php echo $row['uemail'];?>
                          </td>
                          <td>
                            <?php echo $row['phone_number'];?>
                          </td>
                          <td>
                            <?php echo $row['workshop_name'];?>
                          </td>
                          <td>
                            <?php echo $row['email'];?>
                          </td>
                          <td>
                            <?php echo $row['phone'];?>
                          </td>
                          <td>
                            <?php echo $row['address'];?>
                          </td>
                          <td>
                            <?php
                             echo $ro['service_name'];
?>
                          </td>
                          <td>
                            <?php echo $date;?>
                          </td>
                          <td>
                            <?php echo $time;?>
                          </td>
                          <td>
                            <img src="http://campus.sicsglobal.co.in/Project/Moto/api/uploads/<?php echo $row['profilePic']?>">
                          </td>

                          
                        </tr>
                       
                   
                      		<?php

                      	}
                      }
                      ?>
                         </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
 
 <script type="text/javascript">
 	$(document).ready(function () {
    $('#example').DataTable();
});
 </script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

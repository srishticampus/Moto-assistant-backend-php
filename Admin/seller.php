<?php
include 'header.php';

?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
          
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Seller</h4>
                  <p class="card-description">
                  
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                           Name
                          </th>
                          <th>
                           Email
                          </th>
                          <th>
                            Phone
                          </th>
                          
                           <th>
                       License Number
                          </th>
                          <th>Profile</th>
                          <th>Address</th>
                          <th>District</th>
                          <th>State</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <?php
                      $i=1;
                      $sql="select * from seller";
                      $result=$con->query($sql);
                      $count=$result->num_rows;
                      if($count>0){
                        while($row=$result->fetch_assoc()){
                          ?>
                         
                      <tbody>
                        <tr>
                          <td>
                          <?php echo $i++;?>
                          </td>
                          <td>
                            <?php echo $row['name'];?>
                          </td>
                          <td>
                            <?php echo $row['email']?>
                          </td>
                          <td>
                          <?php echo $row['phone'];?>
                          </td>
                          <td>
                          <?php echo $row['license_number'];?>
                          </td>
                          <td><img src="http://campus.sicsglobal.co.in/Project/Moto/api/uploads/<?php echo $row['file'];?>"></td>
                           <td>
                          <?php echo $row['address'];?>
                          </td> <td>
                          <?php echo $row['district'];?>
                          </td>
                           <td>
                          <?php echo $row['state'];?>
                          </td>

                          <td><a href="accept_seller.php?id=<?php echo $row['id'];?>">


<?php
if($row['status']==1){
  echo 'Accepted';
}
else{
  echo 'Accept';
}
?>


                         </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="reject_seller.php?id=<?php echo $row['id'];?>"><?php
if($row['status']==3){
  echo 'Rejected';
}
else{
  echo 'Reject';
}
?></a></td>
                        </tr>
                       
                        
                      </tbody>
                       <?php
                        }
                      }
                      ?>
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
  <!-- End custom js for this page-->
</body>

</html>

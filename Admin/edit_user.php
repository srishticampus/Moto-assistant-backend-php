<?php
include 'header.php';
$id=$_GET['id'];


?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
          
            
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                 
                  <form class="forms-sample" enctype="multipart/form-data" method="post" action="edit_action.php">
                    <?php
                    $sql="select * from user where id=$id";
                    $result=$con->query($sql);
                    $row=$result->fetch_assoc();
                    ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="hidden" class="form-control" name="id" id="exampleInputName1" placeholder="Id" value="<?php echo $id;?>">
                      <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" value="<?php echo $row['name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Email</label>
                      <input type="text" class="form-control" name="email" id="exampleInputName1" placeholder="Email" value="<?php echo $row['email'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Phone</label>
                      <input type="text" class="form-control" name="phone" id="exampleInputName1" placeholder="Phone" value="<?php echo $row['phone_number'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Address</label>
                      <input type="text" class="form-control" name="address" id="exampleInputName1" placeholder="Address" value="<?php echo $row['address'];?>">
                    </div>
                   
                    
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" name="img"  placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
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

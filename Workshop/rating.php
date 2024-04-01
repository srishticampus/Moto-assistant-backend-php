<?php
include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			<main class="main-content">
				
				<div class="fullwidth-block content">
					<div class="container">
						<h1 class="entry-title">Rating</h1>
						<table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>Sl no</th>
                <th>User Name</th>
                <th>Services Name</th>
                <th>Rating Count</th>
                
               
                
            </tr>
        </thead>
        <tbody>
        <?php
        $j=1;
        $sql="SELECT rating.count,user.name,services.service_name FROM rating INNER JOIN user ON rating.user_id=user.id INNER JOIN services ON services.id=rating.id where rating.workshop_id=$id";
$result=$con->query($sql);
while($row=$result->fetch_assoc()){
	?>
	
            <tr>
                <td><?php echo $j++;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['service_name'];?></td>
                <td>

 <?php
                for ($i = 1; $i <= 5; $i++) {
                  $ratingClass = "btn-default btn-grey";
                  if($i <= $row['count']) {
                    $ratingClass = "btn-warning";
                  }
                ?>
                  <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>               
                <?php } ?>


                </td>
                
               
           
               
            </tr>
          
        
	<?php

}

        ?>
        </tbody>
        
       
    </table>

						
						
						
					
					</div>
				</div>

			</main> <!-- .main-content -->

			<?php
	include 'footer.php';
	?>

		

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>



		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
    $('#example').DataTable();
});
		</script>
		
		
	</body>

</html>
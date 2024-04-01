<?php
include 'header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

			<main class="main-content">
				
				<div class="fullwidth-block content">
					<div class="container">
						<h1 class="entry-title">Request</h1>
						<table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>Sl no</th>
                <th>User Name</th>
                <th>Services Name</th>
                <th>Description</th>
                <th>Send Date & Time</th>
                <th>Status</th>
                <th>Action</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        $sql="SELECT request.id,user.name,request.phone,request.price,request.status,request.staff_name,request.service_name,request.final_price,request.description,request.created_at,request.user_id,request.status
FROM request
INNER JOIN workshop ON request.workshop_id=workshop.id INNER JOIN user ON request.user_id=user.id where workshop.id=$id order by request.id DESC";
$result=$con->query($sql);
while($row=$result->fetch_assoc()){
	?>
	
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['service_name'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['created_at'];?></td>
                <td><?php
                if($row['status']==0){
                    echo 'Requested';
                }
                else if($row['status']==1){
                    echo 'Accepted';
                }
                else if($row['status']==2){
                    echo 'Completed';
                }
                else if($row['status']==3){
                    echo 'Paid';
                }else{
                    echo 'Rejected';
                }



                ?></td>
                <td>
<?php
if($row['status']==0){
	?>

	<form action="accept_request.php" method="post">
                	
                	<input type="hidden" name="request" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                	<input type="hidden" name="user_id" id="request<?php echo $row['user_id'];?>"  value="<?php echo $row['user_id'];?>">
                	<input type="text" name="tname" id="tname" placeholder="Name"><br>
                	<label>Estimated Price</label><br><input type="text" placeholder="price"name="price" value="<?php echo $row['price'];?>">
                	<br><input type="text" placeholder="phone"name="phone" value="<?php echo $row['phone'];?>">
                	<input type="submit" name="accept" value="Accept">
                    <input type="submit" name="reject" value="Reject">
                </form>
	<?php
}
else if($row['status']==1){?>

    <form action="accept_request.php" method="post">
                    
                    <input type="hidden" name="request" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                    <input type="text" name="tname" id="tname" placeholder="Name" value="<?php echo $row['staff_name'];?>"><br>
                    <label>Estimated Price</label><br>
                    <input type="text" name="price" placeholder="price" value="<?php echo $row['price'];?>">
                    <br><input type="text" placeholder="phone"name="phone" value="<?php echo $row['phone'];?>">
                     <input type="button" name="accept" value="Accepted" style="background: #f63f3f;padding: 10px 20px;width: 90px;color: white"> 
                     
                     <input type="submit" name="reject" value="Reject" >
                </form>
    <?php

}
else if($row['status']==4){?>

    <form action="accept_request.php" method="post">
                    
                    <input type="hidden" name="request" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                    <input type="text" name="tname" id="tname" placeholder="Name" value="<?php echo $row['staff_name'];?>"><br>
                    <label>Estimated Price</label><br>
                    <input type="text" name="price" placeholder="price" value="<?php echo $row['price'];?>">
                    <br><input type="text" placeholder="phone"name="phone" value="<?php echo $row['phone'];?>">
                    <!-- <input type="submit" name="accept" value="Accept"> -->
                     <input type="submit" name="accept" value="Accept"> 
                     <input type="button" name="reject" value="Rejected" style="background: #f63f3f;padding: 10px 20px;width: 90px;margin-left: 100px; margin-top: -45px;color: white">
                </form>
    <?php

}


else{?>

	<form action="accept_request.php" method="post">
                	
                	<input type="hidden" name="request" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                	<input type="text" name="tname" id="tname" placeholder="Name" value="<?php echo $row['staff_name'];?>"><br>
                	<label>Estimated Price</label><br>
                	<input type="text" name="price" placeholder="price" value="<?php echo $row['price'];?>">
                	<br><input type="text" placeholder="phone"name="phone" value="<?php echo $row['phone'];?>">
                	<!-- <input type="submit" name="accept" value="Accept"> -->
                </form>
	<?php

}?>
                	
            </td>
            <td>
            	<?php
            	if($row['status']==0){?>
            		<form action="final_request.php" method="post">
            		<label>Final Price</label><br>
            		<input type="hidden" name="requestid" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                	<input type="text" name="final_price" placeholder="Final price" *-------->
                	<br>
                	<button type="submit" class="btn btn-danger">send</button>

            	</form>
            		<?php

            	}else if($row['status']==1){
            		?>
            		<form action="final_request.php" method="post">
            		<label>Final Price</label><br>
            		<input type="hidden" name="requestid" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                	<input type="text" name="final_price" placeholder="Final price" >
                	<br>
                	<button type="submit" class="btn btn-danger">send</button>

            	</form>
            		<?php
            	}else if($row['status']==2){
            		?>
                    <form action="final_request.php" method="post">
            		<label>Final Price</label><br>
            		<input type="hidden" name="requestid" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                	<input type="text" name="final_price" placeholder="Final price" value="<?php echo $row['final_price'];?>">
                    <button type="submit" class="btn btn-danger">send</button>
                </form>
            		<?php
            	}
else{

            	?>

                <form action="final_request.php" method="post">
                    <label>Final Price</label><br>
                    <input type="hidden" name="requestid" id="request<?php echo $row['id'];?>"  value="<?php echo $row['id'];?>">
                    <input type="text" name="final_price" placeholder="Final price" value="<?php echo $row['final_price'];?>">
                    <button type="submit" class="btn btn-danger">send</button>
                </form>

                <?php

            }
                ?>
            	
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
		
		
	
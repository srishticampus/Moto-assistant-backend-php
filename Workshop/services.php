<?php

include 'header.php';
?>

			<main class="main-content">
				
				<div class="fullwidth-block content">
					<div class="container">
						<!-- <h2 class="entry-title">Natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto</h2> -->
<!-- 
						<figure class="block">
							<img src="dummy/figure.jpg" alt="">
						</figure>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p> -->

						<div class="col-md-12">
								<form action="service_action.php" method="post" class="contact-form">
									<select id="name" name="name">
									<option>Select Service</option>
									<?php
									$sql="select * from services";
									$result=$con->query($sql);
									while($row=$result->fetch_assoc()){
										?>

										<option value="<?php echo $row['id'];?>"><?php echo $row['service_name'];?></option>
										<?php
									}

									?>
									<div class="text-right">
										<input type="submit" value="Add">
									</div>
								</form>
							</div>

						<div class="feature-grid">
							<?php
							$sql="SELECT * FROM workshop_service INNER JOIN services ON workshop_service.service_id=services.id where workshop_service.workshop_id=$id";
							$result=$con->query($sql);
							$count=$result->num_rows;
							while($row=$result->fetch_assoc()){
								?>
								<div class="feature">
								<figure class="feature-image" style="width: 200px;height: 200px;"><img src="uploads/<?php echo $row['file'];?>" alt=""></figure>
								<h2 class="feature-title"><?php echo $row['service_name'];?></h2>
							<!-- 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta earum aliquam</p> -->
							</div>
								<?php
							}

							?>
							
							
						</div>
					</div>
				</div>

			</main> <!-- .main-content -->
			<br><br><br><br><br><br><br><br><br><br><br>
<?php
	include 'footer.php';
	?>
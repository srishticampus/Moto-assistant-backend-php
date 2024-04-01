<?php
include 'header.php';
?>
<style type="text/css">
/*	.hero-slider .slides li {
    padding: 150px;
    min-height: 1790px;
  
    margin-right: -100%;
    width: 10%;
    text-align: center;
    color: white;
   
}*/

</style>

			<main class="main-content">
				<div class="hero hero-slider" >
					<ul class="slides" >
						<li data-bg-image="dummy/1.jpeg">
							<div class="container">
							
							</div>
						</li>
						<li data-bg-image="dummy/2.jpeg">
							<div class="container">
							
							</div>
						</li>
						<li data-bg-image="dummy/3.jpeg">
							<div class="container">
								
							</div>
						</li>
					</ul>
				</div> <!-- .hero-slider -->

				<div class="fullwidth-block">
					<div class="container">
						<h2 class="section-title">Our Services</h2>
						

						<div class="row">
							<?php
							$sql="SELECT * FROM workshop_service INNER JOIN services ON workshop_service.service_id=services.id where workshop_service.workshop_id=$id limit 4";
							$result=$con->query($sql);
							$count=$result->num_rows;
							while($row=$result->fetch_assoc()){
								?>
							<div class="counter">
								<img src="uploads/<?php echo $row['file'];?>" alt=""  style="width: 200px;height: 200px;">
								<h3 class="counter-num"></h3>
								<small class="counter-label"><?php echo $row['service_name'];?></small>
							</div>
							
								<?php
							}

							?>
							
						</div>
					</div> <!-- .container -->
				</div> <!-- .fullwidth-block -->

				

				

				

			</main> <!-- .main-content -->
			<br><br><br><br><br>

	<?php
	include 'footer.php';
	?>
<?php

	require_once '../connection/dbconfig.php';


?>
<div class="container">

  <div class="row">

    <div class="col-lg-12">
      <h1 class="page-header">Jobbs
        <small>All Jobbs</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#/">Home</a>
        </li>
        <li class="active">Apply</li>
      </ol>
    </div>

  </div>

<?php
	
	$stmt = $DB_con->prepare('SELECT vacID, companyName, vacProfession, vacPic, vacProfession,date(created_at) as dt FROM vacancies ORDER BY vacID DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>

				  <div class="row">

					<div class="col-md-1">
					  <p><i class="fa fa-check-square fa-4x"></i>
					  </p>

					  <p><?php echo $dt; ?></p>
					</div>
					<div class="col-md-5">
					  <a href="#/jobs">
						<img src="vac_images/<?php echo $row['vacPic']; ?>" class="img-responsive" 	>
					  </a>
					</div>
					<div class="col-md-6">
					  <h3><a href="#/jobs"><?php echo $vacProfession; ?></a>
					  </h3>

					  <p>by <a href="#"><?php echo "<strong>".$companyName."</strong>&nbsp;/&nbsp;"; ?></a>
					  </p>

					  <p>Description to be added</p>

					</div>
					
									<span>

				<a class="btn btn-primary" href="partials/addjob.php?apply_id=<?php echo $row['vacID']; ?>" onclick="return confirm('Are you sure you want to apply ?')"> Apply</a>
				</span>
				  </div>

				  <hr>	


			
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	 &nbsp; No Data Found 
            </div>
        </div>
        <?php
	}
	
?>

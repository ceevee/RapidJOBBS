<?php

	require_once '../connection/dbconfig.php';


?>
<div class="container">

  <div class="row">

    <div class="col-lg-12">
      <h1 class="page-header">Jobbs
        <small>User View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#/">Home</a>
        </li>
        <li class="active">Apply</li>
      </ol>
    </div>

  </div>


<?php
	$a=0000; // Hard code since login is not made yet 
	$b="Nadana Kodippili" ; // Hard code since login is not made yet 
	$stmt = $DB_con->prepare('SELECT * FROM apply WHERE applicantID=:bid');
	$stmt->bindParam(':bid',$a);
	$stmt->execute();
	?>
				<div class="container">

			<div class="page-header">
				<h1 class="h2"> <?php echo "Jobs Applied  by &nbsp; <strong>".$b.'&nbsp;&nbsp;&nbsp;</strong>';?><a class="btn btn-primary" href="#/applyjob.php">  Back </a></h1> 
			</div>
                </div>

                 <div class="panel-body">
<?php 
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
	?>		


				  <div class="row">

					<div class="col-md-1">
					  <p><i class="fa fa-check-square fa-4x"></i></p>

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

					

					</div>
					
				<span>

				<a class="btn btn-danger" href="partials/deletejob.php?delete_id=<?php echo $row['appID']; ?>" onclick="return confirm('Are you sure you want to apply ?')"> Delete</a>
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


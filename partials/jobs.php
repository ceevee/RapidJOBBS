<?php

	require_once '../connection/dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT vacPic FROM vacancies WHERE vacID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("vac_images/".$imgRow['vacPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM vacancies WHERE vacID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: ../#/jobs.php");
	}

?>
<div class="container">

  <div class="row">

    <div class="col-lg-12">
      <h1 class="page-header">Jobbs
        <small>Manage Jobbs</small>
		<a class="btn btn-primary" href="../rapidJOBBS/#/form.php" title="click for delete" onclick="return confirm('sure to add ?')"> Add New</a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#/">Home</a>
        </li>
        <li class="active">JOBBS</li>
      </ol>
    </div>

  </div>

<?php
	
	$stmt = $DB_con->prepare('SELECT vacID, companyName, vacProfession,date(created_at) as dt, vacPic FROM vacancies ORDER BY vacID DESC');
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
				<a class="btn btn-default" href="#" title="click for edit" onclick="return confirm('sure to edit ?')"> Edit Adv</a> 
				<a class="btn btn-primary" href="partials/delete.php?delete_id=<?php echo $row['vacID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"> Delete</a>
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
  
 

  <div class="row">

    <ul class="pager">
      <li class="previous"><a href="#">&larr; Older</a>
      </li>
      <li class="next"><a href="#">Newer &rarr;</a>
      </li>
    </ul>

  </div>

</div>
<!-- /.container -->
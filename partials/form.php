<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once '../connection/dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{

		$companyName = $_POST['companyName'];
		$vacProfession = $_POST['vacProfession'];
		
		$imgFile = $_FILES['vacPic']['name'];
		$tmp_dir = $_FILES['vacPic']['tmp_name'];
		$imgSize = $_FILES['vacPic']['size'];
		
		
		if(empty($companyName)){
			$errMSG = "Please Enter Company Name.";
		}
		else if(empty($vacProfession)){
			$errMSG = "Please Enter Job Title.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select an Advertisement.";
		}
		else
		{
			$upload_dir = 'vac_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$vacPic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$vacPic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO vacancies(companyName,vacProfession,vacPic) VALUES(:cname, :cjob, :cpic)');
			$stmt->bindParam(':cname',$companyName);
			$stmt->bindParam(':cjob',$vacProfession);
			$stmt->bindParam(':cpic',$vacPic);
			
			if($stmt->execute())
			{
				$successMSG = "Your  advertisement published successfully!";
				header("refresh:5; ../#/jobs.php");
				//header("refresh:5;alljobs.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error while publishing!";
			}
		}
	}
?>



    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
				<strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   
	<div class="container">

  <div class="row">

    <div class="col-lg-12">
      <h1 class="page-header">Jobbs
        <small>Add JOBB</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#/">Home</a>
        </li>
        <li class="active">JOBB</li>
      </ol>
    </div>

  </div>
		<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Company Name</label></td>
        <td><input class="form-control" type="text" name="companyName" placeholder="Enter Company Name" value="<?php echo $companyName; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Job Title</label></td>
        <td><input class="form-control" type="text" name="vacProfession" placeholder="Enter Profession" value="<?php echo $vacProfession; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Advertisement</label></td>
        <td><input class="input-group" type="file" name="vacPic" accept="image/*" /></td>
    </tr>
   
    
    </table>
                            <br>
                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" name="btnsave" class="btn btn-primary">&nbsp; Publish</button>
                                </div>
                            </div>
                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50% Complete
                                </div>
                            </div>
                        
<?php	
		require_once '../connection/dbconfig.php';

			if(isset($_GET['apply_id'])){
			$apply_id =$_GET['apply_id'];

}

	
		if($apply_id>0)
		{
	{
		$stmt_edit = $DB_con->prepare('SELECT * FROM vacancies WHERE vacID=:cid');
		$stmt_edit->execute(array(':cid'=>$apply_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);	

			$stmt = $DB_con->prepare('INSERT INTO apply(applicantID,applicantName,vacID,companyName,vacProfession,vacPic) VALUES(:cID,:cName,:cvacID,:ccompanyName,:cvacProfession,:cpic)');
			$stmt->bindParam(':cID',$a=0000);// Hard coded till user module up
			$stmt->bindParam(':cName',$b='Nadana Kodippili');// Hard coded till user module up
			$stmt->bindParam(':cvacID',$apply_id);
			$stmt->bindParam(':ccompanyName',$companyName);
			$stmt->bindParam(':cvacProfession',$vacProfession);
			$stmt->bindParam(':cpic',$vacPic);
			
			if($stmt->execute())
			{
		


			extract($row);
						header('Location:../#/userjobview.php'); 
			}
			else
			{
				$errMSG = "Error while publishing!";
			}
		}
		
}

	
?>

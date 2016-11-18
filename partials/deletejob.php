<?php	
	require_once '../connection/dbconfig.php';

			if(isset($_GET['delete_id'])){
			$delete_id =$_GET['delete_id'];

}

	
		if($delete_id>0)
		{
	{
	$stmt = $DB_con->prepare('SELECT vacID FROM apply WHERE appID=:bid');
	$stmt->bindParam(':bid',$_GET['delete_id']);
	$stmt->execute();
		if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM apply WHERE appID =:xid');
		$stmt_delete->bindParam(':xid',$_GET['delete_id']);
		$stmt_delete->execute();

		
		header('Location: ../#/userjobview.php');
	}
		}
		}}

	
?>

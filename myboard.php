<?php include 'template/header.php';?>
<?php if(!$_SESSION['user_username']){
			header('location: home.php');
			exit();
} ?>
<?php 
	$action = $_GET['action'];
	$boardId= $_GET['boardId'];

		if($action){
				if($action === 'Delete'){
					$sql = "DELETE FROM `table_board` WHERE board_id = '$boardId'";
					$query = $conn->exec($sql);
					if($query){
						echo "<script>alert('ลบสำเร็จ')</script>";
						echo "<script>window.location = 'myboard.php'</script>";
					}else{
						echo "<script>alert('ล้มเหลว !')</script>";
						echo "<script>window.history.back()</script>";
					}	
					exit();





				}


			}


?>
<?php 
	$memberId  = $_SESSION['user_id'];
	$sql="SELECT * FROM table_board WHERE board_member_id = $memberId";
	$query = $conn->query($sql);
	$results = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
		<h1>Myboard : <?=$_SESSION['user_id']?></h1>

		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Topic</th>
		      <th scope="col">Date</th>
			  <th scope="col">Option</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach($results as $key => $value): ?>
		  	 <tr>
		      <th scope="row"><?= $key+1 ?></th>
		      <td>
		      	<a href="board.php?boardId=<?=$value['board_id']?>">
		      		<?= $value['board_topic']?>
		      	</a>
		      </td>
		      <td><?= $value['board_date']?></td>
		      <td>
		      	<a href="editboard.php?boardId=<?=$value['board_id']?>">Edit</a> | 
		      	<a href="#" onClick="deleteBoard(<?=$value['board_id']?>)">Delete</a>
		      </td>
		     
		    </tr>
		  	<?php endforeach;?>	
		  
		  </tbody>
		</table>

	</div>





<?php include 'template/footer.php'?>

<script>
	function deleteBoard(boardId){
		const cf = confirm('คุณต้องการจะลบจริงหรือ');
		if(cf == true){
			window.location = 'myboard.php?action=Delete&boardId=' + boardId;
		}

		
	}

</script>
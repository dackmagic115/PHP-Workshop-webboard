<?php include 'template/header.php';?>
<?php 
	$action = $_GET['action'];
	$boardId = $_GET['boardId'];
	$userId = $_SESSION['user_id'];
	$commentId = $_GET['commentId'];
	if($action){
		if($action === 'comment'){
			$commentcontent = $_POST['comment'];
			$sql = "INSERT INTO  `table_comment`(comment_content,comment_member_id,comment_board_id)
								VALUES('$commentcontent','$userId','$boardId')";
			$query = $conn->exec($sql);
			if($query){
						echo "<script>alert('คอมเม้นเสร็จสิ้น')</script>";
						echo "<script>window.location = 'board.php?boardId=$boardId'</script>";
					}else{
						echo "<script>alert('มีบ้างอย่างผิดพลาด !')</script>";
						echo "<script>window.history.back()</script>";
					}	
					exit();
		}else if($action === 'deletecomment'){

					$sql = "DELETE FROM `table_comment` WHERE comment_id = $commentId";
					$query = $conn->exec($sql);

					echo $sql;
					if($query){
						echo "<script>alert('ลบสำเร็จ')</script>";
						echo "<script>window.location = 'board.php?boardId=$boardId'</script>";
					}else{
						echo "<script>alert('ลบไม่ได้ !')</script>";
						echo "<script>window.history.back()</script>";
					}	
					exit();
		}
	}
?>


	
<?php 
	$boardId  = $_GET['boardId'];
	$sql = "SELECT * FROM table_board 
					 
					 WHERE board_id = $boardId ";
	$query = $conn->query($sql);
	$result = $query->fetch();


	$sqlcomment = "SELECT * FROM table_comment WHERE comment_board_id = $boardId";
	$querycomment = $conn->query($sqlcomment);
	$resultcomment = $querycomment->fetchAll(PDO::FETCH_ASSOC);
	

?>
<div class="container">
	<h2>board ID: <?= $_GET['boardId']?></h2>

 	 <h3>Topic : <?= $result['board_topic'] ?></h3>
	 <p><?= $result['board_content'] ?></p>
		<hr>
			<div class="wrap-comment">
				<?php foreach($resultcomment as $key => $comment):?>
				<div>
					#<?php echo $key+1?>
				</div>
				<p><?= $comment['comment_content']?></p>
				<p><?= $comment['comment_date']?></p>
				<?php if($_SESSION['user_id'] === $comment['comment_member_id']): ?>
					<a href="#" onClick="deletecomment(<?=$comment['comment_id']?>,<?=$comment['comment_board_id']?>)">Delete</a>
				<?php endif; ?>
				<hr>
				<?php endforeach; ?>
			</div>


	<?php if($_SESSION['user_username']):?>
	<div class="wrap-form">
		<form  action="board.php?action=comment&boardId=<?= $_GET['boardId']?>" method="POST">
			<textarea class="form-control" name="comment" id="" cols="30" rows="10"></textarea><br>
			<input class="btn btn-primary" type="submit" value="comment">
		</form>

	</div>
	<?php endif; ?>

</div>





<?php include 'template/footer.php'?>

<script>
	function deletecomment(comment_id,boardId){

		const cf = confirm('จะลบคอมเม้นนี้จริงหรือ?');
		if(cf == true){
			window.location = 'board.php?action=deletecomment&commentId=' + comment_id + '&boardId=' + boardId;
		}

		
	}

</script>
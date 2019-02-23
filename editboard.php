<?php include 'template/header.php';?>
<?php if(!$_SESSION['user_username']){
			header('location: home.php');
			exit();
} ?>
<?php
		$action = $_GET['action'];
		if($action){
				if($action === 'Edit'){

					$topic = $_POST['topic'];
					$content = $_POST['content'];
					$mid = $_SESSION['user_id'];
					$boardid = $_POST['boardid'];

					$sql = "UPDATE `table_board` SET `board_topic` = '$topic', `board_content` = '$content' WHERE 
							`board_id` = '$boardid'";
					$query = $conn->exec($sql);
					
					if($query){
						echo "<script>alert('แก้ไขเรียบร้อย')</script>";
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
	
	 $boardId  = $_GET['boardId'];
	 $sql = "SELECT * FROM table_board WHERE board_id = '$boardId' ";
	 $query = $conn->query($sql);
	 $result = $query->fetch(PDO::FETCH_ASSOC);
?>


<div class="container">
    <h2>Edit board</h2>
    <form action="editboard.php?action=Edit" method="POST">
    		<input type="hidden" name="boardid" value="<?= $result['board_id']?>">
        <div class="form-group">
            <label for="topic">Topic</label>
            <input type="text" name="topic" id="topic" value="<?= $result['board_topic'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" name="content"  id="content" rows="10" required><?= $result['board_content'] ?>
            </textarea>
           
        </div>
        	<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include 'template/footer.php'?>
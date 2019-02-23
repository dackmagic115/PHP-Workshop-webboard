<?php include 'template/header.php';?>
<?php
	date_default_timezone_set('Asia/Bangkok');
	$sql="SELECT * FROM table_board 
				   INNER JOIN table_member ON table_board.board_member_id = table_member.member_id ";
	$query = $conn->query($sql);
	$results = $query->fetchAll(PDO::FETCH_ASSOC);


?>
	<div class="container">
		<h1>Home Page</h1>
		<h2><?=	$_SESSION['user_id']?></h2>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Topic</th>
		      <th scope="col">Date</th>
			  <th scope="col">Author</th>
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
		      <td>
		      	<?php 
		      	 	$date = new DateTime($value['board_date']);
		      	 	echo $date->format('D,d-m-Y');

		      	 ?>
		      	

		      </td>
		      <td><?= $value['member_name']?></td>
		     
		    </tr>
		  	<?php endforeach;?>	
		  
		  </tbody>
		</table>

	</div>



<?php include 'template/footer.php'?>
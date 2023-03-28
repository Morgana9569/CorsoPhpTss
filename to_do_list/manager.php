<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h1 class="text-primary">To Do List</h1>
		<hr style="border-top:1px dotted #ccc;" />
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<div>
				<i class="fa-solid fa-circle-user fa-2xl"></i>
			</div>
			<br /><br />

			<form method="POST" class="form-inline" action="add_query.php">
				<input type="text" class="form-control" name="task" required /> <br /><br />
				<button class="btn" name="add">Aggiungi Task</button>
			</form>

		</div>
		<br /><br /><br />
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Task</th>
					<th>Stato</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require 'conn.php';
				$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
				$count = 1;
				while ($fetch = $query->fetch_array()) {
				?>
					<tr>
						<td><?php echo $count++ ?></td>
						<td><?php echo $fetch['task'] ?></td>
						<td><?php echo $fetch['stato'] ?></td>
						<td colspan="2">

							<?php
							if ($fetch['stato'] != "Fatto") {
								echo
								'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-fatto"><span class="fa-solid fa-check"></span></a> |';
							}
							?>
							<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-cancella"><span class="fa-solid fa-poo"></span></a>

						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<div class="container">
			<span>
				<a href="">Tutti | </a>
				<a href="">Conclusi | </a>
				<a href="">Attivi | </a>
				<a href="">Oggi</a>
			</span>
		</div>
	</div>
	
</body>
	<footer class="footer-bottom">
		<div class="container">
			<span>
				Andrea Fabbricatore
			</span>
		</div>
	</footer>
</html>
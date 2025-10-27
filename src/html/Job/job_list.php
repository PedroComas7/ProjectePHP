<?php 
	require('../includes/header.php');
	require('../includes/nav.php');

	require '../../../vendor/autoload.php';
	use models\Job;

	$jobs = Job::all();
?>

<div id="section">
	<h3>Jobs</h3>
	<table class="table table-bordered table-striped">
		<thead>
			<tr> <th>#</th>
				<th>Job title</th>
				<th>Min Salary</th>
				<th>Max Salary</th>
				<th>Actions 	
					<a href="formulario.php' . '" class="mr-2" title="New File" data-toggle="tooltip"><span class="fa fa-pencil-square-o"></span></a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($jobs as $row) {
					echo 
						"<tr>" . 
							"<td>" . $row->job_id     . "</td>" .
							"<td>" . $row->job_title  . "</td>" .
							"<td>" . $row->min_salary . "</td>" .
							"<td>" . $row->max_salary . "</td>" .
                            "<td>" .
								'<a href="job_update.php?id=' . $row->job_id . '" class="mr-2" title="Update File" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>' .
								'<a href="job_delete.php?id=' . $row->job_id . '" class="mr-2" title="Delete File" data-toggle="tooltip"><span class="fa fa-trash"></span></a>'               .
							"</td>" .
						"</tr>";
					}
			?>
		</tbody> 
	</table>
</div>
</div>
<?php 	require_once __DIR__ . '/../includes/footer.php'; ?>
</body>
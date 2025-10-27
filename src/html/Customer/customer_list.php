<?php 
	require('../includes/header.php');
	require('../includes/nav.php');

	require '../../../vendor/autoload.php';
	use models\Customer;

	$customers = Customer::all();
?>

<div id="section">
	<h3>Customers</h3>
	<table class="table table-bordered table-striped">
		<thead>
			<tr> <th>#</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Street Address</th>
				<th>Actions 	
					<a href="formulario.php' . '" class="mr-2" title="New File" data-toggle="tooltip"><span class="fa fa-pencil-square-o"></span></a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($customers as $row) {
					echo 
						"<tr>" . 
							"<td>" . $row->customer_id     . "</td>" .
							"<td>" . $row->customer_first_name  . "</td>" .
							"<td>" . $row->customer_last_name . "</td>" .
							"<td>" . $row->cust_street_address . "</td>" .
                            "<td>" .
								'<a href="customer_update.php?id=' . $row->customer_id . '" class="mr-2" title="Update File" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>' .
								'<a href="customer_delete.php?id=' . $row->customer_id . '" class="mr-2" title="Delete File" data-toggle="tooltip"><span class="fa fa-trash"></span></a>'               .
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
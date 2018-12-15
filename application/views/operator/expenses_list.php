<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Expense List</h5>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr class="bg-blue">
						<th>S.No</th>
						<th>Amount</th>
						<th>Name</th>
						<th>Expense Date</th>
						<th>Description</th>
						<th>Entry Done At</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($expenses as $exp) {
						?>
						<tr>
							<td><?php echo $exp->ID; ?></td>
							<td><?php echo $exp->AMOUNT; ?></td>
							<td><?php echo $exp->OPNAME; ?></td>
							<td><?php echo $exp->DATE_E; ?></td>
							<td><?php echo $exp->DESCRIPTION; ?></td>
							<td><?php echo $exp->CREATED_AT; ?></td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
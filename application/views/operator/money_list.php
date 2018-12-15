<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Money List</h5>
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
						<th>Amount</th>
						<th>Entry By</th>
						<th>Adding Date</th>
						<th>Entry Done At</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($money as $cash) {
						?>
						<tr>
							<td><?php echo $cash->AMOUNT; ?></td>
							<td><?php echo $cash->OPERATOR_NAME; ?></td>
							<td><?php echo $cash->DATE_M; ?></td>
							<td><?php echo $cash->CREATED_AT; ?></td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
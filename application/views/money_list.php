<!-- Table header styling -->
<div class="content">
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Amount List</h5>
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
									<th>Operator Name</th>
									<th>Paid On</th>
									<th>Created At</th>
									<th>Actions</th>
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
									<td>
										
										<a type="button" href="#" class="btn btn-primary btn-icon">
											<i class="icon-pencil7"></i>
										</a>

		                    	<button type="button" class="btn alpha-primary text-primary-800 btn-icon ml-2"><i class="icon-bin"></i></button>
										
									</td>


								</tr>
								<?php 
										}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- /table header styling -->

			</div>
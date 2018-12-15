<!-- Table header styling -->
<div class="content">
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Expenses List</h5>
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
									<th>Paid On</th>
									<th>Description</th>
									<th>Created At</th>
									<th>Actions</th>
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
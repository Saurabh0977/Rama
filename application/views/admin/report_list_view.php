<!-- Table header styling -->
<div class="content">
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Generate Reports</h5>
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
									<th>Operator Name</th>
									<th>Time Duration</th>
									<th>Actions</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
 										foreach($user as $users)
 										{
								?>
								<form method="post" target="_blank" action="<?php echo base_url() ; ?>Users/create_report/<?php echo $users->ID; ?>">
								<tr>
									<td><?php echo $users->NAME; ?></td>
									<td>
										<input type="date" name="fdate">&nbsp;&nbsp;
										<input type="date" name="tdate">
									</td>
									
									<td>
										
										

									<button  name="preview" value="preview" type="submit" class="btn btn-primary"><i class="icon-cog3 mr-2"></i> Preview</button>

									<button  name="download" value="download" type="submit" class="btn btn-danger"><i class="icon-file-download2"></i> Download</button>
								</td>
								
								</tr>
							</form>
								<?php
							}
								?>
							
								
							</tbody>
						</table>
					</div>
				</div>


				<!-- /table header styling -->

			</div>
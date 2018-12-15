<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Users List</h5>
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
						<th>ID</th>
						<th>Name</th>
						<th>User Name</th>
						<th>Type</th>
						<th>Phone Number</th>
						<th>Created At</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($user as $users) {
						if($users->STATUS == 0) {	
							?>
							<tr style="background-color: #f44336 ;color:white;">
							<?php 
						} else {
							?>		
							<tr>
							<?php
						}
						?>
							<td><?php echo $users->ID; ?></td>
							<td><?php echo $users->NAME; ?></td>
							<td><?php echo $users->USERNAME; ?></td>
							<td><?php echo $users->USER_TYPE_NAME; ?></td>
							<td><?php echo $users->PHONE_NUMBER; ?></td>
							<td><?php echo $users->CREATED_AT; ?></td>
							<td>
								<a href="<?php echo base_url(); ?>Users/edit_user_form/<?php echo $users->ID; ?>" class="btn btn-primary btn-icon">
									<i class="icon-pencil7"></i>
								</a>
								<?php 
							if($users->STATUS == 1)
							{
								?>	
								<a href="<?php echo base_url(); ?>Users/delete_user/<?php echo $users->ID; ?>" class="btn alpha-primary text-primary btn-icon ml-2"><i class="icon-bin"></i></a>
							<?php 
							}
							else
							{
								?>
								<a href="<?php echo base_url(); ?>Users/activate_user/<?php echo $users->ID; ?>" class="btn alpha-primary text-primary btn-icon ml-2"><i class="icon-bin"></i></a>
							<?php		
							}
							?>	
						
						
						
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class = "content">
	<div class = "row">
		<div class= "col-md-8">
			<div class = "row">
				<div class = "col-md-5">
					<div class="card">
						<div class="card-header header-elements-inline">
							<h6 class="card-title">Current Circulation</h6>
							<div class="header-elements">
								<span class="font-weight-bold text-danger-600 ml-2">&#8377;&nbsp;<?php echo $circulation; ?></span>
							</div>
						</div>
					</div>
				</div>
			
				<div class="col-md-7">
					<div class = "card">
						<div class="card-header header-elements-inline">
							<h6 class="card-title">Unknown</h6>
						</div>
					</div>
				</div>
			</div>

			<a class="btn btn-primary" href="<?php echo base_url(); ?>Cron/send_mail" type="button">Send Reports to Mail</a>

			<div class = "row">
				<div class="col-md-8">
					<div class="card">
						<table class="table">
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h6 class="card-title">Operators</h6>
				</div>

				
				
				<div class="card-body">
					<table class="table">
						<tr>
							<th>NAME</th>
							<th class="text-right">BALANCE</th>
						</tr>
						<?php
						foreach($operators as $operator) {
							?>
							<tr>
								<td>
									<p><?php echo ucfirst($operator->NAME); ?></p>
								</td>
								<td class="text-right">
									<p><?php echo "&#8377; ". $operator->CURRENT_QTY; ?></p>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
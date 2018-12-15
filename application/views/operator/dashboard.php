<div class = "content">
	<div class = "row">
		<div class="col-md-3">

		<div class="card" style="background-color:#2196f3;color:white;">
			<div class="card-header">
				<h6 class="card-title">Current Balance</h6>
			</div>
			
			<div class="card-body">
				<h1>&#8377; <?php echo $current_balance; ?></h1>
			</div>
		</div>
		</div>
		</div>


		<div class = "row">
		<div class="col-md-3">
		<a href="<?php echo base_url() ; ?>Users/add_money_form_operator">
		<div class="card" style="background-color:#f44336;color:white;"> 
			<div class="card-header">
				<h5 class="card-body">Add Money / पैसा जमा करें </h5>
			</div>	
		</div>
		</a>
		</div>
		</div>


		<div class = "row">
		<div class="col-md-3" >
		<a href="<?php echo base_url(); ?>Users/add_expense_form_operator">
		<div class="card" style="background-color:#26a69a;color:white;">
			<div class="card-header">
				<h5 class="card-body">Add Expense / पैसा खर्च करे</h5>
			</div>		
		</div>
		</a>
	</div>
	</div>


</div>
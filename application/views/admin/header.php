<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="<?php echo base_url(); ?>" class="d-inline-block"><?php echo PROJECT_NAME; ?></a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<span><i class = "icon-add"></i>&nbsp;New</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo site_url(); ?>Users/add_money_form" class="dropdown-item"><i class="icon-cash3"></i> Add Money</a>
						<a href="<?php echo site_url(); ?>Users/add_expense_form" class="dropdown-item"><i class="icon-coins"></i> Add Expense</a>
						<a href="<?php echo site_url(); ?>Users/add_user_form" class="dropdown-item"><i class="icon-user-plus"></i> Add User</a>
						
					</div>
				</li>
			</ul>

			<span class="navbar-text ml-md-3 mr-md-auto">
			</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<span><i class="icon-user"></i>&nbsp;<?php echo ucfirst($this->session->userdata('uname')); ?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url();?>Users/logout" class="dropdown-item"><i class="icon-switch2"></i>&nbsp;Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
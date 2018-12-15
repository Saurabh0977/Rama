<!-- Content area -->
<div class="content">

<!-- Vertical form options -->
<div class="row">
    <div class="col-md-12">

<!-- Basic layout-->
                      
        <!-- Basic layout-->
        <form action="<?php echo base_url();?>Users/add_expense" method="post" enctype="multipart/form-data">
            <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Add Expense</h5>
                                <div class="header-elements">
                                   
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="<?php echo base_url();?>Master/create_master" method="post" enctype="multipart/form-data">

            
                            
                    <div class="form-group">
                        <label>Enter Amount ( Rs )</label>
                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount in Rs" required>
                    </div>

                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" name="edate" class="form-control">
                    </div>

                     <div class="form-group">
                        <label>Select Operator&nbsp; </label>
                        <select class ="form-control select" name = "usertype">
                            <?php
                            foreach($user as $users) {
                                ?>
                                <option value="<?php echo $users->ID; ?>"><?php echo $users->NAME; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                   <div class="form-group">
                    <label>Enter Description</label>
                    <div class="col-lg-12">
                        <textarea rows="5" cols="5" class="form-control" name="desc" placeholder="Enter Description Here"></textarea>
                    </div>
                </div>


             



                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Expense</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
    </div>
</div>
    
    
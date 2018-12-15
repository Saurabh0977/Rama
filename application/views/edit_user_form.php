<!-- Content area -->
<div class="content">

<!-- Vertical form options -->
<div class="row">
    <div class="col-md-12">

<!-- Basic layout-->
                      
        <!-- Basic layout-->
        <form action="<?php echo base_url();?>Users/update_user/<?php echo $user->ID ; ?>" method="post" enctype="multipart/form-data">
            <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Edit User</h5>
                                <span style = "color:#4caf50;"><?php echo $message; ?></span>
                                <div class="header-elements">
                                   
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="<?php echo base_url();?>Master/create_master" method="post" enctype="multipart/form-data">

            
                            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user->NAME ;?>" required>
                    </div>

                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="uname" class="form-control" value="<?php echo $user->USERNAME ;?>">
                    </div>

                      <div class="form-group">
                        <label>Select User Type&nbsp; </label>
                        <select class ="form-control select" name = "usertype">
                            <?php
                            foreach($users as $id =>$name) {
                                if($id == $user->TYPE)
                                {
                                 ?>   
                            <option value="<?php echo $id; ?>" selected><?php echo $name; ?></option>
                                <?php
                                }
                                else
                                {
                                ?>
                                <option value = "<?php echo $id; ?>"><?php echo $name; ?></option>
                                <?php
                            }
                        }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <label>Repeat Password</label>
                        <input type="password" name="rpass" class="form-control" placeholder="Repeat Password">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" value="<?php echo $user->PHONE_NUMBER ;?>" required>
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
    </div>
</div>
    
    
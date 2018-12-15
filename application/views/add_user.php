<!-- Content area -->
<div class="content">

<!-- Vertical form options -->
<div class="row">
    <div class="col-md-12">

<!-- Basic layout-->
                      
        <!-- Basic layout-->
        <form action="<?php echo base_url();?>Users/create_user" method="post" enctype="multipart/form-data">
            <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Add User</h5>
                                <span style = "color:#4caf50;"><?php echo $message; ?></span>
                                <div class="header-elements">
                                   
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="<?php echo base_url();?>Master/create_master" method="post" enctype="multipart/form-data">

            
                            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        
                    </div>

                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="uname" class="form-control" onfocusout="checkUsername(this.value);"  id="myInput" placeholder="Enter Username" required>
                        <span id="username_result"></span>
                    </div>

                      <div class="form-group">
                        <label>Select User Type&nbsp; </label>
                        <select class ="form-control select" name = "usertype">
                            <?php
                            foreach($users as $id =>$name) {
                                ?>
                                <option value = "<?php echo $id; ?>"><?php echo $name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group">
                        <label>Repeat Password</label>
                        <input type="password" name="rpass" class="form-control" placeholder="Repeat Password" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control" id="myNumber" onfocusout="checkPhonenumber(this.value)" placeholder="Enter Phone Number" required>
                        <span id="phone_number_result"></span>    
                    </div>

                  

             



                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="submitadduser">Add User</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /basic layout -->

    </div>
    </div>
</div>
    
<script>

 function checkUsername(val) {
            
                if(val.length > 2) {
                      $.ajax({
                        url: '<?php echo site_url(); ?>Users/search_username',
                        data: 'val=' + val,
                        type: 'post',
                        success: function(response) {
                            if(response == 1) {
                                $("#username_result").html("<a style='color:red'><strong>Username Not Available</strong></a>");
                                $("#submitadduser").addClass("disabled");
                            } else {
                                $("#username_result").html("<a style='color:green'><strong>Username Available</strong></a>");
                                $("#submitadduser").removeClass("disabled");
                            }
                          
                        
                  }
                });
                    } 
                  }



function checkPhonenumber(number) {
            
            if(number.length > 1) {
                  $.ajax({
                    url: '<?php echo site_url(); ?>Users/search_phone_number',
                    data: 'number=' + number,
                    type: 'post',
                    success: function(response) {
                        
                        if(response == 1) {
                            $("#phone_number_result").html("<a style='color:red'><strong>Phone Number Not Available</strong></a>");
                            $("#submitadduser").addClass("disabled");
                        } else {
                            $("#phone_number_result").html("<a style='color:green'><strong>Phone Number Available</strong></a>");
                            $("#submitadduser").removeClass("disabled");
                        }
                      
                    
              }
            });
                } 
              }

</script>
    
    
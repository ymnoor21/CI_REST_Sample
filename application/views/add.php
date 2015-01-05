	    <div class="container">
	      	<div class="panel panel-default" style="margin-top: 20px;">
	      		<div class="panel-heading">
                    Add User
                </div>

                <section style="padding: 20px;">
		      		<form name="update_user" method="POST" action="<?php echo $this->_apitesterBaseURL; ?>insert">
                        <?php
                        if(isset($message) && $message != "" && $error == true) {
                        ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><span class="glyphicon glyphicon-thumbs-down"></span> <?php echo $message; ?></strong>
                            </div>
                        <?php
                        } elseif (isset($message) && $message != "" && $error == false) {
                        ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $message; ?></strong>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required="required" value="<?php if(isset($user)) echo $user[0]->first_name; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required="required" value="<?php if(isset($user)) echo $user[0]->last_name; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" value="" required="required">
                        </div>
                        <div class="form-group">
                            <label for="confirm_pass">Confirm Password</label>
                            <input type="password" name="confirm_pass" class="form-control" id="confirm_pass" placeholder="Confirm Password" value="" required="required">
                        </div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" value="<?php if(isset($user)) echo $user[0]->email; ?>" >
						</div>	
                        <div class="form-group">
                            <label for="type">User Type</label>
                            <select class="form-control" name="type" id="type" required="required">
                                <option value="" selected>Select Below</option>
                                <?php 
                                    if($user_types) {
                                        foreach($user_types as $utype) {
                                            $selected = "";

                                            if($utype == $user[0]->type) {
                                                $selected = "selected";
                                            }

                                            echo "<option value='" . $utype . "' $selected>" . $utype . "</option>";
                                        }
                                    }
                                ?>
                            </select>

                            
                        </div>		
						<button type="submit" class="btn btn-primary" name="submit" value="save">
                            <span class="glyphicon glyphicon-save"></span> Save
                        </button>
                        <a href="<?php echo $this->_apitesterBaseURL; ?>" class="btn btn-default" role="button">
                            <span class="glyphicon glyphicon-step-backward"></span> Go Back
                        </a>
					</form>
				</section>
	      	</div>
	    </div>
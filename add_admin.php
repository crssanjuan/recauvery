<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
    <br>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
             <div class="alert alert-info">Add User/Admin</div>
			<p><a href="admin_user.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>		
	<form class="form-horizontal" method="POST" action="user_save.php" enctype="multipart/form-data">
		<div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
					<input type="text" id="inputEmail" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Firstname</label>
				<div class="controls">
					<input type="text" name="firstname" id="inputEmail" placeholder="Firstname" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Lastname</label>
				<div class="controls">
					<input type="text" name="lastname" id="inputEmail" placeholder="Lastname" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
					<input type="password" name="password" id="inputPassword" placeholder="Password" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputRole">Role</label>
				<div class="controls">
					<select name="role">
						<option selected value="Select User Type" disabled select>Select User Type</option>
						<option value="Admin" selected>Admin</option>
					</select>
		    	</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
				</div>
			</div>
    	</form>
		</div>
    </div>
					
			</div>		
			</div>		
			</div>
		</div>
    </div>
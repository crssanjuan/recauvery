<div id="edit<?php echo $user_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-body">
		<div class="alert alert-info"><strong>Edit User</strong></div>
		<form class="form-horizontal" method="post">
			<div class="control-group">
				<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" required>
				<label class="control-label" for="inputEmail">First Name</label>
				<div class="controls">
					<input type="text"name="firstname" value="<?php echo $row['firstname']; ?>"required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Lastname</label>
				<div class="controls">
					<input type="text"name="lastname" value="<?php echo $row['lastname']; ?>"required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
					<input type="text"name="email" value="<?php echo $row['email']; ?>"required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
					<input type="password" name="password" id="inputPassword" value="<?php echo $row['password']; ?>"required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputRole">Role</label>
				<div class="controls">
					<select name="role">
						<option selected value="<?php echo $row['role'];?>"><?php echo $row['role'];?></option>
						<option value="Student">Student</option>
						<option value="Admin">Admin</option>
					</select>
		    	</div>
		    	<br>
			<div class="control-group">
				<div class="controls">
					<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
				</div>
			</div>
    	</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	<?php
	if (isset($_POST['edit'])){
	$user_id=$_POST['user_id'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$role=$_POST['role'];
	
	mysqli_query($conn,"update users set firstname='$firstname',lastname='$lastname',email='$email', password='$password' , role = '$role' where user_id='$user_id'")or die(mysqli_error()); ?>
	<script>
	window.location="admin_user.php";
	</script>
	<?php
	}
	?>
<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
    <br>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		
             <div class="alert alert-info">Add Member</div>
			<p><a href="member.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>		
	<form class="form-horizontal" method="POST" action="member_save.php" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Firstname:</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="firstname"  placeholder="Firstname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Lastname:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="lastname"  placeholder="Lastname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Id No.:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="id_no" placeholder="Id No." required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Course:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="course"  placeholder="Course" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Year:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="year"  placeholder="Year" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Section:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="sec"  placeholder="Section" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Cellphone Number:</label>
			<div class="controls">
			<input type='tel' pattern="[0-9]{11,11}" class="search" name="contact"  placeholder="Phone Number"  autocomplete="off"  maxlength="11" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Email:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="email"  placeholder="Email Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Type:</label>
			<div class="controls">
			<select name="type" required>
				
				<option>Student</option>
				<option>Faculty</option>
				
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Status:</label>
			<div class="controls">
				<select name="status" required>
					<option>Active</option>
					<option>Banned</option>
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

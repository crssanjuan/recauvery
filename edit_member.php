<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
<?php $get_id = $_GET['user_id']; ?>
    <br>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
		<?php 
		$query=mysqli_query($conn,"select * from users where user_id='$get_id'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		$status=$row['status'];
        $type=$row['type'];
		
		?>
             <div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Edit Member</div>
			<p><a class="btn btn-info" href="member.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>	
	<form class="form-horizontal" method="POST" action="edit_member.php?user_id=<?php echo $get_id ?>" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Firstname:</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="Firstname" required>
			<input type="hidden" id="inputEmail" name="user_id" value="<?php echo $get_id;  ?>" placeholder="Firstname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Lastname:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Lastname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Id No.:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="id_no" value="<?php echo $row['id_no']; ?>" placeholder="XXXX-XXXXX-XX-X" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Course:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="course" value="<?php echo $row['course']; ?>" placeholder="Course" required>
			</div>
		</div>	
		<div class="control-group">
			<label class="control-label" for="inputPassword">Year:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="year" value="<?php echo $row['year']; ?>" placeholder="Ex: Third Year" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Section:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="sec" value="<?php echo $row['sec']; ?>" placeholder="Section" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Contact:</label>
			<div class="controls">
			<input type='tel' pattern="[0-9]{11,11}" class="search" name="contact"  value="<?php echo $row['contact']; ?>" placeholder="Phone Number"  autocomplete="off"  maxlength="11" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Email:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="email" value="<?php echo $row['email']; ?>" placeholder="Email Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Type:</label>
			<div class="controls">
			<select name = "type" tabindex="1" data-placeholder="Select Type">
                <option value="<?php echo $type?>"><?php echo $type?></option>
                <option value="Student">Student</option>
            </select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Status:</label>
			<div class="controls">
			<select name = "status" tabindex="1" data-placeholder="Select Type">
                <option value="<?php echo $status?>"><?php echo $status?></option>
                <option value="Active">Active</option>
                
            </select>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
			</div>
		</div>
    </form>				
			</div>		
			</div>		
			</div>
		</div>
    </div>
    <?php 
if (isset($_POST['submit']))
{
$user_id=$_GET['user_id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$id_no=$_POST['id_no'];
$course=$_POST['course'];
$year=$_POST['year'];
$sec=$_POST['sec'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$type=$_POST['type'];
$status=$_POST['status'];


$query="update users set firstname='$firstname',lastname='$lastname',id_no='$id_no',course='$course',year = '$year',sec='$sec',contact = '$contact',email='$email',type = '$type',status = '$status' where user_id='$user_id'";

if($conn->query($query) === TRUE){
echo "<script type='text/javascript'>alert('Profile Updated Successfully!')</script>";
echo "<script type='text/javascript'>window.location = 'member.php'</script>";

}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
  }
  }                              
?>               

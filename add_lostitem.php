
<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('header_user.php'); 


if (isset($_GET['lostitem_title'])) {
    	$lostitem_title = $_GET['lostitem_title'];
    }else $lostitem_title = '';

if (isset($_GET['founder'])) {
    	$founder = $_GET['founder'];
    }else $founder = '';

if (isset($_GET['yearlevel'])) {
    	$lostitem_title = $_GET['yearlevel'];
    }else $yearlevel = '';

if (isset($_GET['strand'])) {
    	$lostitem_title = $_GET['strand'];
    }else $strand = '';

if (isset($_GET['description'])) {
    	$description = $_GET['description'];
    }else $description = '';

if (isset($_GET['datefound'])) {
    	$datefound = $_GET['datefound'];
    }else $datefound = '';

if (isset($_GET['upload_lost'])) {
    	$upload_lost = $_GET['upload_lost'];
    }else $upload_lost = '';

?>
    <br>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
             <div class="alert alert-info">Add Lost Item</div>
			<p><a href="lostitems.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>		
	<form class="form-horizontal" method="POST" action="php/add-lostitem.php" enctype="multipart/form-data">
			
	<?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert" style="text-align:center;">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		<?php } ?>
		<?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert" style="text-align:center;">
			  <?=htmlspecialchars($_GET['success']); ?>
		  </div>
		<?php } ?>
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Title of the Lost Item</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="lostitem_title" value="<?=$lostitem_title?>" placeholder="Lost Item Title" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail">Date Found (MM/DD/YYYY):</label>
			<div class="controls">
			<input type="datetime-local" class="span4" id="inputEmail" name="datefound"   value="<?=$datefound?>" placeholder="Date Found" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputEmail">Lost Item Description:</label>
			<div class="controls">
			<textarea class="span4" rows="5" id="textareaDescription" name="textareaDescription" placeholder="Lost Item Description"><?=$description?></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Found by:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPassword" name="founder"  value="<?=$founder?>"  placeholder="Found by:" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Year Level: </label>
			<div class="controls">
			<select name="yearlevel">
				<option value="select" disabled selected>Select Year</option>
				<option value="Elementary">Elementary</option>
				<option value="Grade 7 - JHS">Grade 7 - JHS</option>
				<option value="Grade 8 - JHS">Grade 8 - JHS</option>
				<option value="Grade 9 - JHS">Grade 9 - JHS</option>
				<option value="Grade 10 - JHS">Grade 10 - JHS</option>
				<option value="Grade 11 - JHS">Grade 11 - JHS</option>
				<option value="Grade 12 - JHS">Grade 12 - JHS</option>
				<option value="College - 1st year">College - 1st year</option>
				<option value="College - 2nd year">College - 2nd year</option>
				<option value="College - 3rd year">College - 3rd year</option>
				<option value="College - 4th year">College - 4th year</option>
			</select>	
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Course/Strand: </label>
			<div class="controls">
			<select name="strand">
				<option value="select" disabled selected>Select Strand</option>
				<option value="Elementary">Elementary</option>
				<option value="JHS">JHS</option>
				<option value="ABM- SHS">ABM - SHS</option>
				<option value="ICT- SHS">ICT - SHS</option>
				<option value="STEM"- SHS>STEM - SHS</option>
				<option value="HUMSS- SHS">HUMSS - SHS</option>
				<option value="BSIT- COLLEGE">BSIT - COLLEGE</option>
				<option value="BSAIS- COLLEGE">BSAIS - COLLEGE</option>
				<option value="BSHM- COLLEGE">BSHM - COLLEGE</option>
				<option value="BSTM- COLLEGE">BSTM - COLLEGE</option>
				<option value="BSCRIM - COLLEGE">BSCRIM - COLLEGE</option>
				<option value="SCHOOL OF EDUCATION - COLLEGE">SCHOOL OF EDUCATION - COLLEGE</option>
				<option value="COLLEGE OF ARTS AND SCIENCES - COLLEGE">COLLEGE OF ARTS AND SCIENCES - COLLEGE</option>
			</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Note:</label>
			<div class="controls">
			 Please proceed to the OSA once you are done posting the item. Kindly turnover the lost item to the present OSA admin.
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Upload lost image:</label>
			<div class="controls">
			<input type="file" id="inputPassword" name="upload_lost"  placeholder="" >
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

<?php 
include('header_admin.php'); 
include('session.php'); 
include('new_navbar.php'); 

if (isset($_SESSION['firstname']) && isset($_SESSION['id'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        include "db_conn.php";
        include "php/func-lostitems.php";
        $lostitems = get_lostitems($conn, $id);

        if ($lostitems === null) {
            echo "No lost item found for ID: " . htmlspecialchars($id);
            exit;
        }
    } else {
        header("Location: lostitems_admin.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>

<br>
<div class="container">
    <div class="margin-top">
        <div class="row">	
            <div class="span12">
                <div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Edit Lost Item</div>
                <p><a class="btn btn-info" href="lostitems_admin.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
                <div class="addstudent">
                    <div class="details">Please Enter Details Below</div>	
                    <form class="form-horizontal" method="POST" action="php/edit-lostitem.php" enctype="multipart/form-data">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?=htmlspecialchars($_GET['error']); ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?=htmlspecialchars($_GET['success']); ?>
                            </div>
                        <?php } ?>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Lost Item Title:</label>
                            <div class="controls">
                                <input type="text" class="span4" id="inputEmail" name="lostitem_title" value="<?= htmlspecialchars($lostitems['lostitem_title']) ?>" placeholder="Lost Item Title" required>
                                <input type="hidden" name="lostitem_id" value="<?= htmlspecialchars($lostitems['lostitem_id']) ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Found by:</label>
                            <div class="controls">
                                <input type="text" class="span4" name="founder" value="<?= htmlspecialchars($lostitems['founder']) ?>" placeholder="Founder" required>
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
                            <label class="control-label" for="inputEmail">Description:</label>
                            <div class="controls">
                                <input type="text" class="span4" name="description" value="<?= htmlspecialchars($lostitems['description']) ?>" placeholder="Description">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Date Found:</label>
                            <div class="controls">
                                <input type="datetime-local" class="span4" name="datefound" value="<?= htmlspecialchars($lostitems['datefound']) ?>" placeholder="Date Found">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Lost Item Picture:</label>
                            <div class="controls">
                                <input type="file" name="upload_lost">
                                <input type="hidden" name="current_upload_lost" value="<?= htmlspecialchars($lostitems['upload_lost']) ?>">
                                <a href="uploads/lostpic/<?= htmlspecialchars($lostitems['upload_lost']) ?>" class="link-dark">Current Cover</a>
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
</body>
</html>

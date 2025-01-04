<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>

<br>
<div class="container">
    <div class="margin-top">
        <div class="row">    
            <div class="span12">    
                <div class="alert alert-info">
                    <strong><i class="icon-book icon-large"></i>&nbsp;Lost Items Table</strong>
                </div>
                <center class="title">
                    <h1>Lost Items List</h1>
                </center>
                <p><a href="add_lostitem_admin.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Lost Item</a></p>
                                <thead>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">

                    <div class="pull-right">
                        <a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
                    </div>
         
                    <thead>
                        <tr>
                            <th>Lost Items No.</th>                                 
                            <th>Lost Items Title</th>
                            <th>Found By</th>
                            <th>Year Level</th> 
                            <th>Strand</th>                                   
                            <th>Date Found</th>
                            <th>Description</th>
                            <th>Lost Item Picture</th>
                            <th>Proof of Receiving</th>
                            <th>Status</th>
                            <th>Item Accepted By</th> <!-- New Column -->
                            <th class="action">Actions</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $user_query = mysqli_query($conn, "SELECT * FROM lostitems WHERE status != 'claimed'") or die(mysqli_error($conn));

                        while($row = mysqli_fetch_array($user_query)){
                            $id = $row['lostitem_id']; 
                            $accepted_query = mysqli_query($conn, "SELECT admin_name, upload_proof FROM accepted_items WHERE lostitem_id = '$id'");
                            $accepted_row = mysqli_fetch_assoc($accepted_query);
                            $accepted_by = $accepted_row ? $accepted_row['admin_name'] : 'Not Accepted'; // Check if accepted
                            $upload_proof = $accepted_row ? $accepted_row['upload_proof'] : ''; // Get upload_proof if exists

                            ?>
                            <tr class="del<?php echo $id ?>">
                                <td><?php echo $row['lostitem_id']; ?></td>
                                <td><?php echo $row['lostitem_title']; ?></td>
                                <td><?php echo $row['founder']; ?></td>
                                <td><?php echo $row['yearlevel']; ?></td>
                                <td><?php echo $row['strand']; ?></td>
                                <td><?php echo $row['datefound']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <a href="uploads/lostpic/<?php echo $row['upload_lost']; ?>">
                                        <img class="" src="uploads/lostpic/<?php echo $row['upload_lost']; ?>" alt="" style="width: 120px;">
                                    </a>
                                </td>
                                <td>
                                    <?php if (!empty($upload_proof)): ?>
                                        <a href="uploads/proofs/<?php echo $upload_proof; ?>">
                                            <img src="uploads/proofs/<?php echo $upload_proof; ?>" alt="Proof of Receiving" style="width: 120px;">
                                        </a>
                                    <?php else: ?>
                                        No proof of receiving
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td><?php echo htmlspecialchars($accepted_by); ?></td> <!-- Display Accepted By -->

                                <?php include('toolttip_edit_delete.php'); ?>
                                <td class="action">
                                    <a rel="tooltip" title="Delete" id="<?php echo $id; ?>" href="#delete_lostitem<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                    <?php include('delete_lostitem_modal.php'); ?>
                                    <a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="edit-lostitem.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    <a rel="tooltip" title="Claim" id="c<?php echo $id; ?>" data-toggle="modal" data-target="#claimModal<?php echo $id; ?>" class="btn btn-info"><i class="icon-check icon-large"></i></a>
                                    <a rel="tooltip" title="Accept" id="a<?php echo $id; ?>" data-toggle="modal" data-target="#acceptModal<?php echo $id; ?>" class="btn btn-primary">
                                        <i class="fas fa-check-circle"></i> Accept
                                    </a>
                                </td>
                            </tr>
                            
                            <!-- Claim Modal -->
                       <div id="claimModal<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info"><strong>Claim Lost Item</strong></div>
        <form class="form-horizontal" method="post" action="claim-handler.php" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
            <div class="control-group">
                <input type="hidden" name="lostitem_id" value="<?php echo $id; ?>" required>
                <label class="control-label" for="claimerName">Claimed by: </label>
                <div class="controls">
                    <input type="text" name="claimerName" required>
                </div>
            </div>
            <div class="control-group">
			<label class="control-label" for="claim_yearlevel">Year Level: </label>
			<div class="controls">
			<select name="claim_yearlevel">
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
			<label class="control-label" for="claim_strand">Course/Strand: </label>
			<div class="controls">
			<select name="claim_strand">
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
                <label class="control-label" for="claimDate">Claim Date</label>
                <div class="controls">
                    <input type="datetime-local" name="claimDate" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="adminApproval">Released By</label>
                <div class="controls">
                    <select name="adminApproval" required>
                        <option value="">Select Admin</option>
                        <?php
                        // Fetch admin names from users table
                        $admin_query = mysqli_query($conn, "SELECT user_id, firstname, lastname FROM users WHERE role = 'admin'");
                        while ($admin_row = mysqli_fetch_assoc($admin_query)) {
                            $full_name = htmlspecialchars($admin_row['firstname'] . ' ' . $admin_row['lastname']);
                            echo "<option value=\"" . $admin_row['user_id'] . "\">" . $full_name . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Add image upload field -->
            <div class="control-group">
                <label class="control-label" for="proof_claim">Upload Proof of Turnover</label>
                <div class="controls">
                    <input type="file" name="proof_claim" accept="image/*" required> <!-- File upload input -->
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="claim" type="submit" class="btn btn-success"><i class="icon-check icon-large"></i>&nbsp;Claim</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>


                            <!-- Accept Modal -->
                           <div id="acceptModal<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info"><strong>Accept Lost Item</strong></div>
        <form class="form-horizontal" method="post" action="accept-handler.php" enctype="multipart/form-data">
            <div class="control-group">
                <input type="hidden" name="lostitem_id" value="<?php echo $id; ?>" required>
                <label class="control-label" for="adminName">Admin Name</label>
                <div class="controls">
                    <select name="adminName" required>
                        <?php
                        $admin_query = mysqli_query($conn, "SELECT CONCAT(firstname, ' ', lastname) AS full_name FROM users WHERE role = 'admin'");
                        while ($admin_row = mysqli_fetch_assoc($admin_query)) {
                            echo "<option value='".htmlspecialchars($admin_row['full_name'])."'>".htmlspecialchars($admin_row['full_name'])."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Add image upload field -->
            <div class="control-group">
                <label class="control-label" for="upload_image">Upload Proof you received the Item</label>
                <div class="controls">
                    <input type="file" name="upload_image" accept="image/*" required>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button name="accept" type="submit" class="btn btn-success"><i class="icon-check-circle icon-large"></i>&nbsp;Accept</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>


                        <?php } ?>
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
</div>

<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
    <br>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Profile Table</strong>
                                </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                            	
                             
								<p><a href="add_member.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Profile</a></p>
                                <thead>
                                    <tr>
                       					
                                        <th>Name</th>
                                        <th><center>School ID Picture</center></th> 
                                        <th>Id No.</th>                                
                                        <th>Course</th>
										<th>Year</th>
										<th>Section</th>
										<th>Contact</th>
										<th><center>Email</center></th>
										<th>Type</th>
										<th>Status</th>
										
										<th><center>Actions</center></th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php  $user_query=mysqli_query($conn,"select * from users where role ='Student'")or die(mysqli_error());
									while($row=mysqli_fetch_array($user_query)){
									$user_id=$row['user_id'];  ?>
									<tr class="del<?php echo $user_id ?>">
									
									                              
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                    <td><a href="uploads/school_id/<?php echo $row['school_id']; ?>"><img class="" src="uploads/school_id/<?php echo $row['school_id']; ?>"  alt="" style="width: 120px;"></a></td> 
                                    <td style="width:120px;"><?php echo $row['id_no']; ?> </td>
                                    <td><?php echo $row['course']; ?> </td> 
                                    <td style="width:80px;"><?php echo $row['year']; ?> </td>
                                    <td><?php echo $row['sec']; ?></td>
									<td><?php echo $row['contact']; ?></td> 
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['type']; ?></td>  
									<td><?php echo $row['status']; ?></td> 
									<?php include('toolttip_edit_delete.php'); ?>
									
                                    <td width="90">
                                    	<a  rel="tooltip"  title="Edit" id="e<?php echo $user_id; ?>" href="edit_member.php<?php echo '?user_id='.$user_id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a></center>
                                        <a rel="tooltip"  title="Delete" id="<?php echo $user_id; ?>" href="#delete_student<?php echo $user_id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('delete_student_modal.php'); ?>
										
									</td>
									

                                    </tr>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>

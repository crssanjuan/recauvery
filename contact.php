<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
    <br>
<div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">	
			   		<div class="alert alert-info">
                        <strong><i class="icon-book icon-large"></i>&nbsp;Messages Table</strong>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>                                 
                                        <th>Name</th>                                 
                                        <th>Email</th>                                 
                                        <th>Message</th>
                                        <th>Action</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                        <?php  $user_query=mysqli_query($conn,"select * from contact")or die(mysqli_error());
						while($row=mysqli_fetch_array($user_query)){
						$id=$row['id'];  ?>
						<tr class="del<?php echo $id ?>">
                        	<td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
							<td><?php echo $row ['email']; ?> </td>
                            <td><?php echo $row['message']; ?> </td> 
							<?php include('toolttip_edit_delete.php'); ?>
                            <td class="action">
                                <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" href="#delete_contact<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                <?php include('delete_contact_modal.php'); ?>
								 
                            </td>	
                        </tr>
						<?php  }  ?>
                    	</tbody>
               		</table>
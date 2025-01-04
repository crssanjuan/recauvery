<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
<br>
<div class="container">
	<div class="margin-top">
		<div class="row">
			<div class="span12">
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example" style="margin-top: 15px;">
                    <div class="alert alert-info">
                        <i class="icon-user icon-large"></i><strong>&nbsp;Users Table</strong>
                    </div>
                    <p><a href="add_admin.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Admin</a></p>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>                                
                            <th>Role</th>                                   
                            <th><center>Actions</center></th>                                 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $user_query=mysqli_query($conn,"select * from users")or die(mysqli_error());
                        while($row=mysqli_fetch_array($user_query)){
                        $user_id=$row['user_id']; ?>
						<tr class="del<?php echo $user_id ?>">
                        <td width="250px"><?php echo $row['email']; ?></td>
                        <td><?php echo $row['firstname']?></td>
                        <td><?php echo $row['lastname']?></td>   
                        <td><?php echo $row['role']; ?></td>
                       
                        <td width="200">
                            <center><a rel="tooltip"  title="Edit" id="e<?php echo $user_id; ?>" href="#edit<?php echo $user_id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                            <a rel="tooltip"  title="Delete" id="<?php echo $user_id; ?>"  href="#delete_user<?php echo $user_id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a></center>
                            <?php include('delete_user_modal.php'); ?>
                            <?php include('modal_edit_user.php'); ?>
						</td>
						<?php include('toolttip_edit_delete.php'); ?>
								<!-- Modal edit user -->
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
<script type="text/javascript">
/*         $(document).ready( function() {
            $('.btn-danger').click( function() {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this Data?")){
                    $.ajax({
                        type: "POST",
                        url: "delete_user.php",
                        data: ({id: id}),
                        cache: false,
                        success: function(html){
                        $(".del"+id).fadeOut('slow'); 
                        } 
                    }); 
                }else{
                    return false;}
            });				
        }); */
</script>
			</div>		
		</div>
	</div>
</div>
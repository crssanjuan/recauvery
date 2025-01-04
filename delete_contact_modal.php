	<div id="delete_contact<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-danger">Are you Sure you want to Delete this Data?</div>

		</div>
		<div class="modal-footer">
			<a class="btn btn-danger" style="margin-top: 10px;" href="delete_contact.php<?php echo '?id='.$id; ?>"><i class="icon-check"></i>Yes</a>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	

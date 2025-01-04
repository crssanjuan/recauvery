	<div id="delete_lostitem<?php echo $id; ?>"	 class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-danger">Are you Sure you want to Delete this Data?</div>

		</div>
		<div class="modal-footer">
			<form action="delete_lostitem_admin.php" method="get">
			<input type="hidden" name="lostitem_id" value="<?php echo $id; ?>">
			<button type="submit" class="btn btn-danger">
			 <i class="icon-check"></i> Yes</button></form>
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center><h4 class="modal-title" id="myModalLabel">Edit Data</h4></center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="edit.php">
						<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Name:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" readonly>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Email:</label>
							</div>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"  readonly>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Status:</label>
							</div>
							<div class="col-sm-10">
							<select  name="status" value="<?= $status; ?>" class="form-control" required>
				              <option value="" hidden>--Select--</option>
				              <option value="Enabled"
				              <?php
				                  if($row["status"] == 'Enabled')
				                    {
				                      echo"selected";
				                    }
				              ?>>Enabled</option>
				              <option value="Disabled"
				              <?php
				                  if($row["status"] == 'Disabled')
				                    {
				                      echo"selected";
				                    }
				              ?>>Disabled</option>
				            </select>
							</div>
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					<button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
					</form>
				</div>

			</div>
		</div>
	</div>

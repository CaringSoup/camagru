<!-- The Modal -->
<div class="modal" id="updateMyModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update profile information</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h5>Please enter the fields that you wish to update</h5>

			<form action="modal/updatelogin.php" method="POST">
				<table>
					<tr>
						<td>Username	:</td>
						<td><input type="text" name="username" id="newusername" placeholder="Create username"></td>
					</tr>
					<tr>
						<td>Password	:</td>
						<td><input type="password" name="password" id="newpassword" placeholder="Enter new password"></td>
					</tr>
                    <tr>
						<td>Confirm password	:</td>
						<td><input type="password" name="confirm" id="newconfirm" placeholder="Confirm password"></td>
					</tr>
                    <tr>
						<td>Email	:</td>
						<td><input type="email" name="email" id="newemail" placeholder="newemail@gmail.com"></td>
					</tr>
				</table>
			</form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" id ="updateMyModal" onclick='updateModalnew()'>Update</button>
				<button type="button" class="btn btn-success" id ="closeModal" onclick='updateModal()'>Cancel</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login/sign up form</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h5>Already a memeber?</h5>

			<form action="modal/login.php" method="POST">
				<table>
					<tr>
						<td>Enter username	:</td>
						<td><input type="text" name="username" id="username" placeholder="username"></td>
					</tr>
					<tr>
						<td>Enter password	:</td>
						<td><input type="password" name="password" id="password" placeholder="password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Login"></td>
					</tr>
				</table>
			</form>
			<h5>Not yet a member ? <a href="#" onclick="mySignup()">Sign up</a></h5>
			<div id="signup" style="display: none;">
				<form action="modal/signup.php" method="POST">
				<table>
					<tr>
						<td>Create username	:</td>
						<td><input type="text" name="username" id="signupusername" placeholder="Username007"></td>
					</tr>
					<tr>
						<td>Enter email	:</td>
						<td><input type="email" name="email" id="email" placeholder="email@gmail.com"></td>
					</tr>
					<tr>
						<td>Create password	:</td>
						<td><input type="password" name="password" id="signuppassword" placeholder="Password"></td>
					</tr>
					<tr>
						<td>Confirm password	:</td>
						<td><input type="password" name="confirm" id="signupconfirm" placeholder="Confirm password"></td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Sign up">
					    </td>
					</tr>
				</table>
				</form>
			</div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" id ="closeModal" onclick='loginModal()'>Close</button>
      </div>

    </div>
  </div>
</div>
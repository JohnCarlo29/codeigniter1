<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<?php $this->load->view('layout/banner'); ?>
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					Users
				</div>
				<div class="card-body">
					<form method="post" action="add_user" id="addUserForm">
						<div class="form-group">
							<label>Surname</label>
							<input type="text" class="form-control" name="sname" placeholder="Surname">
						</div>
						<div class="form-row">
							<div class="form-group col-md-8">
								<label>Firstname</label>
								<input type="text" class="form-control" name="fname" placeholder="Firstname">
							</div>
							<div class="form-group col-md-4">
								<label>Middle Initial</label>
								<input type="text" class="form-control" name="mi" placeholder="M.I">
							</div>
						</div>
						<div class="form-group">
							<label>User Level</label>
							<select class="form-control" name="ulevel">
								<option value="">Choose Level</option>
								<option value="1">Admin</option>
								<option value="0">Officer</option>
							</select>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="uname" placeholder="Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="pword" placeholder="Password">
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary form-control">Submit</button>
							</div>
							<div class="col-md-6">
								<button type="reset" class="btn btn-danger form-control">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<table id="usersTable" class="table table-sm table-striped table-bordered" style="width:100%">
	            <thead>
	                <tr>
	                    <th>Id</th>
	                    <th>Surname</th>
	                    <th>Firstname</th>
	                    <th>M.I</th>
	                    <th>User Level</th>
	                    <th>Username</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	            <tfoot>
	                <tr>
	                    <th>Id</th>
	                    <th>Surname</th>
	                    <th>Firstname</th>
	                    <th>M.I</th>
	                    <th>User Level</th>
	                    <th>Username</th>
	                    <th>Action</th>
	                </tr>
	            </tfoot>
	        </table>
		</div>
	</div>
</div>

<div class="modal" id="usersModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="change_pass" id="changePassForm">
				<input type="hidden" name="id">
				<div class="modal-body">
					<div class="form-group">
							<label>New Password</label>
							<input type="password" class="form-control" name="newpword" placeholder="New Password">
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-row">
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary form-control">Submit</button>
						</div>
						<div class="col-md-6">
							<button type="reset" class="btn btn-danger form-control">Reset</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
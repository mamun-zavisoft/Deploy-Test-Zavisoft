@if(Route::is(['users']))
<!-- Add User -->
	<div class="modal fade" id="add-units">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Add User</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form action="users">
									<div class="row">
										<div class="col-lg-12">
											<div class="new-employee-field">
												<span>Avatar</span>
												<div class="profile-pic-upload mb-2">
													<div class="profile-pic">
														<span><i data-feather="plus-circle" class="plus-down-add"></i> Profile Photo</span>
													</div>
													<div class="input-blocks mb-0">
														<div class="image-upload mb-0">
															<input type="file">
															<div class="image-uploads">
																<h4>Change Image</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>User Name</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Phone</label>
												<input type="text" class="form-control">
											</div>
										</div>
										
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Email</label>
												<input type="email" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Role</label>
												<select class="select">
													<option>Choose</option>
													<option>Manager</option>
													<option>Admin</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Password</label>
												<div class="pass-group">
													<input type="password" class="pass-input">
													<span class="fas toggle-password fa-eye-slash"></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Confirm Passworrd</label>
												<div class="pass-group">
													<input type="password" class="pass-input">
													<span class="fas toggle-password fa-eye-slash"></span>
												</div>
											</div>
										</div>
										
										<div class="col-lg-12">
											<div class="mb-0 input-blocks">
												<label class="form-label">Descriptions</label>
												<textarea class="form-control mb-1">Type Message</textarea>
												<p>Maximum 600 Characters</p>
											</div>	
										</div>
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<!-- /Add User -->

		<!-- Edit User -->
		<div class="modal fade" id="edit-units">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Edit User</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form action="users">
									<div class="row">
										<div class="col-lg-12">
											<div class="new-employee-field">
												<span>Avatar</span>
												<div class="profile-pic-upload edit-pic">
													<div class="profile-pic">
														<span><img src="{{ URL::asset('/build/img/users/edit-user.jpg')}}" class="user-editer" alt="User"></span>
														<div class="close-img">
															<i data-feather="x" class="info-img"></i>
														</div>
													</div>
													<div class="input-blocks mb-0">
														<div class="image-upload mb-0">
															<input type="file">
															<div class="image-uploads">
																<h4>Change Image</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>User Name</label>
												<input type="text" placeholder="Thomas">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Phone</label>
												<input type="text" placeholder="+12163547758 ">
											</div>
										</div>
										
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Email</label>
												<input type="email" placeholder="thomas@example.com">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Role</label>
												<select class="select">
													<option>Admin</option>
													<option>Manager</option>
													<option>Store Keeper</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Password</label>
												<div class="pass-group"> 
													<input type="password" class="pass-input" placeholder="****">
													<span class="fas toggle-password fa-eye-slash"></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-blocks">
												<label>Confirm Passworrd</label>
												<div class="pass-group">
													<input type="password" class="pass-input" placeholder="****">
													<span class="fas toggle-password fa-eye-slash"></span>
												</div>
											</div>
										</div>
										
										<div class="col-lg-12">
											<div class="mb-0 input-blocks">
												<label class="form-label">Descriptions</label>
												<textarea class="form-control mb-1"></textarea>
												<p>Maximum 600 Characters</p>
											</div>	
										</div>
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit User -->
@endif



@if(Route::is(['roles-permissions']))
		<!-- Add Role -->
		<div class="modal fade" id="add-units">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Create Role</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form action="roles-permissions">
									<div class="mb-0">
										<label class="form-label">Role Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-submit">Create Role</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Role -->

		<!-- Edit Role -->
		<div class="modal fade" id="edit-units">
			<div class="modal-dialog modal-dialog-centered custom-modal-two">
				<div class="modal-content">
					<div class="page-wrapper-new p-0">
						<div class="content">
							<div class="modal-header border-0 custom-modal-header">
								<div class="page-title">
									<h4>Edit Role</h4>
								</div>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body custom-modal-body">
								<form action="roles-permissions">
									<div class="mb-0">
										<label class="form-label">Role Name</label>
										<input type="text" class="form-control" value="sales Man">
									</div>
									<div class="modal-footer-btn">
										<button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-submit">Save Changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Role -->
@endif
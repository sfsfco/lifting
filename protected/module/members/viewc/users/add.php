<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?php echo $data['title']; ?></h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
											<button class="btn btn-default" type="button">Go!</button>
									</span>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php echo $data['title']; ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>users/insert"   enctype='multipart/form-data' novalidate>
							
							<?php play::display_message(); ?>

								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="first_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="first_name" placeholder="" required="required" type="text" value="">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="last_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="last_name" placeholder="" required="required" type="text" value="">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">UserName <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="username" placeholder="" required="required" type="text" value="">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address 
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="address" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="address" placeholder="" type="text" value="">
									</div>
								</div>
								<div class="item form-group">
			                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label>
			                        <div class="col-md-6 col-sm-6 col-xs-12">
			                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
			                        </div>
		                      </div>
		                      <div class="item form-group">
			                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password <span class="required">*</span></label>
			                        <div class="col-md-6 col-sm-6 col-xs-12">
			                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
			                        </div>
			                   </div>
			                   <div class="item form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salary 
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          <input type="number" id="salary" name="salary" data-validate-minmax="10,100000" class="form-control col-md-7 col-xs-12">
		                        </div>
		                      </div>
		                      <div class="item form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone 
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          <input type="tel" id="phone" name="phone" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
		                        </div>
		                      </div>
		                      <div class="item form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile 
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          <input type="tel" id="mobile" name="mobile" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
		                        </div>
		                      </div>
		                      <div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pic">Pic <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">

										<label for="pic" class="custom-file-upload">
												<i class="fa fa-cloud-upload"></i> Pic
										</label>
										<input id="pic" type="file" size="45" name="pic" class="input">

									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pic">Sign <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<label for="sign" class="custom-file-upload">
												<i class="fa fa-cloud-upload"></i> Sign
										</label>
										<input id="sign" type="file" size="45" name="sign" class="input">
									</div>
								</div>
								<div class="form-group">
			                        <label class="control-label control-label col-md-3 col-sm-3 col-xs-12">Group</label>
			                        <div class="col-md-6 col-sm-6 col-xs-12">
			                          <select class="select2_group form-control" name="group_id" id="group_id" >
			                          	<?php foreach($data['groupslist'] as $group){?>
			                          		<option value="<?php echo $group->id; ?>" ><?php echo $group->name; ?></option>
			                          	<?php }?>  
			                          </select>
			                        </div>
			                      </div>
			                    <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Activation</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                          <div class="">
		                            <label>
		                              <input type="checkbox" name="active" class="js-switch" checked />
		                            </label>
		                          </div>
		                        </div>
		                      </div>
								
							<div class="item form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details 
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          <textarea id="details" name="details" class="form-control col-md-7 col-xs-12"></textarea>
		                        </div>
		                     </div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button id="send" type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/validator/validator.js"></script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>

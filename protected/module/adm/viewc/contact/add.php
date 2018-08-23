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

						<form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact/send"  novalidate>
							
							<?php play::display_message(); ?>

							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="to">To <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="to" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="to" placeholder="" required="required" type="email" value="<?php echo $data['email']; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Subject <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="subject" class="form-control col-md-7 col-xs-12" name="subject" placeholder="" required="required" type="text" value="<?php echo rawurldecode($data['subject']); ?>">
								</div>
							</div>
							<div class="item form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Message <span class="required">*</span>
		                        </label>
		                        <div class="col-md-6 col-sm-6 col-xs-12">
		                          <textarea id="message" required="required" name="message" class="form-control col-md-7 col-xs-12"></textarea>
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
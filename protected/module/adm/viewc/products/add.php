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

						<form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>products/insert"  enctype='multipart/form-data'  novalidate>
						<?php play::display_message(); ?>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="name" placeholder="" required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ar_name">Arabic Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="ar_name" class="form-control col-md-7 col-xs-12" name="ar_name" placeholder="" required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_category">Product Category <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select name="product_category" id="product_category" class="select2_group form-control" >
                                    <option value="">Select</option>
                                    <?php foreach($data['productcategories'] as $ga){ ?>
                                        <option value="<?php echo $ga->id; ?>"><?php echo $ga->name; ?></option>
                                    <?php }?>
                                    </select>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Details <span class="required">*</span>
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<div class="x_content">
					                  <div id="alerts"></div>
					                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
					                    <div class="btn-group">
					                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
					                      <ul class="dropdown-menu">
					                      </ul>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
					                      <ul class="dropdown-menu">
					                        <li>
					                          <a data-edit="fontSize 5">
					                            <p style="font-size:17px">Huge</p>
					                          </a>
					                        </li>
					                        <li>
					                          <a data-edit="fontSize 3">
					                            <p style="font-size:14px">Normal</p>
					                          </a>
					                        </li>
					                        <li>
					                          <a data-edit="fontSize 1">
					                            <p style="font-size:11px">Small</p>
					                          </a>
					                        </li>
					                      </ul>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
					                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
					                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
					                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
					                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
					                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
					                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
					                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
					                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
					                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
					                      <div class="dropdown-menu input-append">
					                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
					                        <button class="btn" type="button">Add</button>
					                      </div>
					                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
					                      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
					                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
					                    </div>
					                  </div>

					                  <div id="editor-one" class="editor-wrapper"></div>

					                  <textarea name="details" id="details" style="display:none;"></textarea>
					                 
					                </div>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Arabic Details <span class="required">*</span>
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<div class="x_content">
					                  <div id="alerts"></div>
					                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#ar_editor-one">
					                    <div class="btn-group">
					                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
					                      <ul class="dropdown-menu">
					                      </ul>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
					                      <ul class="dropdown-menu">
					                        <li>
					                          <a data-edit="fontSize 5">
					                            <p style="font-size:17px">Huge</p>
					                          </a>
					                        </li>
					                        <li>
					                          <a data-edit="fontSize 3">
					                            <p style="font-size:14px">Normal</p>
					                          </a>
					                        </li>
					                        <li>
					                          <a data-edit="fontSize 1">
					                            <p style="font-size:11px">Small</p>
					                          </a>
					                        </li>
					                      </ul>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
					                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
					                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
					                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
					                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
					                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
					                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
					                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
					                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
					                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
					                      <div class="dropdown-menu input-append">
					                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
					                        <button class="btn" type="button">Add</button>
					                      </div>
					                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
					                      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
					                    </div>

					                    <div class="btn-group">
					                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
					                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
					                    </div>
					                  </div>

					                  <div id="ar_editor-one" class="editor-wrapper"></div>

					                  <textarea name="ar_details" id="ar_details" style="display:none;"></textarea>
					                 
					                </div>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Photo <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="photo_1" class="custom-file-upload">
											<i class="fa fa-cloud-upload"></i> Photo 1
										</label>
										<input id="photo_1" type="file" size="45" name="photo_1" class="input">	
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="photo_2" class="custom-file-upload">
											<i class="fa fa-cloud-upload"></i> Photo 2
										</label>
										<input id="photo_2" type="file" size="45" name="photo_2" class="input">	
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="photo_3" class="custom-file-upload">
											<i class="fa fa-cloud-upload"></i> Photo 3
										</label>
										<input id="photo_3" type="file" size="45" name="photo_3" class="input">	
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="photo_4" class="custom-file-upload">
											<i class="fa fa-cloud-upload"></i> Photo 4
										</label>
										<input id="photo_4" type="file" size="45" name="photo_4" class="input">	
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<label for="photo_5" class="custom-file-upload">
											<i class="fa fa-cloud-upload"></i> Photo 5
										</label>
										<input id="photo_5" type="file" size="45" name="photo_5" class="input">	
									</div>

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

<script src="<?php echo Doo::conf()->APP_URL ?>global/admin/vendors/validator/validator.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/google-code-prettify/src/prettify.js"></script>

<script type="text/javascript">
	$('#send').click(function(event) {
		$('#details').val($('#editor-one').html());
		$('#ar_details').val($('#ar_editor-one').html());
	
	});
</script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>



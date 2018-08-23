<style>
.fancybox-inner {
    overflow-x: hidden !important;
}
</style>
<div class="row" style="min-width:400px;">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h4><?php echo $data['title']; ?></h4>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<form id="myform-ajax" class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices/update/<?php echo $data['id']; ?>"  novalidate>
							
							<?php play::display_message(); ?>

								
								
							<div class="item form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details 
		                        </label>
		                        <div class="col-md-9 col-sm-6 col-xs-12">
		                          <textarea id="details" name="details" class="form-control col-md-7 col-xs-12"><?php echo $data['details']->details; ?></textarea>
		                        </div>
		                     </div>
							 <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Paid</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                          <div class="">
		                            <label>
		                              <input type="checkbox" name="paid" class="js-switch" <?php echo($data['details']->paid=='1')?'checked':''; ?> />
		                            </label>
		                          </div>
		                        </div>
		                      </div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
									<button id="send" onclick="return updateajax()" type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
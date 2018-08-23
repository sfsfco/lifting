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

                        <form class="form-horizontal form-label-left"  method="post" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>suppliers/update/<?php echo $data['supplier']->id; ?>"   enctype='multipart/form-data' novalidate>
                            
                            <?php play::display_message(); ?>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="" required="required" type="text" value="<?php echo $data['supplier']->name; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone1">Phone1 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="tel" id="phone1" name="phone1" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $data['supplier']->phone1; ?>">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone2">Phone2 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="tel" id="phone2" name="phone2" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $data['supplier']->phone2; ?>">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fax">Fax 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="tel" id="fax" name="fax" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $data['supplier']->fax; ?>">
                                    </div>
                                  </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="tel" id="mobile" name="mobile" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="<?php echo $data['supplier']->mobile; ?>">
                                </div>
                              </div>
                              <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select class="select2_group form-control" id="country" name="country">
                                      <option value="">Select</option>
                                      <option  value="<?php echo $data['supplier']->country; ?>" selected='selected'><?php echo $data['supplier']->country; ?></option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Mauritania">Mauritania</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="city" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="city" placeholder="" type="text" value="<?php echo $data['supplier']->city; ?>">
                                    </div>
                                </div>
                              <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="address" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="address" placeholder="" type="text" value="<?php echo $data['supplier']->address; ?>">
                                    </div>
                                </div>
                              <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postal_code">Postal Code 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="postal_code" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="postal_code" placeholder="" type="text" value="<?php echo $data['supplier']->postal_code; ?>">
                                    </div>
                                </div>
                              <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mail">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="mail" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="mail" placeholder="" type="email" required="required" value="<?php echo $data['supplier']->mail; ?>">
                                    </div>
                                </div>
                           <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site">Website URL <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="url" id="site" name="site" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12" value="<?php echo $data['supplier']->site; ?>">
                                </div>
                              </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea id="details" name="details" class="form-control col-md-7 col-xs-12"><?php echo $data['supplier']->details; ?></textarea>
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

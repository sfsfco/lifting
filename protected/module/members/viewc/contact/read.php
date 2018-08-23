<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>

<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $data['title']; ?> <small><?php echo $data['contact']->subject; ?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1><?php echo $data['contact']->subject; ?></h1> From :<em><?php echo $data['contact']->name; ?> [<?php echo $data['contact']->email; ?>]</em>
                      <p><?php echo nl2br($data['contact']->message); ?></p>
                    </div>
                  </div>
					<div class="form-group">
						<div class="col-md-12 text-right">
							<a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>contact/add/<?php echo $data['contact']->email; ?>/<?php echo $data['contact']->subject; ?>" class="btn btn-success">Replay</a>
						</div>
					</div>
                </div>
              </div>
            </div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
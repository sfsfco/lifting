<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Tables <small>basic table subtitle</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a target="_blank" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a target="_blank" href="#">Settings 1</a>
                          </li>
                          <li><a target="_blank" href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Module</th>
                          <th>Results</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr <?php echo(count($data['articles'])>0)?"class='green'":""; ?>>
                          <th scope="row">1</th>
                          <td>Articles</td>
                          <td>
                              <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>articles?search=<?php echo $data['key']; ?>">
                                <?php echo count($data['articles']); ?>
                              </a>
                          </td>
                        </tr>
                        <tr <?php echo(count($data['services'])>0)?"class='green'":""; ?>>
                            <th scope="row">2</th>
                            <td>Services</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>services?search=<?php echo $data['key']; ?>">
                                  <?php echo count($data['services']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['photos'])>0)?"class='green'":""; ?>>
                            <th scope="row">3</th>
                            <td>Photos</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>photos?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['photos']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['contact'])>0)?"class='green'":""; ?>>
                            <th scope="row">4</th>
                            <td>Contact</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['contact']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['inspaction'])>0)?"class='green'":""; ?>>
                            <th scope="row">5</th>
                            <td>Inspaction</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>inspaction?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['inspaction']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['maillist'])>0)?"class='green'":""; ?>>
                            <th scope="row">6</th>
                            <td>Maillist</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>maillist?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['maillist']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['users'])>0)?"class='green'":""; ?>>
                            <th scope="row">7</th>
                            <td>Users</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['users']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['groups'])>0)?"class='green'":""; ?>>
                            <th scope="row">8</th>
                            <td>Groups</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>groups?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['groups']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['clients'])>0)?"class='green'":""; ?>>
                            <th scope="row">9</th>
                            <td>Clients</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>clients?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['clients']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['suppliers'])>0)?"class='green'":""; ?>>
                            <th scope="row">10</th>
                            <td>Suppliers</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>suppliers?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['suppliers']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['banks'])>0)?"class='green'":""; ?>>
                            <th scope="row">11</th>
                            <td>Our Bank Accounts</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>banks?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['banks']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['categories'])>0)?"class='green'":""; ?>>
                            <th scope="row">12</th>
                            <td>Categories</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>categories?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['categories']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['items'])>0)?"class='green'":""; ?>>
                            <th scope="row">13</th>
                            <td>Items</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>items?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['items']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['stockallocations'])>0)?"class='green'":""; ?>>
                            <th scope="row">14</th>
                            <td>Stockallocations</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockallocations?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['stockallocations']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['good'])>0)?"class='green'":""; ?>>
                            <th scope="row">15</th>
                            <td>Good</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>good?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['good']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['expenses'])>0)?"class='green'":""; ?>>
                            <th scope="row">16</th>
                            <td>Expenses</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>expenses?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['expenses']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['incomes'])>0)?"class='green'":""; ?>>
                            <th scope="row">17</th>
                            <td>Income Check</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/income?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['incomes']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['pays'])>0)?"class='green'":""; ?>>
                            <th scope="row">18</th>
                            <td>Payment Check</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/pay?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['pays']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['purchases'])>0)?"class='green'":""; ?>>
                            <th scope="row">19</th>
                            <td>Purchases</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['purchases']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['workorders'])>0)?"class='green'":""; ?>>
                            <th scope="row">20</th>
                            <td>Workorders</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>workorders?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['workorders']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['certificates'])>0)?"class='green'":""; ?>>
                            <th scope="row">21</th>
                            <td>Certificates</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>certificates?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['certificates']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['delivery'])>0)?"class='green'":""; ?>>
                            <th scope="row">22</th>
                            <td>Delivery</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>delivery?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['delivery']); ?>
                                </a>
                            </td>
                        </tr>
                        <tr <?php echo(count($data['quotations'])>0)?"class='green'":""; ?>>
                            <th scope="row">23</th>
                            <td>Quotations</td>
                            <td>
                                <a target="_blank" href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>quotations?search=<?php echo $data['key']; ?>">
                                    <?php echo count($data['quotations']); ?>
                                </a>
                            </td>
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
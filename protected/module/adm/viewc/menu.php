<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li>
                    <a><i class="fa fa-sitemap"></i> CMS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li>
                            <a>Articles<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>articles">All Articles</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>articles/add">Add Article</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Photos<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>photos">All Photos</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>photos/add">Add Photo</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>galleries">Galliers</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>galleries/add">Add Gallery</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Products<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>products">All Products</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>products/add">Add Product</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>productcategories">Product Categories</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>productcategories/add">Add Category</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Messages<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact">All Messages</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>contact/add">New Message</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Maillist<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>maillist">All Maillist</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>maillist/add">Add To Maillist</a></li>
                            </ul>
                        </li>
                    </ul>
                  </li>       
                  
                  <li>
                    <a><i class="fa fa-sitemap"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li>
                            <a>Users<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users">All Users</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>users/add">Add User</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Groups<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>groups">All Groups</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>groups/add">Add Group</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Clients<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>clients">All Clients</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>clients/add">Add Client</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Suppliers<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>suppliers">All Suppliers</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>suppliers/add">Add Supplier</a></li>
                            </ul>
                        </li>
                        <!--
                        <li>
                          <a>Towns<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>towns">All Towns</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>towns/add">Add Town</a></li>
                            </ul>
                        </li>
                       -->
                        <li>
                          <a>Categories<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>categories">All Categories</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>categories/add">Add Category</a></li>
                            </ul>
                        </li>
                    </ul>
                  </li>       
                  
                  <li>
                    <a><i class="fa fa-sitemap"></i> Stores Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li>
                            <a>Stores<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockrooms">All Stores</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockrooms/add">Add Store</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Items<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>items">All Items</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>items/add">Add Item</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stores">All Stores Stock</a></li>
                        <li>
                          <a>Stock Allocation Sheets<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockallocations">All Stock Allocation Sheets</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>stockallocations/add">Add Sheet</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Goods Receipts Note<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>good">All Goods Receipts Note</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>good/add">Add Receipts Note</a></li>
                            </ul>
                        </li>
                    </ul>
                  </li>  

                  <li>
                    <a><i class="fa fa-sitemap"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!--
                        <li>
                            <a>Expenses<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>expenses">All Expenses</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>expenses/add">Add Expenses</a></li>
                            </ul>
                        </li>
                        -->
                        <li>
                          <a>Our Bank Accounts<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>banks">All Bank Accounts</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>banks/add">Add Bank Account</a></li>
                            </ul>
                        </li>
                        <!--
                        <li>
                          <a>Income Check<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/income">All Income Checks</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/addpay">Add Income Check</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Payment Check <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/pay">All Payment Checks</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>payments/add">Add Payment Check</a></li>
                            </ul>
                        </li>
                        -->
                        <li>
                          <a>Invoices <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices">All Invoices</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices/add">Add Invoice</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Purchases <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases">All Purchases</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>purchases/add">Add Purchase</a></li>
                            </ul>
                        </li>
                    </ul>
                  </li>     

                  <li>
                    <a><i class="fa fa-sitemap"></i> Work Orders <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li>
                            <a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>workorders">Work Orders </a>
                        </li>
                        <li>
                          <a>Certificates <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>certificates">All Certificates</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>certificates/add">Add Certificate</a></li>
                            </ul>
                        </li>
                        <li>
                          <a>Delivery Note <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>delivery">All Delivery Notes</a></li>
                              <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>delivery/add">Add Delivery Note</a></li>
                            </ul>
                        </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-home"></i> Quotations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>quotations">All Quotations</a></li>
                      <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>quotations/add">Add Quotation</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-home"></i> Prefrances <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>prefrances">Site Settings</a></li>
                      <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>prefrances/backup">Backup</a></li>
                      <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>prefrances/restore">Restore</a></li>
                    </ul>
                  </li>
                  <!--<li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>reports"><i class="fa fa-sitemap"></i> Reports</a></li>-->
                  
                  <li><a href="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>searches"><i class="fa fa-sitemap"></i> Search</a></li>    
                  
                </ul>
              </div>

            </div>
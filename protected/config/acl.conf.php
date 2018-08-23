<?php

// anonymous user can only access Blog index page.

$acl['admins']['allow'] = array(
                            'MainController'=>'*',
							'UsersController'=>'*',
							'GroupsController'=>'*',
                            'SuppliersController'=>'*',
                            'ClientsController'=>'*',
                            'StoresController'=>'*',
                            'ItemsController'=>'*',
                            'CategoriesController'=>'*',
                            'PurchasesController'=>'*',
                            'SalesController'=>'*',
                            'ReportsController'=>'*',
                            'PrefrancesController'=>'*',
						);
$acl['anonymous']['allow'] = array(
                            'MainController'=>'*',
                            'UsersController'=>'*',
							'BlogController'=>array('index')
						);
						
/*						
$acl['member']['failRoute'] = array(
								'_default'=>'/error/member',	//if not found this will be used
								'SnsController/banUser'=>'/error/member/sns/notAdmin', 
								'SnsController/showVipHome'=>'/error/member/sns/notVip', 
								'BlogController'=>'/error/member/blog/notAdmin' 
							);

$acl['vip']['failRoute'] = array(
								'_default'=>'/error/vip',	//if not found this will be used
								'SnsController/banUser'=>'/error/member/sns/notAdmin', 
								'BlogController'=>'/error/member/blog/notAdmin' 
							);					

$acl['admin']['failRoute'] = array(
								'SnsController/showVipHome'=>'/error/admin/sns/vipOnly' 
							);
*/
$acl['admins']['failRoute'] = array(
								'_default'=>'/error/notallow',
							);								
$acl['anonymous']['failRoute'] = array(
								'_default'=>'/error/notallow',
							);								
?>
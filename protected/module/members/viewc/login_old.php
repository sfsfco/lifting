<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		
		<link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/ml-css-ui-kit.css" type="text/css" title="MediaLoot Designer CSS UI Kit" />
		<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/ie.css" type="text/css" title="Internet Explorer Styles" />
		<![endif]-->
<style>
h3{text-align:left;}
h3 span {
padding-right: 20px;
padding-left: 0px;
}
section {
    background: url(<?php  echo $data['rootUrl']; ?>global/img/images/bg1.png) repeat-x scroll 0 0 #F3F3F3;
    border: 1px solid #CCCCCC;
    border-radius: 25px 25px 25px 25px;
    box-shadow: 0px 2px 15px 5px #CCCCCC;
    clear: both;
    padding: 10px;
}
</style>		

	</head>
	<body>
		<div class="container">
            <br><br><br><br><br><br>
			<section>
                <div style="margin:0 auto;text-align:center">
                <img src="<?php  echo $data['rootUrl']; ?>global/uploads/<?php echo $data['prefrances']->logo; ?>" style="max-width:200px;" >
                <h4><?php echo $data['prefrances']->site_name; ?></h4>
                <h4><?php echo(empty($this->flashMessenger))?'':$this->flashMessenger->displayMessages(); ?></h4>
                </div>
				<header><h3><span>Login</span></h3></header>
				<article style="text-align:center;">
					<form class="login-wrapper"  name="form_login" method="post" action="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>main/login"  style="display:inline-block;">
						<input name="username" type="text" class="login-field" value="User Name"  />
						<input name="password" type="password" class="password-field" value="Password" />
						<!--[if !IE]><!-->
						<input type="submit" class="login-button ocean login-ocean" value="login" />
						<!--<![endif]-->
						<!--[if IE]>
						<input type="image" src="<?php  echo $data['rootUrl']; ?>global/img/images/btn-login-ocean.png" class="login-button ocean login-ocean" value="login" />
						<![endif]-->
						
					</form>
					
				</article>
			</section>
            <br><br><br><br><br><br>
		</div><!--.container-->
        <script>
        $(".login-field").focus(function(){$(this).val('');});
        $(".password-field").focus(function(){
            
            if($(this).val()=='Password'){$(this).val('');}
            });
        </script>
	</body>
</html>
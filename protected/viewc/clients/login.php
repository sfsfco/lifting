<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
<style>
#myform{text-align:left;}
#myform label{width:200px;display:inline-block;direction:ltr !important;margin:10px;vertical-align:top;}
#myform input{margin:10px;}
</style>
 <div class="layout">
        <div class="lay-l"></div>
        <div class="lay-r">
          <div class="top">
            <h3>Login</h3>
          </div>


<br />
<form method="post" name="contact" action="<?php echo $data["formUrl"]; ?>clients/signin/" >
<table border="0">

<tr>

<td>Username</td> <td>:</td> <td><input type="text" id="username" name="username" class="required input_field" required="required " /></td>

</tr>

<tr>

<td>Password</td> <td>:</td> <td><input type="password" class="required input_field" name="password" id="password" required="required " /></td>

</tr>
<tr>
    <td colspan="3">
    <div class="clr"></div>
            <a href="#">New Client?</a> <a href="#">Forgot Password?</a>
            <input type="submit" value="Login" />
    </td>
</tr>


</table>
</form>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>


  
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>

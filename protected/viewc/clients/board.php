<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>

<link type="text/css" href="<?php  echo $data['rootUrl']; ?>global/js/jqueryui/css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jqueryui/js/jquery-ui-1.8.18.custom.min.js"></script>
        
<style>
#myform{text-align:left;}
#myform label{width:200px;display:inline-block;direction:ltr !important;margin:10px;vertical-align:top;}
#myform input{margin:10px;}
</style>
 <div class="layout">
        <div class="lay-l"></div>
        <div class="lay-r">
          <div class="top">
            <h3>Board</h3>
          </div>

<?php if(isset($data['message'])){ ?>
<div class='<?php echo $data['message_flag']; ?>'><?php echo $data['message']; ?></div>
<?php }?>
<br />
<div class="cert" id="tabs" style="display:inline-block;">
            <ul>
                <li><a href="#tabs-1">My Certificates</a></li> 
                <li><a href="#tabs-2">My Quotations</a></li> 
                <li><a href="#tabs-3">Request Inspaction</a></li> 
                <li><a href="#tabs-4">Change Password</a></li>
            </ul>
        <div id="tabs-1">
        <?php foreach($data['certificates'] as $certificates){ ?>
    <a href="<?php echo $data['rootUrl']; ?>clients/printit/<?php echo $certificates->id; ?>" target="_blank">
    <span>
        <img src="<?php echo $data['rootUrl']; ?>global/images/cert.png">
        <span class="right">
        (<?php echo date('d/m/Y',strtotime($certificates->test_date)); ?>) <br>
        <?php echo str_replace('_',' ',$certificates->certificat_type); ?><br>
        <?php echo str_replace('_',' ',$certificates->certificate_form); ?><br>
        </span>
        </a>
    </span>
<?php } ?>

        </div>
        <div id="tabs-2">
        <?php foreach($data['quotations'] as $quotations){ ?>
    <a href="<?php echo $data['rootUrl']; ?>clients/printquotation/<?php echo $quotations->id; ?>" target="_blank">
    <span>
        <img src="<?php echo $data['rootUrl']; ?>global/images/cert.png">
        <span class="right">
        (<?php echo date('d/m/Y',strtotime($quotations->create_date)); ?>) <br>
        <?php echo str_replace('_',' ',$quotations->title); ?><br>
        Request No[<?php echo str_replace('_',' ',$quotations->request_no); ?>]<br>
        </span>
        </a>
    </span>
<?php } ?>

        </div>
        <div id="tabs-3">
        <form method="post" name="contact" action="<?php echo $data["formUrl"]; ?>clients/send/" >
<table border="0">

<tr>

<td>Name</td> <td>:</td> <td><input type="text" id="name" name="name" class="required input_field" required="required " /></td>

</tr>

<tr>

<td>E-mail</td> <td>:</td> <td><input type="email" class="validate-email required input_field" name="email" id="email" required="required " /></td>

</tr>

<tr>
<tr>

<td>Request</td> <td>:</td> <td><input type="text" class="validate-email required input_field" name="subject" id="subject" required="required " /></td>

</tr>

<tr>

<td>Details</td> <td>:</td> <td><textarea id="message" name="message"  class="required" required="required " ></textarea></td>

</tr>

<tr>

<td></td> <td></td> <td><input name="" value="Send" type="submit" class="ty" /></td>

</tr>

</table>
</form>
        </div>
        <div id="tabs-4">
                <form method="post" name="changepass" action="<?php echo $data["formUrl"]; ?>clients/changepass/" onsubmit="return trypass();" >
<table border="0">

<tr>

<td>Enter Old Password</td> <td>:</td> <td><input type="password" id="old_password" name="old_password" class="required input_field" required="required " /></td>

</tr>

<tr>

<td>New Password</td> <td>:</td> <td><input type="password" class="required input_field" name="password" id="password" required="required " /></td>

</tr>

<tr>
<tr>

<td>New Password confirm</td> <td>:</td> <td><input type="password" class="required input_field" name="password1" id="password1" required="required " /></td>

</tr>


<tr>

<td></td> <td></td> <td><input name="" value="Change" type="submit" class="ty" /></td>

</tr>

</table>
</form>
        </div>

</div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>


<script>
        $(function() {
		$( "#tabs" ).tabs();
	});
function trypass(){
if($('#password').val()!=$('#password1').val()){alert('passwords not matched'); return false;}
}
</script>  

<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>


<div class="span-16 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>users/updatepass" method="post">
<div class="span-5 last">Old Password</div>
<div class="span-11"><input type="password" name="old_password" id="old_password" class="required" value=""></div>
<div class="span-5 last">New Password</div>
<div class="span-11 "><input type="password" name="password" id="password" class="required" value=""></div>
<div class="span-5 last">New Pawwrod confirm</div>
<div class="span-11 "><input type="password" name="password2" id="password2" class="required" value=""></div>

<div class="span-16 last" style="text-align:center"><input type="submit" value="Edit"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['old_id']; ?>" />
</form>
</div>


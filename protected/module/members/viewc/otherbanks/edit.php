
<div class="span-16 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>otherbanks/update" method="post">
<div class="span-5 ">Name</div>
<div class="span-11 last"><input type="text" name="name" id="name" class="required" value="<?php echo $data['bank']->name; ?>" ></div>


<div class="span-16 last" style="text-align:center"><input type="submit" value="Update"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['bank']->id; ?>" >
</form>
</div>


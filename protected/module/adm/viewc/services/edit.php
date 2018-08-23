
<div class="span-24 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>services/update" method="post">
<div class="span-5 ">Title</div>
<div class="span-19 last"><input type="text" name="name" id="name" class="required" value="<?php echo $data['services']->name; ?>" ></div>
<div class="span-5 ">Article</div>
<div class="span-19 last">
    <textarea id="details" name="details" rows="15" cols="80" style="width: 80%;" class="tinymce"><?php echo $data['services']->details; ?></textarea>
</div>

<div class="span-24 last" style="text-align:center"><input type="submit" value="Edit"></div>
<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['services']->id; ?>" >
</form>
</div>


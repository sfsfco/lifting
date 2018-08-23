
<div class="span-24 last result" style="text-align:right;direction:rtl;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>services/insert" method="post">
<div class="span-5 ">Title</div>
<div class="span-19 last"><input type="text" name="name" id="name" class="required"></div>
<div class="span-5 ">Articles</div>
<div class="span-19 last">
    <textarea id="details" name="details" rows="15" cols="80" style="width: 80%" class="tinymce"></textarea>
</div>


<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>
</form>
</div>


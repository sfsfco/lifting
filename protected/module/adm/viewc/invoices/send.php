<style>
div{text-align:left;}
</style>
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>quotations/sending" method="post">
<div class="span-16 last result" style="text-align:right;direction:rtl;">

<div class="span-5 last">To</div>
<div class="span-11"><input type="text" name="to" id="to" class="required"  value="<?php echo $data['email']; ?>"></div>
<div class="span-5 last">Title</div>
<div class="span-11"><input type="text" name="subject" id="subject" class="required" value="<?php echo rawurldecode($data['subject']); ?>"></div>
<div class="span-5 last">Message</div>
<div class="span-11"><textarea name="message" id="message" class="required"><?php echo $data['message']?></textarea></div>
<input type="hidden" name="old_id" id="old_id" class="required" value="<?php echo $data['quotation']->id; ?>">
<div class="span-16 last"><input type="submit" name="send" value="Send"></div>





</div>
</form>

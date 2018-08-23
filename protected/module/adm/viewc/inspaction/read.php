<style>
div{text-align:left;}
</style>
<div class="span-16 last result" style="text-align:right;direction:rtl;">

<div class="span-5 ">Name</div>
<div class="span-11 last"><?php echo $data['inspaction']->name; ?></div>
<div class="span-5 ">Title</div>
<div class="span-11 last"><?php echo $data['inspaction']->subject; ?></div>
<div class="span-5 ">Mail</div>
<div class="span-11 last"><?php echo $data['inspaction']->email; ?></div>
<div class="span-5">Message</div>
<div class="span-11 last"><?php echo nl2br($data['inspaction']->message); ?></div>



<div class="span-16 last" style="text-align:center">
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>inspaction/add/<?php echo $data['inspaction']->email; ?>/<?php echo $data['inspaction']->subject; ?>" class="link">
        <img src="<?php echo $data['rootUrl'] ?>global/img/replay.png">Replay
    </a>
</div>



</div>


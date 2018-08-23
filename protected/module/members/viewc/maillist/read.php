<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-16 last result" style="text-align:right;direction:rtl;">

<div class="span-11"><?php echo $data['contact']->name; ?></div>
<div class="span-5 last">الإسم</div>
<div class="span-11"><?php echo $data['contact']->subject; ?></div>
<div class="span-5 last">العنوان</div>
<div class="span-11"><?php echo $data['contact']->email; ?></div>
<div class="span-5 last">البريد</div>
<div class="span-11"><?php echo nl2br($data['contact']->message); ?></div>
<div class="span-5 last">الرسالة</div>


<div class="span-16 last" style="text-align:center">
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>contact/add/<?php echo $data['contact']->email; ?>/<?php echo $data['contact']->subject; ?>" class="link">
        <img src="<?php echo $data['rootUrl'] ?>global/img/replay.png"> رد
    </a>
</div>



</div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>

<?php

//mysql_query("SET NAMES 'latin1' ",$con); 
?>
<div class="span-23 last" style="padding-top:10px;text-align:right;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?>catch/add" class="link">
        <h4 style="margin:0px;"> إضافة
    <img src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
    </h4> 
    </a>
    
</div>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="last">تفاصيل</th>
				<th>الإسم</th>
				<th>الجهة</th>
				<th>التاريخ</th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['catchlist'] as $catch){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?>catch/details/<?php echo $catch->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.gif" >
                        </a>
                    </td>
                    <td>
                            <?php echo $catch->payfrom; ?>
                    </td>
                    <td>
                            <?php echo $catch->type; ?>
                    </td>
                    <td>
                            <?php echo $catch->add_date; ?>
                    </td>
                    <td><?php echo $catch->id; ?></td>
                </tr>
                <?php $x++;} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>

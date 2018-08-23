
<?php

//mysql_query("SET NAMES 'latin1' ",$con); 
?>
<div class="span-23 last" style="padding-top:10px;text-align:right;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?>returned/add" class="link">
        <h4 style="margin:0px;"> إضافة
    <img src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
    </h4> 
    </a>
    
</div>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="last">تفاصيل</th>
				<th>التاريخ</th>
				<th>لصالح </th>
				<th>المبلغ </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['paymentslist'] as $pay){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?>returned/details/<?php echo $pay->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png" >
                        </a>
                    </td>
                    <td>
                            <?php echo $pay->payment_date; ?>
                    </td>
                    <td>
                            <?php echo $pay->supplier; ?>
                    </td>
                    <td><?php echo $pay->payment_value; ?></td>
                    <td><?php echo $pay->id; ?></td>
                </tr>
                <?php $x++;} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>

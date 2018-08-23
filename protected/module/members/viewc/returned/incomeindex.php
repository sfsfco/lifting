
<?php

//mysql_query("SET NAMES 'latin1' ",$con); 
?>
<div class="span-23 last" style="padding-top:10px;text-align:right;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?>payments/addpay" class="link">
        <h4 style="margin:0px;"> إضافة
    <img src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
    </h4> 
    </a>
    
</div>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="last">حذف</th>
				<th>التاريخ</th>
				<th>العميل </th>
				<th>المبلغ </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['paymentslist'] as $pay){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $pay->id; ?>"  href="<?php echo $data['formUrl'] ?>payments/delete/<?php echo $pay->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                            <?php echo $pay->payment_date; ?>
                    </td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?>payments/edit/<?php echo $pay->id; ?>" class="link">
                            <?php echo $pay->client; ?>
                        </a>
                    </td>
                    <td><?php echo $pay->payment_value; ?></td>
                    <td><?php echo $pay->id; ?></td>
                </tr>
                <?php $x++;} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>

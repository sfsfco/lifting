<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-23 last" style="padding-top:10px;text-align:left;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>payments/add" class="link">
         <h4 style="margin:0px;">
            <img style="margin-left:25px;" src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
             Add
        </h4>
    </a>
    
</div>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
               	<th >Details</th>
				<th>Datea</th>
				<th>For </th>
				<th>Value </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['paymentslist'] as $pay){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $pay->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>payments/delete/<?php echo $pay->id; ?>/pay" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>payments/details/<?php echo $pay->id; ?>" class="link">
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
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
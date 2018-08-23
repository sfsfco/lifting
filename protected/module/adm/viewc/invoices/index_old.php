<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table th {min-width:85px;}
</style>
<div class="span-23 last" style="padding-top:10px;text-align:left;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>invoices/add" class="link">
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
				<th >print</th>
				<th >invoice date</th>
				<th>qutation</th>
				<th>po</th>
				<th>client</th>
				<th>delivery date</th>
				<th>serial</th>
				<th>title</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['invoiceslist'])){foreach($data['invoiceslist'] as $invoice){ ?>
                <tr class="table-row<?php echo $x%2; ?>" >
                    <td>
                        <?php if($invoice->deleted=='0'){ ?>
                        <a id="del_<?php echo $invoice->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>invoices/delete/<?php echo $invoice->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                        <?php }else{ ?>
                           <span style="color:red"> Deleted</span>
                        <?php }?>
                    </td>
                        <td>
                       <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>invoices/details/<?php echo $invoice->id; ?>" target="_blank">
                             <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                       </a>
                    </td>

<td><?php echo date('d-m-Y',strtotime($invoice->create_date)); ?></td>
                     <td><?php echo $invoice->quotation; ?></td>
                     <td><?php echo $invoice->po; ?></td>
                     <td><?php echo $invoice->client; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($invoice->delivery_date)); ?></td>
                    <td><?php echo $invoice->serial; ?></td>
                    <td><?php echo $invoice->name; ?></td>
                    
                    <td><?php echo $invoice->id; ?></td>
                </tr>
                <?php $x++;}} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>

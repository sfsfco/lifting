<style>

.borderhard table th {
min-width: 100px;
}
</style>
<div class="span-23 last" style="padding-top:10px;text-align:left;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?>sales/add" class="link">
             <h4 style="margin:0px;">
            <img style="margin-left:25px;" src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
             Add
        </h4>
 
    </a>
    
</div>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th class="first">By </th>
				<th>Details</th>
				<th>Total Value </th>
				<th>Payment Method</th>
				<th>Sales Date</th>
				<th>Client </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['saleslist'])){foreach($data['saleslist'] as $sale){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td><?php echo $sale->by; ?></td>
                     <td>
                        <a  href="<?php echo $data['formUrl'] ?>sales/details/<?php echo $sale->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $sale->total_value; ?></td>
                    <td><?php echo $sale->payment_method; ?></td>
                    <td><?php echo $sale->sell_date; ?></td>
                    <td><?php echo $sale->Clients->name; ?></td>
                    <td><?php echo $sale->id; ?></td>
                </tr>
                <?php $x++;}} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>

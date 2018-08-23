<style>
.borderhard table th {min-width:80px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th class="first">Delete</th>
				<th >Order By</th>
				<th >Received</th>
				<th>Details</th>
				<th>Total Value </th>
				<th>Payment Method</th>
				<th>Purchase Date</th>
				<th>Supplier </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['purchases'])){foreach($data['purchases'] as $purchase){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td><a id="del_<?php echo $purchase->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>purchases/delete/<?php echo $purchase->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a></td>
                    <td><?php echo $purchase->by; ?></td>
                    <td><?php echo $purchase->received; ?></td>
                    
                     <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>purchases/details/<?php echo $purchase->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $purchase->total_value; ?></td>
                    <td><?php echo ($purchase->payment_method=='0')?'Monetary':'Check'; ?></td>
                    <td><?php echo $purchase->purchase_date; ?></td>
                    <td><?php echo $purchase->Suppliers->name; ?></td>
                    <td><?php echo $purchase->id; ?></td>
                </tr>
                <?php $x++;}} ?>
            </tbody> 
            </table>

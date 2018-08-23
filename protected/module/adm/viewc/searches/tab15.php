
<style>
.borderhard table th {min-width:76px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th  class="first">Delete</th>
                <th>Percentage Profit</th>
                <th>Cost Value</th>
				<th >Order Value</th>
				<th >Date</th>
				<th>workorder</th>
				<th>title</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['stockallocations'])){foreach($data['stockallocations'] as $stockallocation){ ?>
                <tr class="table-row<?php echo $x%2; ?> " >
                      <td>
                        <a id="del_<?php echo $stockallocation->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>stockallocations/delete/<?php echo $stockallocation->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                    </td>
                    
                    <td>
                     <?php echo $stockallocation->percentage_profit; ?>
                    </td>
                    <td>
                        <?php echo $stockallocation->cost_value; ?>
                    </td>
                    <td>
                        <?php echo $stockallocation->order_value; ?>
                    </td>
                     <td>
                        <?php echo date('d-m-Y',strtotime($stockallocation->create_date));  ?>
                    </td>
                     <td>
                        <?php echo $stockallocation->workorder;  ?>
                    </td>
                    <td>
                        <a href="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>stockallocations/edit/<?php echo $stockallocation->id; ?>" class="link" >
                            <?php echo $stockallocation->workorder_title;  ?>
                        </a>
                    </td>
                     
                    <td><?php echo $stockallocation->id; ?></td>
                </tr>
                <?php $x++;}} ?>
            </tbody> 
            </table>

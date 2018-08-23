<style>
.borderhard table th {min-width:80px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Barcode</th>
				<th>Request Limit</th>
				<th>Sell Price</th>
				<th>Category</th>
				<th style="min-width:140px;">Itme </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['items'])){ foreach($data['items'] as $item){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $item->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>items/delete/<?php echo $item->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                    <!--
                    <div class="printing" >
                    <img src="<?php echo $data['rootUrl'] ?>items/printbarcode/<?php echo $item->barcode; ?>" style="max-width:50px;max-height:50px;">
                    <br>
                    <?php echo $item->name; ?>
                    </div>
                    -->
                    
                    
                        <a  href="<?php echo $data['rootUrl'] ?><?php echo Doo::conf()->adminmod; ?>items/printing/<?php echo $item->barcode; ?>/<?php echo $item->name; ?>" class="windowX">
                            <img src="<?php echo $data['rootUrl'] ?><?php echo Doo::conf()->adminmod; ?>items/printbarcode/<?php echo $item->barcode; ?>" style="max-width:50px;max-height:50px;">
                            <br>
                            <?php echo $item->name; ?>
                        </a>
                    
                    </td>
                    <td><?php echo $item->order_limit; ?></td>
                    <td><?php echo $item->purchase_price; ?></td>
                    <td><?php echo $item->Categories->name; ?></td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>items/edit/<?php echo $item->id; ?>" class="link">
                            <?php echo $item->name; ?>
                        </a>
                    </td>
                    <td><?php echo $item->id; ?></td>
                </tr>
                <?php $x++;}} ?>
            </tbody> 
            </table>

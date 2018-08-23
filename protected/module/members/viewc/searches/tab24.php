<style>
.borderhard table th {min-width:76px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th  class="first">Delete</th>
                <th>WorkOrder No</th>
				<th >Delivered Date</th>
				<th >Delivered To</th>
				<th>Details</th>
				<th>client</th>
				<th>title</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['delivery'])){foreach($data['delivery'] as $delivery){ ?>
                <tr class="table-row<?php echo $x%2; ?> " >
                      <td>
                        <a id="del_<?php echo $delivery->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>delivery/delete/<?php echo $delivery->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                    </td>
                    <td>
                     <?php echo $delivery->workorder; ?>
                    </td>
                     <td>
                        <?php echo date('d-m-Y',strtotime($delivery->delivery_date));  ?>
                    </td>
                     <td>
                        <?php echo $delivery->delivery_to;  ?>
                    </td>
                     <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>delivery/details/<?php echo $delivery->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $delivery->client_name; ?></td>
                    <td><a href="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>delivery/edit/<?php echo $delivery->id; ?>" class="link" ><?php echo $delivery->title; ?></a></td>
                    <td><?php echo $delivery->id; ?></td>
                </tr>
                <?php $x++;}} ?>
            </tbody> 
            </table>

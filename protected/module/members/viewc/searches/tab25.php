<style>
.borderhard table th {min-width:95px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th class="first">Delete</th>
				<th >Covert</th>
				<th>Details</th>
				<th>date</th>
				<th>request number</th>
				<th>client</th>
				<th>title</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['quotations'])){foreach($data['quotations'] as $quotation){ ?>
                <tr class="table-row<?php echo $x%2; ?> <?php if($quotation->has_workorder=='1'){echo("coverted");}?>" >
                     <td>
                     <?php if($quotation->has_workorder=='0'){ ?>
                        <a id="del_<?php echo $quotation->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>quotations/delete/<?php echo $quotation->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                        <?php } ?>
                    </td>
                     <td>
                     <?php if($quotation->has_workorder=='0'){ ?>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>quotations/convert/<?php echo $quotation->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/workorder.png">
                        </a>
                        <?php }else{echo('Converted');} ?>
                    </td>
                     <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>quotations/details/<?php echo $quotation->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo date('d-m-Y',strtotime($quotation->quotation_date)); ?></td>
                    <td><?php echo $quotation->request_no; ?></td>
                    <td><?php echo $quotation->client_name; ?></td>
                    <td><a href="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->membermod; ?>quotations/edit/<?php echo $quotation->id; ?>" class="link" ><?php echo $quotation->title; ?></a></td>
                    <td><?php echo $quotation->id; ?></td>
                </tr>
                <?php $x++;}} ?>
            </tbody> 
            </table>

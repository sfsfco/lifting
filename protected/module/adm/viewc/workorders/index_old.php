<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table th {min-width:76px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th  class="first">Delete</th>
                <th>Delivery Nots</th>
                <th>Certificate</th>
				<th>Quotation No</th>
				<th >Delivery Date</th>
				<th>Details</th>
				<th>request number</th>
				<th>client</th>
				<th>title</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['workorderslist'])){foreach($data['workorderslist'] as $workorder){ ?>
                <tr class="table-row<?php echo $x%2; ?> " >
                      <td>
                        <a id="del_<?php echo $workorder->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>workorders/delete/<?php echo $workorder->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                    </td>
                    <td>
                        <?php if($workorder->hasdelivery=='yes'){ ?>
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delivery.png">
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($workorder->hascertificate=='yes'){ ?>
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/certificate.png">
                        <?php } ?>
                    </td>
                    <td>
                     <?php echo $workorder->quotation; ?>
                    </td>
                     <td>
                        <?php echo date('d-m-Y',strtotime($workorder->delivery_date));  ?>
                    </td>
                     <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>workorders/details/<?php echo $workorder->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $workorder->request_no; ?></td>
                    <td><?php echo $workorder->client_name; ?></td>
                    <td><a href="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>workorders/edit/<?php echo $workorder->id; ?>" class="link" ><?php echo $workorder->title; ?></a></td>
                    <td><?php echo $workorder->id; ?></td>
                </tr>
                <?php $x++;}} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
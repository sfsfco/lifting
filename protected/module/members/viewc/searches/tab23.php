<style>
.borderhard table th {min-width:76px;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th  class="first">Delete</th>
				<th>Edit</th>
				<th>Tested By</th>
				<th>Certificate Type</th>
				<th>Certificate Form</th>
				<th >Certificate Date</th>
				<th>Details</th>
				<th>workorder no.</th>
				<th>client</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['certificates'])){foreach($data['certificates'] as $certificate){ ?>
                <tr class="table-row<?php echo $x%2; ?> " >
                      <td>
                        <a id="del_<?php echo $certificate->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>certificates/delete/<?php echo $certificate->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                    </td>
                      <td>
                       <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>certificates/edit/<?php echo $certificate->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/edit.png">
                        </a>
                      </td>
                      <td><?php echo $certificate->test_by; ?></td>
                      <td><?php echo $certificate->certificat_type; ?></td>
                      <td><?php echo $certificate->certificate_form; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($certificate->test_date));  ?></td>
                      <td>
                        <a target="_blank" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>certificates/details/<?php echo $certificate->id; ?>">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $certificate->workorder; ?></td>
                    <td><?php echo $certificate->Clients->name; ?></td>
                    <td><?php echo $certificate->id; ?></td>
                </tr>
                <?php $x++;}} ?>
            </tbody> 
            </table>

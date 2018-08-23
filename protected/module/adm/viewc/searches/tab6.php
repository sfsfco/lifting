<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Create Date</th>
				<th>Mail</th>
				<th>Name</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['maillist'] as $mail){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $mail->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>maillist/delete/<?php echo $mail->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                  <td style="text-align:center">
                            <?php echo date('d-m-Y',strtotime($mail->create_date)); ?>
                    </td>
                      <td style="text-align:center">
                            <?php echo $mail->email ; ?>
                    </td>
                    <td><?php echo $mail->name ; ?></td>
                    <td><?php echo $mail->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

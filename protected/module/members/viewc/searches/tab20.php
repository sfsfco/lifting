<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
               	<th >Details</th>
				<th>Datea</th>
				<th>For </th>
				<th>Value </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['pays'] as $pay){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $pay->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/delete/<?php echo $pay->id; ?>/pay" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>payments/details/<?php echo $pay->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png" >
                        </a>
                    </td>
                    <td>
                            <?php echo $pay->payment_date; ?>
                    </td>
                    <td>
                            <?php echo $pay->supplier; ?>
                    </td>
                    <td><?php echo $pay->payment_value; ?></td>
                    <td><?php echo $pay->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

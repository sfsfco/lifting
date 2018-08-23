<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Name </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['otherbanks'] as $bank){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $bank->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>otherbanks/delete/<?php echo $bank->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>otherbanks/edit/<?php echo $bank->id; ?>" class="link">
                            <?php echo $bank->name; ?>
                        </a>
                    </td>
                    <td><?php echo $bank->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

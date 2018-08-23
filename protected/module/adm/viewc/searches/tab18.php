<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Name </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['expenses'] as $expense){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $expense->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>expenses/delete/<?php echo $expense->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>expenses/edit/<?php echo $expense->id; ?>" class="link">
                            <?php echo $expense->name; ?>
                        </a>
                    </td>
                    <td><?php echo $expense->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Name </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['stockrooms'] as $stockroom){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $stockroom->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stockrooms/delete/<?php echo $stockroom->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>stockrooms/edit/<?php echo $stockroom->id; ?>" class="link">
                            <?php echo $stockroom->name; ?>
                        </a>
                    </td>
                    <td><?php echo $stockroom->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

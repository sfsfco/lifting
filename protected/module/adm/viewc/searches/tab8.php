<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
                <th class="first">Delete</th>
                <th>Group Name</th>
                <th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['groups'] as $group){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    
                    <td>
                        <a id="del_<?php echo $group->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>groups/delete/<?php echo $group->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                        
                    </td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>groups/edit/<?php echo $group->id; ?>" class="link">
                            <?php echo $group->name; ?>
                        </a>
                    </td>
                    <td><?php echo $group->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

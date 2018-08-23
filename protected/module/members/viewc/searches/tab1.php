<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
                <th class="first">Number</th>
               	<th>Title</th>
                <th>Created By</th>
				<th class="last">Delete</th>
				
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['articles'] as $line){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td><?php echo $line->id; ?></td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>articles/edit/<?php echo $line->id; ?>" class="link">
                            <?php echo $line->name; ?>
                        </a>
                    </td>
                    <td>
                        
                            <?php echo $line->username; ?>
                        
                    </td>
                    
                    <td>
                        <a id="del_<?php echo $line->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>articles/delete/<?php echo $line->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

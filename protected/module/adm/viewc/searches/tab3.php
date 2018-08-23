<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
                <th>Photo</th>
				<th>title </th>
				
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['photos'] as $line){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $line->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>photos/delete/<?php echo $line->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                     <td>
                     <a href="<?php  echo $data['rootUrl']; ?>global/uploads/photos/<?php echo $line->photo; ?>" class="link"> 
                        <img src='<?php  echo $data['rootUrl']; ?><?php echo Doo::conf()->adminmod; ?>photos/getimg?path=<?php  echo Doo::conf()->SITE_PATH; ?>global/uploads/photos/<?php echo $line->photo; ?>&X=100&Y=100' style='width:100px;'>
                            </a>
                        
                    </td>
                    <td>
                            <?php echo $line->name; ?>
                    </td>
                   
                    <td><?php echo $line->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

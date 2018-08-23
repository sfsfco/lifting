<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Date</th>
				<th>Readed</th>
				<th>Title</th>
				<th>Mail</th>
				<th>Sender</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['inspaction'] as $inspaction){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $inspaction->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>inspaction/delete/<?php echo $inspaction->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                  <td style="text-align:center">
                            <?php echo $inspaction->create_date; ?>
                    </td>
                      <td style="text-align:center">
                            <?php echo ($inspaction->readed==0)?"<img src='". $data['rootUrl']."global/img/unread.png'>":"<img src='". $data['rootUrl']."global/img/read.png'>"; ?>
                    </td>
                    <td><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>inspaction/read/<?php echo $inspaction->id;?>" class="link"><?php echo $inspaction->subject ; ?></a></td>
                    <td><?php echo $inspaction->email ; ?></td>
                    <td><?php echo $inspaction->name ; ?></td>
                   
                   
                    <td><?php echo $inspaction->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

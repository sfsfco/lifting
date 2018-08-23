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
                <?php $x=0; foreach($data['contact'] as $contact){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $contact->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>contact/delete/<?php echo $contact->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                  <td style="text-align:center">
                            <?php echo $contact->create_date; ?>
                    </td>
                      <td style="text-align:center">
                            <?php echo ($contact->readed==0)?"<img src='". $data['rootUrl']."global/img/unread.png'>":"<img src='". $data['rootUrl']."global/img/read.png'>"; ?>
                    </td>
                    <td><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>contact/read/<?php echo $contact->id;?>" class="link"><?php echo $contact->subject ; ?></a></td>
                    <td><?php echo $contact->email ; ?></td>
                    <td><?php echo $contact->name ; ?></td>
                   
                   
                    <td><?php echo $contact->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

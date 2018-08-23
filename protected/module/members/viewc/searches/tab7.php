<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Password</th>
				<th>Group</th>
				<th>Active</th>
				<th>UserName</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['users'] as $userd){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $userd->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/delete/<?php echo $userd->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td>
                        <a id="pass_<?php echo $userd->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/editpass/<?php echo $userd->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/password.png" >
                        </a>
                    </td>
                    <td><?php echo (isset($userd->Groups->name))?$userd->Groups->name:''; ?></td>
                    <td style="text-align:center;" >
                        <a id="active_<?php echo $userd->id; ?>" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/activate/<?php echo $userd->id; ?>" class="activate">
                            <?php if($userd->active=='1'){echo "<div class='true'></div>";}else{echo "<div class='false'></div>";} ?>
                        </a>
                    </td>
                    <td><?php echo $userd->username; ?></td>
                    <td><?php echo $userd->last_name; ?></td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>users/edit/<?php echo $userd->id; ?>" class="link">
                            <?php echo $userd->first_name; ?>
                        </a>
                    </td>
                    <td><?php echo $userd->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

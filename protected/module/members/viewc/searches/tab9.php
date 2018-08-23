<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
               	<th class="first">Delete</th>
				<th>Value</th>
				<th>Creditor/Debtor</th>
				<th>Mobile</th>
				<th>Phone</th>
				<th>Name</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['clients'] as $client){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $client->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>clients/delete/<?php echo $client->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td><?php echo $client->debit_credit_value; ?></td>
                    <td style="text-align:center;" >
                            <?php echo($client->debit_credit); ?>
                    </td>
                    <td><?php echo $client->mobile; ?></td>
                    <td><?php echo $client->phone; ?></td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>clients/edit/<?php echo $client->id; ?>" class="link">
                            <?php echo $client->name; ?>
                        </a>
                    </td>
                    <td><?php echo $client->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

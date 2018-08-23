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
                <?php $x=0; foreach($data['suppliers'] as $supplier){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td>
                        <a id="del_<?php echo $supplier->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>suppliers/delete/<?php echo $supplier->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                    <td><?php echo $supplier->debit_credit_value; ?></td>
                    <td style="text-align:center;" >
                            <?php if($supplier->debit_credit=='Creditor'){echo("<span style='color:#930002;font-weight:bold;'>".$supplier->debit_credit."</span>");}else{echo($supplier->debit_credit);} ?>
                    </td>
                    <td><?php echo $supplier->mobile; ?></td>
                    <td><?php echo $supplier->phone1; ?></td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>suppliers/edit/<?php echo $supplier->id; ?>" class="link">
                            <?php echo $supplier->name; ?>
                        </a>
                    </td>
                    <td><?php echo $supplier->id; ?></td>
                </tr>
                <?php $x++;} ?>
            </tbody> 
            </table>

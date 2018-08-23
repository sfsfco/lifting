<style>
th , td{text-align:center;}
</style>
<div class="span-20 printable last" style="padding-top:10px;text-align:right;">
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
              
				<th>القيمة</th>
				<th>الحالة</th>
				<th>الموبايل</th>
				<th>الهاتف</th>
				<th>الإسم </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['clientslist'] as $client){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    
                    <td><?php echo $client->debit_credit_value; ?></td>
                    <td style="text-align:center;" >
                            <?php if($client->debit_credit=='1'){echo "مدين";}else{echo "دائن";} ?>
                    </td>
                    <td><?php echo $client->mobile; ?></td>
                    <td><?php echo $client->phone; ?></td>
                    <td>
                      
                            <?php echo $client->name; ?>
                      
                    </td>
                    <td><?php echo $client->id; ?></td>
                </tr>
                <?php $x++;} ?>
                
            </tbody> 
            </table>
 
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit()" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="طباعة" alt="طباعة" ></a>
</div>

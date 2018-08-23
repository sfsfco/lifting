<style>
th , td{text-align:center;}
</style>
<div class="span-20 printable last" style="padding-top:10px;text-align:right;">
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th class="last">بواسطة </th>
				<th>إجمالي القيمة </th>
				<th>طريقة الدفع</th>
				<th>تاريخ البيع</th>
				<th>العميل </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
     <tbody> 
                <?php $x=0; if(!empty($data['saleslist'])){foreach($data['saleslist'] as $sale){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td><?php echo $sale->by; ?></td>
                    <td><?php echo $sale->total_value; ?></td>
                    <td><?php echo $sale->payment_method; ?></td>
                    <td><?php echo $sale->sell_date; ?></td>
                    <td><?php echo $sale->Clients->name; ?></td>
                    <td><?php echo $sale->id; ?></td>
                </tr>
                <?php $x++;}} ?>
                
            </tbody> 
            </table>
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit()" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="طباعة" alt="طباعة" ></a>
</div>

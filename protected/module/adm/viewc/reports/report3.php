<style>
th , td{text-align:center;}
.red td{color:#930002;font-weight:bold;}
</style>
<div class="span-20 printable last" style="padding-top:10px;text-align:right;">
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
                <th class="last">إنتهاء الصلاحية </th>
				<th>حد الطلب </th>
				<th>الوحدات المتاحة</th>
				<th>العبوات المتاحة</th>
				<th style="min-width:140px;">الصنف </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['storeslist'] as $store){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    
                    <td><?php echo $store->expire_date; ?></td>
                    <td><?php echo $store->Items->order_limit; ?></td>
                    <td><?php echo $store->unit; ?></td>
                    <td><?php echo $store->package; ?></td>
                    <td style="text-align:right;"><?php echo $store->Items->name; ?></td>
                    <td><?php echo $store->id; ?></td>
                </tr>
                <?php $x++;} ?>
                <?php $x=0; foreach($data['itemslist'] as $item){ ?>
                <tr class="table-row<?php echo $x%2; ?> red">
                    
                    <td>-</td>
                    <td><?php echo $item->order_limit; ?></td>
                    <td>0</td>
                    <td>0</td>
                    <td style="text-align:right;"><?php echo $item->name; ?></td>
                    <td><?php echo $item->id; ?></td>
                </tr>
                <?php $x++;} ?>
                
            </tbody> 
            </table>
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit()" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="طباعة" alt="طباعة" ></a>
</div>

<style>
th , td{text-align:center;}
</style>
<div class="span-20 printable last" style="padding-top:10px;text-align:right;">
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
                <th class="last">إنتهاء الصلاحية </th>
				<th>سعر البيع </th>
				<th>الوحدات المتاحة</th>
				<th>العبوات المتاحة</th>
				<th style="min-width:140px;">الصنف </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['storeslist'])){foreach($data['storeslist'] as $store){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    
                    <td><?php echo $store->expire_date; ?></td>
                    <td><?php echo $store->sell_price; ?></td>
                    <td><?php echo $store->unit; ?></td>
                    <td><?php echo $store->package; ?></td>
                    <td style="text-align:right;"><?php echo $store->Items->name; ?></td>
                    <td><?php echo $store->id; ?></td>
                </tr>
                <?php $x++;}}else{
                    ?>
                    <td colspan="6">لاتوجد أرصدة في المخازن</td>
                    <?php } ?>
                
            </tbody> 
            </table>
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit()" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="طباعة" alt="طباعة" ></a>
</div>

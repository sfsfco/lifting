<style>
th , td{text-align:center;}
</style>
<div class="span-20 printable last" style="padding-top:10px;text-align:right;">
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th>إجمالي التوريدات</th>
				<th>الموبايل</th>
				<th>الهاتف</th>
				<th>الإسم </th>
				<th class="first">الرقم</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['supplierslist'] as $supplier){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td><?php echo $supplier->total; ?></td>
                    <td><?php echo $supplier->mobile; ?></td>
                    <td><?php echo $supplier->phone1; ?></td>
                    <td>
                            <?php echo $supplier->name; ?>
                    </td>
                    <td><?php echo $supplier->id; ?></td>
                </tr>
                <?php $x++;} ?>
                
            </tbody> 
 </table>
</div>
<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit()" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="طباعة" alt="طباعة" ></a>
</div>

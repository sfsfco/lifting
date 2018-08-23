<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table th {min-width:80px;}
</style>
<?php if(isset($this->params[0])){echo $this->params[0];} ?>
<div style="direction:ltr;float:left;margin-right:30px;">
Store : 
<select name="filter-stockroom" id="filter-stockroom">
    <option value="0">All</option>
    <?php foreach($data['stockrooms'] as $stockroom){ ?>
    <option <?php echo($data['selected']==$stockroom->id)?"selected='selected'":" "; ?> value="<?php echo $stockroom->id; ?>"><?php echo $stockroom->name; ?></option>
    <?php } ?>
</select>
</div>

<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
                <th class="first">Date </th>
                <th>Transfare </th>
				<th>Price</th>
				<th>Avilable</th>
				<th>Store</th>
				<th style="min-width:140px;">Item </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['storeslist'])){foreach($data['storeslist'] as $store){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                        
                    <td><?php echo date('d-m-Y',strtotime($store->create_date)); ?></td>
                    <td><a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>stores/transfare/<?php echo $store->id; ?>" class="link">Transfare</a></td>
                    <td><?php echo $store->price; ?></td>
                    <td><?php echo $store->quantity; ?></td>
                    <td><?php echo $store->stockroom_name; ?></td>
                    <td><?php echo $store->Items->name; ?></td>
                    <td><?php echo $store->id; ?></td>
                </tr>
                <?php $x++;}}else{
                    ?>
                    <td colspan="6">No Stock</td>
                    <?php } ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
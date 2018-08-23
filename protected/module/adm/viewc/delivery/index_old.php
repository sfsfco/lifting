<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table th {min-width:76px;}
</style>
<div class="span-23 last" style="padding-top:10px;text-align:left;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>delivery/add" class="link">
        <h4 style="margin:0px;">
            <img style="margin-left:25px;" src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
             Add
        </h4>
    </a>
    
</div>

<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th  class="first">Delete</th>
                <th>WorkOrder No</th>
				<th >Delivered Date</th>
				<th >Delivered To</th>
				<th>Details</th>
				<th>client</th>
				<th>title</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['deliverylist'])){foreach($data['deliverylist'] as $delivery){ ?>
                <tr class="table-row<?php echo $x%2; ?> " >
                      <td>
                        <a id="del_<?php echo $delivery->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>delivery/delete/<?php echo $delivery->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                    </td>
                    <td>
                     <?php echo $delivery->workorder; ?>
                    </td>
                     <td>
                        <?php echo date('d-m-Y',strtotime($delivery->delivery_date));  ?>
                    </td>
                     <td>
                        <?php echo $delivery->delivery_to;  ?>
                    </td>
                     <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>delivery/details/<?php echo $delivery->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $delivery->client_name; ?></td>
                    <td><a href="<?php echo $data['formUrl']; ?><?php echo Doo::conf()->adminmod; ?>delivery/edit/<?php echo $delivery->id; ?>" class="link" ><?php echo $delivery->title; ?></a></td>
                    <td><?php echo $delivery->id; ?></td>
                </tr>
                <?php $x++;}} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
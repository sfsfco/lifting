<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-23 last" style="padding-top:10px;text-align:left;font-size:20px;">
    
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>services/add" class="link">
        <h4 style="margin:0px;">
            <img style="margin-left:25px;" src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
             Add
        </h4> 
    </a>
    
</div>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
                <th class="first">Number</th>
               	<th>Title</th>
                <th>Created By</th>
				<th class="last">Delete</th>
				
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; foreach($data['serviceslist'] as $line){ ?>
                <tr class="table-row<?php echo $x%2; ?>">
                    <td><?php echo $line->id; ?></td>
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>services/edit/<?php echo $line->id; ?>" class="link">
                            <?php echo $line->name; ?>
                        </a>
                    </td>
                    <td>
                        
                            <?php echo $line->username; ?>
                        
                    </td>
                    
                    <td>
                        <a id="del_<?php echo $line->id; ?>"  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>services/delete/<?php echo $line->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif" >
                        </a>
                    </td>
                </tr>
                <?php $x++;} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
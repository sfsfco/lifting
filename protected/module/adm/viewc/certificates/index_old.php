<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table th {min-width:76px;}
</style>
<div class="span-23 last" style="padding-top:10px;text-align:left;font-size:20px;">
  
  
    <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>certificates/add" class="link">
        <h4 style="margin:0px;">
            <img style="margin-left:25px;" src="<?php  echo $data['rootUrl']; ?>global/img/add.gif">
             Add
        </h4>
    </a>
  
  certificate type <select name="cert_type" class="cert_type">
                      <option value="all">all</option>
                      <option <?php if(isset($_SESSION['cert_type']) && $_SESSION['cert_type']=='work_certificate'){echo "selected='selected'";}?> value="work_certificate">work certificate</option>
                      <option <?php if(isset($_SESSION['cert_type']) && $_SESSION['cert_type']=='test_certificate'){echo "selected='selected'";}?> value="test_certificate">test certificate</option>
                  </select>  
  
</div>

<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th  class="first">Delete</th>
				<th>Edit</th>
				<th>Send</th>
				<th>Certificate Type</th>
				<th>Certificate Form</th>
				<th >Certificate Date</th>
				<th>Details</th>
				<th>workorder no.</th>
				<th>client</th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
                <?php $x=0; if(!empty($data['certificateslist'])){foreach($data['certificateslist'] as $certificate){ ?>
                <tr class="table-row<?php echo $x%2; ?> " >
                      <td>
                        <a id="del_<?php echo $certificate->id; ?>"    href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>certificates/delete/<?php echo $certificate->id; ?>" class="delet">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/delete.gif">
                        </a>
                    </td>
                      <td>
                       <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>certificates/edit/<?php echo $certificate->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/edit.png">
                        </a>
                      </td>
                      <td>
                       <a href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>certificates/send/<?php echo $certificate->id; ?>" class="link">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/replay.png">
                        </a>
                      </td>

                        <td><?php echo $certificate->certificat_type; ?></td>
                      <td><?php echo $certificate->certificate_form; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($certificate->test_date));  ?></td>
                      <td>
                        <a target="_blank" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>certificates/details/<?php echo $certificate->id; ?>">
                            <img src="<?php  echo $data['rootUrl']; ?>global/img/details.png">
                        </a>
                    </td>
                    <td><?php echo $certificate->workorder; ?></td>
                    <td><?php echo $certificate->client; ?></td>
                    <td><?php echo $certificate->work_id; ?></td>
                </tr>
                <?php $x++;}} ?>
                <?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
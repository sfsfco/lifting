<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>certificates/update" method="post">
<div class="span-9 ">Client</div>
<div class="span-15 last"><select name="client" id="client" class="required" onchange="getaddress(this.value);"><option value="<?php echo $data['certificate']->client; ?>"><?php echo $data['certificate']->client_name; ?></option><option value="">Select</option><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id; ?>"><?php echo $client->name; ?><?php } ?></select>
 Address : <input type="text" name="client_address" id="client_address" value="<?php echo $data['certificate']->client_address; ?>"  class="required wide" >
</div>
<div class="span-9 ">Work Order</div>
<div class="span-15 last"><select name="workorder" onchange="getitmes(this.value)" id="workorder" class="required wide"><option value="<?php echo $data['certificate']->workorder; ?>"><?php echo $data['certificate']->workorder_title; ?></option><option value="">Select</option><?php foreach($data['workorders'] as $workorder){ ?><option value="<?php echo $workorder->id ; ?>"><?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]</option><?php } ?></select></div>

<div class="span-9 ">Date </div>
<div class="span-15 last"><input type="text" name="test_date" id="test_date" class="date-pick required wide" value="<?php echo date('d-m-Y',strtotime($data['certificate']->test_date)); ?>"></div>

<div class="span-9 ">Test by </div>
<div class="span-15 last"><select name="test_by" id="test_by" class="required" ><option value="<?php echo $data['certificate']->test_by; ?>"><?php echo $data['certificate']->test_by_name; ?></option><option value="">Select</option><?php foreach($data['users'] as $user){ ?><option value="<?php echo $user->id; ?>"><?php echo $user->first_name." ".$user->last_name; ?><?php } ?></select></div>

<div class="span-9 ">Certificate Type : </div>
<div class="span-15 last">
    <select name="certificat_type" id="certificat_type" class="required" onchange="certificateform(this.value);" >
    <option value="<?php echo $data['certificate']->certificat_type; ?>"><?php echo $data['certificate']->certificat_type; ?></option>
        <option value="">Select</option>
        <option value="work_certificate">Work Certificate</option>
        <option value="test_certificate">Test Certificate</option>
    </select>
</div>
<div class="span-9 ">Certificate Form : </div>
<div class="span-15 last">
    <select name="certificate_form" id="certificate_form" class="required"  >
        <option value="<?php echo $data['certificate']->certificate_form; ?>"><?php echo $data['certificate']->certificate_form; ?></option>
        <option value="">Select</option>
    </select>
</div>

<div class="span-9 ">Date of Next Examination </div>
<div class="span-15 last"><input type="text" name="next_examination" id="next_examination" value="<?php echo $data['certificate']->next_examination; ?>" class="date-pick required wide"></div>


<div class="span-9 ">Magnet Type : </div>
<div class="span-15 last">
    <select name="magnet_type" id="magnet_type" class="" >
        <option value="<?php echo $data['certificate']->magnet_type; ?>"><?php echo $data['certificate']->magnet_type; ?></option>
        <option value="">Select</option>
        <option value="fixed_magnet">Fixed Magnet</option>
        <option value="electro_magnet">Electro Magnet</option>
    </select>
</div>
<div class="span-9 ">According To : </div>
<div class="span-15 last">
    <input type="text" name="according_to" id="according_to" value="<?php echo $data['certificate']->according_to; ?>"  class="required" >
</div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Identifcation No</td><td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>P.L</td>
			</tr>
			<?php $x=0;foreach($data['certificate_details'] as $certificate_details){$x++; ?>
             <tr><td colspan="5"><img style="float:right;" src="<?php echo Doo::conf()->APP_URL; ?>global/img/close.png" onclick="closetr(this)"></td></tr>
        <tr>
                <td><input type="text" name="idno_<?php echo $x; ?>" id="idno_<?php echo $x; ?>" value='<?php echo $certificate_details->idno; ?>' ></td>
                <td><input type="text" name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" value='<?php echo $x; ?>' ></td>
                <td><input type="text" name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" value="<?php echo $certificate_details->quantity; ?>" class="required" ></td>
                <td><textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="required"><?php echo $certificate_details->details; ?> </textarea></td>
                <td><input type="text" name="swl_<?php echo $x; ?>" id="swl_<?php echo $x; ?>" class="required" value="<?php echo $certificate_details->swl; ?>" ></td>
                <td><input type="text" name="pl_<?php echo $x; ?>" id="pl_<?php echo $x; ?>"  value="<?php echo $certificate_details->pl; ?>" ></td>
                
                <input type="hidden" name="id_<?php echo $x;?>" value="<?php echo $certificate_details->id; ?>">
                
                
                
			</tr>    
            <tr>
                            <td colspan="2">ORIGINAL CERTIFICATE NO</td>
                            <td>ORIGINAL CERTIFICATE DATE</td>
                            <td colspan="2">NAME OF CERTIFYING BODY</td>
                            <td>DATE OF LAST EXAMINATION</td>
                        </tr>                  
                        <tr>
                            <td colspan="2"><input type="text" name="original_cert_no_<?php echo $x; ?>" id="original_cert_no_<?php echo $x; ?>" value='<?php echo $certificate_details->original_cert_no; ?>' ></td>
                            <td><input type="text" name="original_cert_date_<?php echo $x; ?>" id="original_cert_date_<?php echo $x; ?>" value='<?php echo $certificate_details->original_cert_date; ?>'  class="date-pick"></td>
                            <td colspan="2"><input type="text" name="name_cert_<?php echo $x; ?>" id="name_cert_<?php echo $x; ?>" style="width:115px;" value="<?php echo $certificate_details->name_cert; ?>" ></td>
                            <td><input type="text" name="last_exam_<?php echo $x; ?>" id="last_exam_<?php echo $x; ?>"  class="date-pick" value="<?php echo $certificate_details->last_exam; ?>"  ></td>
                        </tr>                  
            <?php } ?>
		</table>
</div>

<input type="hidden" name="old_id" id="old_id" value="<?php echo $data['certificate']->id; ?>">
<div class="span-24 last" style="text-align:center"><input type="submit" value="Edit"></div>

</form>
</div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
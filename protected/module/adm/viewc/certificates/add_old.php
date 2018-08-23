<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<div class="span-24 last result" style="text-align:left;direction:ltr;">
<form name="form" id="form" action="<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>certificates/insert" method="post">
<div class="span-9 ">Client</div>
<div class="span-15 last"><select name="client" id="client" class="required" onchange="getaddress(this.value);"><option value="">Select</option><?php foreach($data['clients'] as $client){ ?><option value="<?php echo $client->id; ?>"><?php echo $client->name; ?><?php } ?></select>
 Address : <input type="text" name="client_address" id="client_address"  class="required wide" >
</div>
<div class="span-9 ">Work Order</div>
<div class="span-15 last"><select name="workorder" onchange="getitmes(this.value)" id="workorder" class="required wide"><option value="">Select</option><?php foreach($data['workorders'] as $workorder){ ?><option value="<?php echo $workorder->id ; ?>"><?php echo $workorder->id ; ?> : <?php echo $workorder->title ; ?> [<?php echo date('d-m-Y',strtotime($workorder->delivery_date)) ; ?>]</option><?php } ?></select></div>

<div class="span-9 ">Date </div>
<div class="span-15 last"><input type="text" name="test_date" id="test_date" class="date-pick required wide"></div>


<div class="span-9 ">Test by </div>
<div class="span-15 last"><select name="test_by" id="test_by" class="required" ><option value="">Select</option><?php foreach($data['users'] as $user){ ?><option value="<?php echo $user->id; ?>"><?php echo $user->first_name." ".$user->last_name; ?><?php } ?></select></div>

<div class="span-9 ">Date of Next Examination </div>
<div class="span-15 last"><input type="text" name="next_examination" id="next_examination" class="date-pick1 required wide"></div>

<div class="span-9 ">Magnet Type : </div>
<div class="span-15 last">
    <select name="magnet_type" id="magnet_type" class="" >
        <option value="">Select</option>
        <option value="fixed_magnet">Fixed Magnet</option>
        <option value="electro_magnet">Electro Magnet</option>
    </select>
</div>

<div class="span-9 ">Split Items : </div>
<div class="span-15 last">
    <input type="checkbox" name="split_items" id="split_items"   >
</div>

<div class="span-24 last" style="text-align:center">
        <table id="options-table">					
			<tr>
				<td>Identifcation No</td><td>Item</td><td>Qty</td><td>Description</td><td>S.W.L</td><td>P.L</td>
			</tr>
    
            <tr>
                <td colspan="6">
                    <table>
                    <tr>
                            <td colspan='2'>
                                Certificate Type : 
                                <select name="certificat_type_0" id="certificat_type_0" class="required"  onchange="certificateform(this);">
                                    <option value="">Select</option>
                                    <option value="work_certificate">Work Certificate</option>
                                    <option value="test_certificate">Test Certificate</option>
                                </select>
                            </td>
                            <td colspan='2'>
                                Certificate Form
                                <select name="certificate_form_0" id="certificate_form_0" class="required"  >
                                    <option value="">Select</option>
                                </select>
                            </td>
                            <td colspan='2'>
                                According To
                                <input type="text" name="according_to_0" id="according_to_0"  class="required" >
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="idno_0" id="idno_0" value='' ></td>
                            <td><input type="text" name="num_0" id="num_0" value='1' ></td>
                            <td><input type="text" name="quantity_0" id="quantity_0" class="required" ></td>
                            <td><textarea name="details_0" id="details_0" class="required"></textarea></td>
                            <td><input type="text" name="swl_0" id="swl_0" class="required"></td>
                            <td><input type="text" name="pl_0" id="pl_0" ></td>
                            <input type="hidden" name="packageunits_0" id="packageunits_0" value="1">
                        </tr>                  
                        <tr>
                            <td colspan="2">ORIGINAL CERTIFICATE NO</td>
                            <td>ORIGINAL CERTIFICATE DATE</td>
                            <td colspan="2">NAME OF CERTIFYING BODY</td>
                            <td>DATE OF LAST EXAMINATION</td>
                        </tr>                  
                        <tr>
                            <td colspan="2"><input type="text" name="original_cert_no_0" id="original_cert_no_0" value='' ></td>
                            <td><input type="text" name="original_cert_date_0" id="original_cert_date_0" value=''  class="date-pick"></td>
                            <td colspan="2"><input type="text" name="name_cert_0" id="name_cert_0" style="width:115px;" ></td>
                            <td><input type="text" name="last_exam_0" id="last_exam_0"  class="date-pick"></td>
                        </tr>                  
                    </table>
                </td>
            </tr>
            
		</table>
</div>

<div class="span-24 last" style="text-align:center"><input type="submit" value="Add"></div>

</form>
</div>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
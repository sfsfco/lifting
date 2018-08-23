<?php $x=0;foreach($data['items'] as $certificate_details){?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="col-md-12 col-sm-12 col-xs-12 text-right"><i class="fa fa-minus-circle" aria-hidden="true" onclick="closetr(this);"></i></div>
                                
                                    <?php if($data['type']=='add'){ ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-2 col-sm-2 col-xs-12">Certificate Type</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <select name="certificat_type_<?php echo $x; ?>" onchange="certificateformall(this);" id="certificat_type_<?php echo $x; ?>" class="select2_group form-control">
                                                <option value="">Select</option>
                                                <option value="work_certificate" >Work Certificate</option>
                                                <option value="test_certificate" >Test Certificate</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">Certificate Form</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <select name="certificate_form_<?php echo $x; ?>" id="certificate_form_<?php echo $x; ?>" class="select2_group form-control">
                                                
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">According To</div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input type="text" name="according_to_<?php echo $x; ?>" id="according_to_<?php echo $x; ?>" value="" class="form-control col-md-7 col-xs-12">
                                        </div>

                                    </div>
                                    <?php }?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-1 col-sm-1 col-xs-12 text-center">Identifcation No</div>
                                        <div class="col-md-2 col-sm-1 col-xs-12 text-center">Item</div>
                                        <div class="col-md-2 col-sm-1 col-xs-12 text-center">Qty</div>
                                        <div class="col-md-3 col-sm-7 col-xs-12 text-center">Description</div>
                                        <div class="col-md-2 col-sm-1 col-xs-12 text-center">S.W.L</div>
                                        <div class="col-md-2 col-sm-1 col-xs-12 text-center">P.L</div>
                                    </div>
                                    <div class=" <?php if($x==0){echo('first');} ?> options-table-item col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 item">
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input name="idno_<?php echo $x; ?>" id="idno_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"   type="text"   value="">
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input name="num_<?php echo $x; ?>" id="num_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  required="required" type="text"   value="<?php echo $x+1; ?>">
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input name="quantity_<?php echo $x; ?>" id="quantity_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12"  type="text" onkeyup="updatebill(this);"   value="<?php  echo $certificate_details->quantity; ?>">
                                            </div>
                                            <div class="col-md-7 col-sm-7 col-xs-12">
                                                <textarea name="details_<?php echo $x; ?>" id="details_<?php echo $x; ?>" class="form-control"><?php  echo $certificate_details->details; ?></textarea>
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input id="swl_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="swl_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $certificate_details->swl; ?>">
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input id="pl_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="pl_<?php echo $x; ?>" placeholder="" type="text" value="<?php  echo $certificate_details->pl; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                ORIGINAL CERT. NO
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                 <input id="original_cert_no_<?php echo $x; ?>" class="form-control col-md-7 col-xs-12" name="original_cert_no_<?php echo $x; ?>" placeholder="" type="text" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                ORIGINAL CERT. DATE
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="text" class="form-control has-feedback-left datepicker" name="original_cert_date_<?php echo $x; ?>" id="original_cert_date_<?php echo $x; ?>" aria-describedby="inputSuccess2Status4" value="">
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                NAME OF CERTIFYING BODY
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                 <input type="text" class="form-control  col-md-7 col-xs-12" name="name_cert_<?php echo $x; ?>" id="name_cert_<?php echo $x; ?>" value="">
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                DATE OF LAST EXAMINATION
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                 <input type="text" class="form-control has-feedback-left datepicker" name="last_exam_<?php echo $x; ?>" id="last_exam_<?php echo $x; ?>" aria-describedby="inputSuccess2Status4" value="">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" name="id_<?php echo $x;?>" value="<?php echo $certificate_details->id; ?>">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="ln_solid"></div>
                                    </div>
</div>
                                <?php $x++;} ?>
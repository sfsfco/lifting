<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.printElement.js"></script>

 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/my.css" type="text/css" media="screen, projection,print">
 <body>
    <div class="container showgrid">
        <div class="span-20 push-2  last printable result" style="text-align:left;direction:ltr;height:1120px;display:inline-block;">
        <!--start print-->
            <div class="span-20 last center">
            <div class="span-4" ><img style="height:120px;" src="<?php echo $data['rootUrl']; ?>global/uploads/logo_old.png"></div>
            <div class="span-12" >
                <h2 style="padding-top: 50px;font-weight: bolder;">REPORT OF THOROUGH EXAMINATION</h2>
            </div>
            <div class="span-4 last" ><img style="height:120px;" src="<?php echo $data['rootUrl']; ?>global/uploads/logo_old.png"></div>
            </div>
            <div class="span-20 last body">
            
            <div class="span-20 last center" style="margin-bottom:30px;">
                <h2 style="padding-top: 50px;font-weight: bolder;">AND / OR TEST OF LIFTING APPLIANCE OR ACCESSORY</h2>
                <b style="text-transform: uppercase;">STATUTORY INSTRUMENTS 1998 No. 23</b><br>
                The Lifting Operations and Lifting Equipment Regulations 1998<br>
                <b style="text-transform: uppercase;">STATUTORY INSTRUMENTS 1992 No. 3073</b><br>
                The Supply of Machinery (Safety) Regulations 1992<br>
                <b style="text-transform: uppercase;">STATUTORY INSTRUMENTS 1998 No. 2306</b></br>
                The Provision and Use of Work Regulations 1998
            </div>
            <div class="span-10" style="height:20px">CERTIFICATION NO: <b><?php echo $data['a7a']->id; ?></b></div><div class="span-10 last" style="height:20px">TESTER/EXAMINER: ENG. <b><?php echo $data['user']->first_name.' '.$data['user']->last_name;?></b></div>
            <div class="span-10" style="height:20px">QUALIFICATION: <b>ASNT LEVEL TWO</b> </div><div class="span-10 last" style="height:20px">DATE OF TEST/EXAMINATION: <b><?php echo date('d-m-Y',strtotime($data['a7a']->test_date));  ?></b></div>
            <div class="span-10" >TYPE OF CERTIFICATE: <b>LOAD TEST/ DPI </b> </div><div class="span-10 last">TESTED ACCORDING TO <b><?php echo $data['a7a']->according_to; ?></b></div>
            <div class="span-20 last center">
                <table class="pclass">
                    <thead> 
                        <tr> 
                            <th>IDENTIFICATION NO</th>
                            <th>QTY</th>
                            <th>DESCRIPTION OF EQUIPMENT</th>
                            <th>SWL</th>
                            <th>PROOF LOAD</th>
                            <th>DATE OF NEXT EXAMINATION</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
                        <tr>
                            <td><?php  echo $quotationsdetails->id_no; ?></td>
                            <td><?php  echo $quotationsdetails->quantity; ?></td>
                            <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                            <td><?php  echo $quotationsdetails->swl; ?></td>
                            <td><?php  echo $quotationsdetails->pl; ?></td>
                            <td><?php echo $data['a7a']->next_examination; ?></td>
                        </tr>
                        <?php $x++;} ?>
                    </tbody> 
                </table>
            </div>
            <div class="span-20 last ">
                <table class="pclass1">
                    <thead> 
                        <tr> 
                            <th colspan="3">NDT DETAILS</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>
                            <td>Procedure:</td><td>Equipment: VISUAL</td><td>Method: WET</td>
                        </tr>
                        <tr>
                            <td>Specification: DIN EN 571</td><td>Contrast Media: NPT16 WHITE PAINT</td><td>Inspector: Saad Mohamed</td>
                        </tr>
                         <tr>
                            <td>Material: STAINLESS STEEL</td><td>Indicator: DYE PENETRATE</td><td>Qualification: ASNT II</td>
                        </tr>
                         <tr>
                            <td colspan="3">
                                Results: 100% DYE PENETRATE INSPECTION WAS CARRIED OUT ON THE LIFTING POINTS WELDS OF THE ABOVE EQUIPMENT. NO INDICATIONS WERE NOTED AT THE TIME OF INSPECTION.  
                            </td>
                        </tr>
                    </tbody> 
                </table>
            </div>

            <div class="span-20 last center">
                <table class="pclass">
                    <thead> 
                        <tr> 
                            <th>PARTICULARS OF DEFECTS FOUND WHICH ARE, OR COULD, BECOME A DANGER TO PERSONS OR ‘NONE’</th>
                            <th>PARTICULARS OF ANY REPAIR, ALTERATION TO REMEDY DEFECT OR ‘NONE’</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>
                            <td>NONE</td><td>NONE</td>
                        </tr>
                    </tbody> 
                </table>
            </div>
             <div class="span-20 last center">
                <table class="pclass smallhead">
                    <thead> 
                        <tr> 
                            <th>NAME AND ADDRESS OF EQUIPMENT OWNER:</th>
                            <th>ADDRESS OF PREMISES WHERE TEST/EXAMINATION WAS HELD:</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>
                            <td><?php echo $data['quotation']->client_name; ?></td><td>SLS 10th OF RAMADAN WORK SHOP </td>
                        </tr>
                    </tbody> 
                </table>
            </div>
            <div class="span-20 last">
            <h4 style="font-weight: bolder;">The above report was compiled in accordance with the Lifting Operations and Lifting Regulations 1998, Regulation 9 (3) (a).</h4>
            I hereby certify the equipment descibed on this report has been thoroughly examined and is safe to operate subject to any defect noted above.
            All EC Declartions and details of any tests carried out on new supplied equipment are held on file by Specliased Lifting and are avilabel apon request.
            </div>
            <div class="span-20 last" style="padding-top:0px;">AUTHORISED SIGNATURE………...........................................</div>
            <div class="span-20 last">DATE: <?php echo date('d/m/Y',strtotime($data['a7a']->test_date)); ?></div>
            </div>
            
            
            <div class="span-20 last ">
                <div class="span-20 last center"><hr></div>
                <div class="span-10">
                    <div class="clear">Industrial District 10th of Ramdan Aziz Sadki, Cairo, Egypt</div>
                    <div class="clear">Tel +2 015 410281</div>
                    <div class="clear">Fax +2 015 410271</div>
                    <div class="clear">Hot Line +2 0111 90 66881</div>
                </div>
                <div class="span-10 last center">
                     <img style="height:92px;" src="<?php echo $data['rootUrl']; ?>global/img/1.png">
                     <img style="height:92px;" src="<?php echo $data['rootUrl']; ?>global/img/2.png">
                     <img style="height:92px;" src="<?php echo $data['rootUrl']; ?>global/img/3.png">
                </div>
                
            </div>
            <!--end print-->
            
        </div>
    </div>

<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Quotation Details')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
</div>

</body>
<script>
function printit(title){
    var r=confirm("print page header and footer ?");
if (r==true)
  {$('.printable').printElement({pageTitle:title});}
else
  {$('.print_h').html('');$('.printable').printElement({pageTitle:title});}

    
    } 
</script>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php  echo $data['rootUrl']; ?>global/js/jquery.printElement.js"></script>

 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/blueprint/screen.css" type="text/css" media="screen, projection,print">
 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/my.css" type="text/css" media="screen, projection,print">
 <link rel="stylesheet" href="<?php  echo $data['rootUrl']; ?>global/css/new.css" type="text/css" media="screen, projection,print">
 <body>
    <div class="container printable">
        <div class="span-20 push-2  last result" style="text-align:left;direction:ltr;display:inline-block;">
        <!--start print-->
            <div class="span-20 last center head-top">
            <div class="span-4" ><img style="height:120px;" src="<?php echo $data['rootUrl']; ?>global/uploads/logo_old.png"></div>
            <div class="span-12" >
                <h2  class='report-header'>REPORT OF THOROUGH EXAMINATION</h2>
            </div>
            <div class="span-4 last" ><img style="height:120px;" src="<?php echo $data['rootUrl']; ?>global/uploads/logo_old.png"></div>
            </div>
            <div class="span-20 last body">
            
            <div class="span-20 last center" style="margin-bottom:30px;">
                <h2 class='report-header1'>AND / OR TEST OF LIFTING APPLIANCE OR ACCESSORY</h2>
                <b style="text-transform: uppercase;">STATUTORY INSTRUMENTS 1998 No. 23</b><br>
                The Lifting Operations and Lifting Equipment Regulations 1998<br>
                <b style="text-transform: uppercase;">STATUTORY INSTRUMENTS 1992 No. 3073</b><br>
                The Supply of Machinery (Safety) Regulations 1992<br>
                <b style="text-transform: uppercase;">STATUTORY INSTRUMENTS 1998 No. 2306</b></br>
                The Provision and Use of Work Regulations 1998
            </div>
            <div class="span-10" style="height:25px">CERTIFICATION NO: <b><?php echo $data['cert']->id; ?></b></div><div class="span-10 last" style="height:25px">TESTER/EXAMINER: ENG. <b><?php echo $data['quotation']->create_by_name;?></b></div>
            <div class="span-10" style="height:25px">QUALIFICATION: <b>ASNT LEVEL TWO </b></div><div class="span-10 last" style="height:25px">DATE OF TEST/EXAMINATION: <b><?php echo date('d-m-Y',strtotime($data['cert']->test_date));  ?></b></div>
            <div class="span-10">TYPE OF CERTIFICATE: <b>VISUAL INSPECTION </b></div><div class="span-10 last">TESTED ACCORDING TO <b><?php echo $data['cert']->according_to; ?></b></div>
            <div class="span-20 last center">
                <table class="pclass f1">
                    <thead> 
                        <tr> 
                            <th>IDENTIFICATION NO</th>
                            <th>QTY</th>
                            <th>DESCRIPTION OF EQUIPMENT</th>
                            <th>SWL</th>
                            <th>DATE OF NEXT EXAMINATION</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php $x=0; foreach($data['quotationsdetails'] as $quotationsdetails){ ?>
                        <tr>
                            <td><?php  echo $quotationsdetails->idno; ?></td>
                            <td><?php  echo $quotationsdetails->quantity; ?></td>
                            <td style="text-align:left;"><?php  echo nl2br($quotationsdetails->details); ?></td>
                            <td><?php  echo $quotationsdetails->swl; ?></td>
                            <td><?php echo $data['cert']->next_examination; ?></td>
                        </tr>
                        <?php $x++;} ?>
                    </tbody> 
                </table>
            </div>
            <!--
            <div class="span-20 last center">
                <table class="pclass">
                    <thead> 
                        <tr> 
                            <th>ORIGINAL CERTIFICATE NO</th>
                            <th>ORIGINAL CERTIFICATE DATE</th>
                            <th>NAME OF CERTIFYING BODY</th>
                            <th>DATE OF LAST EXAMINATION</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>
                            <td>1</td><td>2</td><td>3</td><td>4</td>
                        </tr>
                    </tbody> 
                </table>
            </div>
            -->
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
            <div class="span-20 last stamp">
                <img src="<?php echo $data['rootUrl']; ?>global/images/stamp.png">
                </div>
            </div>
            
            <div class="span-20 last" style="padding-top:30px;">AUTHORISED SIGNATURE……….............<?php if(isset($_SESSION['member_username']['sign'])){ ?><img src="<?php  echo $data['rootUrl']; ?>global/uploads/users/<?php echo $_SESSION['member_username']['sign']; ?>" style="width:100px;"><?php } ?>..............................</div>
            <div class="span-20 last">DATE: <?php echo date('d/m/Y',strtotime($data['cert']->test_date)); ?></div>
            <div class="span-20 last ">
                <div class="span-20 last center"><hr></div>
                <div class="span-10">
                    <div class="clear">Industrial District 10th of Ramdan Aziz Sadki, Cairo, Egypt</div>
                    <div class="clear">Tel +2 015 410281</div>
                    <div class="clear">Fax +2 015 410271</div>
                    <div class="clear">Hot Line +2 0102 600 0110</div>
                </div>
                <div class="span-10 last center foot">
                     <img  src="<?php echo $data['rootUrl']; ?>global/img/1.png">
                     <img  src="<?php echo $data['rootUrl']; ?>global/img/2.png">
                     <img  src="<?php echo $data['rootUrl']; ?>global/img/3.png">
                </div>
                
            </div>
            <!--end print-->
            
        </div>
    </div>

<div style="width:100%;text-align:center;dispay:inline-block;">
    <a onclick="printit('Report Of Thorough Examination')" style="cursor:pointer;"><img src="<?php  echo $data['rootUrl']; ?>global/img/printl.png" title="Print" alt="Print" ></a>
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
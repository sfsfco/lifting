<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
      <div class="layout">
        <div class="lay-l"></div>
        <div class="lay-r">
          <div class="welcome">
            <h1><span><?php echo $data['welcome']->name; ?></span></h1>
            <?php echo str_replace('../global/','global/',$data['welcome']->details); ?>
          </div>
          <ul class="pop">
            <li>
              <h3 class="a"><?php echo $data['about']->name; ?></h3>
              <?php echo substr(str_replace('../global/','global/',$data['about']->details),0,300); ?>
              <a style="margin-top:56px;" href="<?php echo $data['rootUrl']; ?>about.html">More...</a> </li>
            <li>
              <h3><?php echo $data['shackle']->name; ?></h3>
              <?php echo substr(str_replace('../global/','global/',$data['shackle']->details),0,150); ?>
              <a href="<?php echo $data['rootUrl']; ?>articles/index/8">More...</a> </li>
            <li>
              <h3 class="b">Contact Us</h3>
              <?php //echo substr(str_replace('../global/','global/',$data['contact']->details),0,250); ?>
              <ul class="cona">

<li>

<p class="pa">United Kingdom Address</p>

<table border="0">

<tr>

<td>Address</td> <td>:</td> <td>14 Oakley Close Isleworth Tw7 4hz</td>

</tr>

<tr>

<td></td> <td></td> <td>Uk England</td>

</tr>

<tr>

<td>E-mail</td> <td>:</td> <td>sales@slslifting.co.uk</td>

</tr>


</table> 

</li>



<li>

<p class="pa">Egypt Address</p>

<table border="0">

<tr>

<td style="vertical-align:top">Address</td> <td style="vertical-align:top">:</td> <td>Factory No 7-8-9-10, Aziz Sedki Industrial district, </td>

</tr>

<tr>

<td></td> <td></td> <td>KILO 58 Cairo-Ismailia Road, El Sharkia, Egypt</td>

</tr>

<tr>

<td>Tel</td> <td>:</td> <td>(+20) 15 410 281</td>

</tr>

<tr>

<td>Fax</td> <td>:</td> <td>(+20) 15 410 271</td>

</tr>

<tr>

<td>Mobile</td> <td>:</td> <td>(+2010) 26 000 110</td>

</tr>


<tr>

<td>E-mail</td> <td>:</td> <td>Operation@sls-egypt.com</td>

</tr>

</table>

</li>


</ul>

              <a style="margin-top:0px;" href="<?php echo $data['rootUrl']; ?>contact-us.html">More...</a> </li>
            </li>
          </ul>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
<!-- Gallery -->
<div class="portfolio">
  <div class="portfolio-c">
    <div class="portfolio-l">
      <div class="portfolio-r">
        <div class="por-top"></div>
        <ul id="mycarousel" class="jcarousel-skin-tango">
            <?php foreach($data['photos'] as $photo){?>
            <li><a href="<?php echo $data['rootUrl']; ?>gallery/"><img src="<?php echo $data['rootUrl']; ?>global/uploads/photos/resized/<?php echo $photo->photo; ?>" /></a></li>
            <?php }?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>
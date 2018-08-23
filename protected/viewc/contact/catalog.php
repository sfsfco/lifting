<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/header.php"); ?>
<style>
#myform{text-align:left;}
#myform label{width:200px;display:inline-block;direction:ltr !important;margin:10px;vertical-align:top;}
#myform input{margin:10px;}
</style>
 <div class="layout">
        <div class="lay-l"></div>
        <div class="lay-r">
          <div class="top">
            <h3>Catalog</h3>
          </div>
           <ul class="cona">

<li>

<p class="pa">Download Our Products Catalog </p>



</li>



<li style="padding:7px;">

<a href="<?php echo $data['rootUrl']; ?>global/catalog/catalog1.pdf" target="_blank" style="font-weight:bold;">
  
  <span style="background:url(<?php echo $data['rootUrl']; ?>global/img/icons/filetype-pdf.png);width:15px;height:17px;display:inline-block;"></span>
   &nbsp; Lifting Accessories
</a>


</li>

<li style="padding:7px;">

<a href="<?php echo $data['rootUrl']; ?>global/catalog/catalog2.pdf" target="_blank" style="font-weight:bold;">
  
  <span style="background:url(<?php echo $data['rootUrl']; ?>global/img/icons/filetype-pdf.png);width:15px;height:17px;display:inline-block;"></span>
   &nbsp; Marine Accessories
</a>


</li>

<li style="padding:7px;">

<a href="<?php echo $data['rootUrl']; ?>global/catalog/catalog3.pdf" target="_blank" style="font-weight:bold;">
  
  <span style="background:url(<?php echo $data['rootUrl']; ?>global/img/icons/filetype-pdf.png);width:15px;height:17px;display:inline-block;"></span>
   &nbsp; Steel Fabrication
</a>


</li>


</ul>

<br />

        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>


  
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>

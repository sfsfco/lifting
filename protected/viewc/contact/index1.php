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
            <h3>Contact Us</h3>
          </div>
           <form method="post" name="contact" id="myform" action="<?php echo $data["formUrl"]; ?>contact/send/" style="direction:rtl;">
           <input type="text" id="name" name="name" class="required input_field" required="required " />
           <label for="author">Name:</label> 
           <div class="clr"></div>
           <input type="email" class="validate-email required input_field" name="email" id="email" required="required " />
           <label for="email">Email:</label>
           <div class="clr"></div>
           <input type="text" class="validate-subject required input_field" name="subject" id="subject" required="required "/>
           <label for="subject">Address:</label>
           <div class="clr"></div>
           <textarea id="message" name="message" rows="0" cols="0" class="required" required="required " style="height:85px;"></textarea>
           <label for="text">Message:</label>
           <div class="clr"></div>
           <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_r" />
           </form>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>


  
<?php include_once(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/footer.php"); ?>

<div class="footer">
  <div class="footer-in">
    <p> All Rights Reserved To SLS © 2012 <br />
      Design & Development By <a href="http://www.indicatorweb.com" target="_blank">INDICATOR WEB</a> </p>
    <ul class="foot">
      <li><a href="<?php echo $data['rootUrl']; ?>index.html">Home</a></li>
      <li><span>|</span></li>
      <li><a href="<?php echo $data['rootUrl']; ?>about.html">About Us</a></li>
      <li><span>|</span></li>
      <li><a href="<?php echo $data['rootUrl']; ?>our-services.html">Our Services</a></li>
      <li><span>|</span></li>
      <li><a href="<?php echo $data['rootUrl']; ?>gallery.html">Gallery</a></li>
      <li><span>|</span></li>
      <li><a href="<?php echo $data['rootUrl']; ?>contact-us.html">Conatct Us</a></li>
    </ul>
    <div class="clr"></div>
    <form method="post" action="<?php echo $data['rootUrl']; ?>maillist/add">
      <input type="text" value="Enter Name" name="author" />
      <input type="text" value="Enter E-mail" name="email" />
      <input type="submit" value="Subscribe" />
    </form>
  </div>
</div>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
</body>
</html>

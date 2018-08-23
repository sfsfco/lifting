</div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Developed and Designed by <a target="_blank" href="#"><img src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>build/images/keen-deer.png"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>vendors/switchery/dist/switchery.min.js"></script>
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>ajaxupload/ajaxfileupload.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>build/js/custom.min.js"></script>
<script>
function ajaxFileUpload(v,type,place)
  {

    $("#loading")
    .ajaxStart(function(){
      $(this).show();
    })
    .ajaxComplete(function(){
      $(this).hide();
    });

    $.ajaxFileUpload({
                url:"<?php echo Doo::conf()->APP_URL.Doo::conf()->membermod; ?>"+type+"/upload",
        secureuri:false,
        fileElementId:v,
        dataType: 'json',
        data:{name:'logan', id:'id' ,folder:'photo'},
        success: function (data, status)
        {
          if(typeof(data.error) != 'undefined')
          {
            if(data.error != '')
            {
              alert(data.error);
            }else
            {
                            alert('File Uploaded');
               $('.loaded'+place).html("<span class='deletcross' id='"+data.msg+"' ></span><img class='aaa' id='img_"+data.msg+"' src='<?php  echo Doo::conf()->APP_URL; ?>global/uploads/"+type+"/"+data.msg+"' style='width:100px;'>");
               $('#'+place).val(data.msg);
            }
          }
        },
        error: function (data, status, e)
        {alert(e);}
      }
    )

    return false;


  }

  function fullscreen(){
    var elem = document.getElementById("right_col");
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen();
    }
  }

</script>
  </body>
</html>
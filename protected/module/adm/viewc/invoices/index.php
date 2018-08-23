<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<!-- Datatables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

<link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />


<style>
        .dt-button.delete_class{color: #FFF;background: #d9534f;}
        .dt-button.delete_class:hover{color: #FFF !important;background: #e86d69 !important;}
        .dt-button.buttons-excel.buttons-flash,.dt-button.buttons-pdf.buttons-flash{color: #FFF;background: #5cb85c;}
        .dt-button.buttons-excel.buttons-flash:hover,.dt-button.buttons-pdf.buttons-flash:hover{color: #FFF;background: #33c733;}
        tr.selected{
                background-color:#dadada !important;
        }
</style>


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $data['title']; ?></h3>
            </div>
         
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

<?php play::display_message(); ?>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo $data['title']; ?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            Add and check your links from this panel
                        </p>
                        <table id="datatable-info" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Serial</th>
                                    <th>Delivery Date</th>
                                    <th>Client</th>
                                    <th>Po</th>
                                    <th>Qutation</th>
                                    <th>Paid</th>
                                    <th>Invoice Date</th>
                                    <th>Oprations</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.26.6/js/jquery.tablesorter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>


        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->

        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->

        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


        <script type="text/javascript" src="<?php echo Doo::conf()->APP_URL.'global/admin/'; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script>

        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
            var table = $('#datatable-info').DataTable({
                                "initComplete": function(settings, json) {
                                    /***Run after datatables loading ****/
                                    $( ".detect" ).on( "click", function() {
                                        var x= $(this);
                                        x.children('i').attr('class','fa fa-refresh fa-spin');
                                        setTimeout(function(){
                                            $.get(x.attr('href'), function(res){
                                                if(res=='0'){
                                                    x.attr('title','safe');
                                                    x.children('i').attr('class','fa fa-check green');
                                                }else{
                                                    x.attr('title','spam');
                                                    x.children('i').attr('class','fa fa-close red');
                                                }
                                            });
                                        },1000);

                                        return false;
                                    });
                                    $(".fbox").fancybox({
                                        openEffect  : 'elastic',
                                        closeEffect : 'elastic',
                                        padding : 0,
                                        helpers : {
                                            title : {
                                                 type : 'float'
                                            }
                                        }
                                    });

                                    

                               
                            /****************/
                              },
                "processing":true,
                "serverSide":true,
                "drawCallback": function( settings ) {
                    if ($(".js-switch")[0]) {
                                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                                elems.forEach(function (html) {
                                    var switchery = new Switchery(html, {
                                        color: '#26B99A',
                                        secondaryColor: '#dfdfdf'
                                    });
                                });
                            }
                            
                            
                             var changeCheckbox = document.querySelectorAll('.js-switch')
                                , changeField = document.querySelector('.js-check-change-field');

                            $.each( changeCheckbox, function(key , va) {
                              
                                  va.onchange = function() {
                                   
                                        $.fancybox.open({
                                            href: "<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices/edit/"+va.id,
                                            type: "ajax",
                                            afterClose: function(){table.draw();},
                                            width: "100%"
                                    
                                        });
                                   

                                    

                                  };
                            });
                          
                             
                            
                },
                "ajax": {
                    url:"<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices/index/?load=1",
                    type:"post",
                    },
                select: true,
                "order": [[ 0, 'desc' ]],
                "oSearch": {"sSearch": "<?php echo (isset($_GET['search']))?$_GET['search']:''; ?>"},
                columnDefs: [
                  { targets: 'no-sort', orderable: false }
                ],
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50 ],
                    [ '10 rows', '25 rows', '50 rows' ]
                ],
                buttons: [
                {
                        text: '<i class="fa fa-plus-circle"></i> ADD NEW',
                        action: function ( e, dt, node, config ) {
                            window.location.href = "<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices/add";
                        },
                        className:'add-blue'
                    },
                    'pageLength',
                    'selectAll',
                    'selectNone',
                    'excel',
                     'pdf',

                     {
                        text: 'Delete',
                        action: function ( e, dt, node, config ) {
                            if(confirm("Remove This Record (s) ? ")==true){
                                table.rows('.selected').remove().draw( false );
                                    var ids = [];
                                    $('.selected').each(function(){
                                        ids.push($(this).find('.ids').html());
                                    });
                                    var ids_string = ids.toString();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo Doo::conf()->APP_URL.Doo::conf()->adminmod; ?>invoices/index/?load=1",
                                        data: {data_ids:ids_string},
                                        success: function(result) {
                                            table.draw(); // redrawing datatable
                                        },
                                        async:false
                                    });

                            }
                        },
                        className:'delete_class'
                    }
                ],
                language: {
                    buttons: {
                        selectAll: "Select All",
                        selectNone: "Select None",
                        excel: "Excel",
                        pdf: "Pdf",

                    }
                }
            });

            $('#datatable-info tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');

            } );
        
            

        } );
        $('#datatable-info tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');

            } );
        function updateajax(){
            
        $values=$('#myform-ajax').serialize();
        $url = $('#myform-ajax').attr('action');
        
         $.ajax({
            url: $url, 
            cache: false,
                type:'post',
                data:$values,
            success: function(html){
                    
                }
            });    
            $.fancybox.close();

        return false;
        }
    </script>

<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>
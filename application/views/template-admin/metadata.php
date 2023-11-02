<meta charset="UTF-8">
<title>
<?php
    $ci = get_instance(); // CI_Loader instance
    $ci->load->config('session');
    echo $ci->config->item('app_name');

    $ext_ = '.min';
?>
</title>
<link rel="shortcut icon" href="<?php echo base_url();?>media/dist/img/favicon.ico">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.2 -->
<link href="<?php echo base_url();?>media/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>media/bootstrap/css/bootstrap_custom.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo base_url();?>media/dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="<?php echo base_url();?>media/dist/css/ionicons.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url();?>media/dist/css/USDI.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>media/dist/css/magnum_custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>media/dist/css/animated.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link href="<?php echo base_url();?>media/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url();?>media/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<link href="<?php echo base_url();?>media/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- CHOSEN -->
<link href="<?php echo base_url();?>media/plugins/chosen/chosen.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>media/plugins/chosen/chosenIcon.css" rel="stylesheet" type="text/css" />
<!-- datepicker -->
<link href="<?php echo base_url();?>media/plugins/datepicker/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>media/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- timepicker -->
<link href="<?php echo base_url();?>media/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<!-- validator -->
<!-- fullCalendar 2.2.5-->
<link href="<?php echo base_url();?>media/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>media/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
<!-- material loader -->
<link href="<?php echo base_url();?>media/plugins/materialloader/materialPreloader.css" rel="stylesheet" type="text/css" />
<!-- toastr -->
<link href="<?php echo base_url();?>media/plugins/toastr/toastr.css" rel="stylesheet" type="text/css" />
<!--appendgrid-->
<link href="<?php echo base_url();?>media/plugins/appendgrid/appendGrid.css" rel="stylesheet" type="text/css" />
<!--sweetalert-->
<link href="<?php echo base_url();?>media/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url();?>media/plugins/jQuery/jQuery-2.1.3<? echo $ext_?>.js"></script>
<script src="<?php echo base_url();?>media/plugins/jQuery/jquery-migrate-1.2.1<? echo $ext_?>.js"></script>
<script src="<?php echo base_url();?>media/plugins/jQueryUI/jquery-ui-1.10.3<? echo $ext_?>.js"></script>
<!-- user agent -->
<script src="<?php echo base_url();?>media/plugins/useragent/ua-parser.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url();?>media/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url();?>media/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>media/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>media/dist/js/demo.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>media/plugins/datatables/jquery.dataTables<? echo $ext_?>.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/datatables/dataTables.bootstrap<? echo $ext_?>.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/datatables/fnReloadAjax<? echo $ext_?>.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/datatables/dataTables.fixedColumns.js" type="text/javascript"></script>
<!-- slimscroll -->
<script src="<?php echo base_url();?>media/plugins/slimScroll/jquery.slimscroll.js" type="text/javascript"></script>
<!-- chosen -->
<script src="<?php echo base_url();?>media/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/chosen/chosenIcon.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/hierarcial-select/jQuery.hierarcial-select.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>media/plugins/daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- timepicker -->
<script src="<?php echo base_url();?>media/plugins/timepicker/bootstrap-timepicker<? echo $ext_?>.js" type="text/javascript"></script>
<!-- validator -->
<script src="<?php echo base_url();?>media/plugins/validator/bootstrapValidator<? echo $ext_?>.js" type="text/javascript"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url();?>media/plugins/fullcalendar/moment<? echo $ext_?>.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/fullcalendar/fullcalendar<? echo $ext_?>.js" type="text/javascript"></script>
<!-- sorting -->
<script src="<?php echo base_url();?>media/plugins/sorting/jquery.mjs.nestedSortable.js" type="text/javascript"></script>
<!-- autonumeric -->
<script src="<?php echo base_url();?>media/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script>
<!-- wyswyg -->
<script src="<?php echo base_url();?>media/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- flot -->
<script src="<?php echo base_url();?>media/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<!--appendgrid-->
<script src="<?php echo base_url();?>media/plugins/appendgrid/appendGrid.js" type="text/javascript"></script>

<!-- fileupload -->
<script src="<?php echo base_url();?>media/plugins/fileupload/jquery.form.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/fileupload/max.upload.js" type="text/javascript"></script>

<!-- blockui -->
<script src="<?php echo base_url();?>media/plugins/blockui/jquery.blockUI.js" type="text/javascript"></script>
<!-- toastr -->
<script src="<?php echo base_url();?>media/plugins/toastr/toastr.js" type="text/javascript"></script>

<!-- sweetalert -->
<script src="<?php echo base_url();?>media/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

<!-- fusion chart -->
<?php if(@$use_fusionchart){?>
<script src="<?php echo base_url();?>media/plugins/fusioncharts-suite-xt/js/fusioncharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/fusioncharts-suite-xt/js/fusioncharts-jquery-plugin.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/fusioncharts-suite-xt/js/fusioncharts.charts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/plugins/fusioncharts-suite-xt/js/themes/fusioncharts.theme.fint.js" type="text/javascript"></script>
<?php } ?>
<script type="text/javascript">
	var parser_browser = new UAParser();
    if((parser_browser.getResult().browser.name)!='Firefox' && (parser_browser.getResult().browser.name)!='Chrome'){
        alert("browser "+parser_browser.getResult().browser.name+" yang anda gunakan adalah versi lama silakan perbarui dahulu browser anda.");
        window.location="//www.mozilla.org/en-US/firefox/new/";
    }
	$(document).ready(function(){
    	$('.auto_numeric').autoNumeric('init');
    })
</script>

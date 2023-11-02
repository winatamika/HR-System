<script type="text/javascript">
    $(document).ready(function(){
        $("#role_wrap").click(function(){
            return false;
        })

        $(".selectHierarchy").selectHierarchy();
        
        $(".input_select").chosen({
            disable_search_threshold: 5,
            no_results_text: "Maaf, data tidak ditemukan..",
            width: "100%",
            search_contains: true,
            // max_selected_options: 5,
            placeholder_text_single: "Pilih...",
        });

        $(".icon_select").chosenIcon({
            disable_search_threshold: 20,
            no_results_text: "Maaf, data tidak ditemukan..",
            width: "100%",
            // max_selected_options: 5,
            placeholder_text_single: "Pilih...",
        });

        $('.datetimepicker_normal').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            toggleActive: true,
        });

        $('.datetimepicker_normal_multi').datepicker({
            format: 'dd/mm/yyyy',
            toggleActive: true,
            multidate: true,
            clearBtn: true,
            daysOfWeekDisabled: [0,6],
        });

        $('.datetimepicker_bulantahun').datepicker({
            startView: 'decade',
            minViewMode: 'months',
            format: 'mm/yyyy',
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });

        $('.datetimepicker_bulantahun_01').datepicker({
            startView: 'decade',
            minViewMode: 'months',
            format: '01/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });

        $('.datetimepicker_tahun').datepicker({
            startView: 'decade',
            minViewMode: 'years',
            format: 'yyyy',
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        });

        $('.daterangepicker_ele').daterangepicker();

        $('.input-daterange').datepicker({
            format: 'dd/mm/yyyy',
            clearBtn: true,
            daysOfWeekDisabled: "0,6",
            autoclose: true
        });

        $('.datepicker_inline_0').datepicker({
            daysOfWeekDisabled: "0,6",
            todayHighlight: true,
            toggleActive: true
        });

        $('.datepicker_inline_1').datepicker({
            daysOfWeekDisabled: "0,6",
            todayHighlight: true,
            startDate: '+32d',
            toggleActive: true
        });

        $('.datepicker_inline_2').datepicker({
            daysOfWeekDisabled: "0,6",
            todayHighlight: true,
            startDate: '+64d',
            toggleActive: true
        });

        $('.datepicker_inline_3').datepicker({
            daysOfWeekDisabled: "0,6",
            todayHighlight: true,
            startDate: '+96d',
            toggleActive: true
        });

        $('.timepicker').timepicker({
            showInputs: false,
            showMeridian: false,
            showSeconds: true,
            minuteStep:1,
            defaultTime:""
        });

        $('.form-input-btn-add').click(function() {
            show_form_input("#"+$(this).parents(".box-primary,.box-form").data('id'));
            clear_form("#"+$(this).parents(".box-primary,.box-form").data('id'));
        })

        $('.form-input-btn-cancel').click(function() {
            hide_form_input("#"+$(this).parents(".box-primary,.box-form").data('id'));
        })

        var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        $back_to_top = $('#to-top');
        $(window).scroll(function(){
            ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        });
        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0 ,
                }, scroll_top_duration
            );
        });

        $('.checkAlltogle').click(function(event) {
            if(this.checked) {
                $('#'+$(this).parents("table").attr('id')+' :checkbox').each(function() {
                    this.checked = true;
                });
            }
            else{
                $('#'+$(this).parents("table").attr('id')+' :checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('#role_active input[type="radio"]').change(function(){
            $.ajax({
                url:'<? echo base_url()."admin-rbac/rbac_user/change_role_active"?>',
                type: 'POST',
                data:"role_active="+$(this).val()+"&redirect_url=<? echo urlencode("http://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}")?>",
                dataType: 'json',
                success:function(data){
                    //console.log(data);
                    catch_expired_session(data);
                    $.blockUI({ message: "<h4>system was changing role...</h4>" });
                    if(data.submit=='1'){
                        setTimeout($.unblockUI, 3000);
                        window.location.href = data.link;
                    }
                    else{
                        alert(data.error);
                    }
                }
            });
        });

        var tablex = $('#<? echo (isset($table_id)?$table_id:"")?>').dataTable();
        $('#<? echo (isset($table_id)?$table_id:"")?>_wrapper .dataTables_filter input').attr('placeholder','Quick Search...');
        $('#<? echo (isset($table_id)?$table_id:"")?>_wrapper .dataTables_filter label').css('float','none').css('width','98.6%');
        $('#<? echo (isset($table_id)?$table_id:"")?>_wrapper .dataTables_filter input').css('width','100%');
        $('#<? echo (isset($table_id)?$table_id:"")?>_wrapper .dataTables_filter input').unbind();
        $('#<? echo (isset($table_id)?$table_id:"")?>_wrapper .dataTables_filter input').bind('keyup', function(e) {
            if(e.keyCode == 13) {
                tablex.fnFilter(this.value);
            }
        });
        $('.dataTables_filter input').bind('click', function(e) {
            $(this).css('width','100%');
            $(this).select();
        });
        $('.dataTables_filter input').bind('blur', function(e) {
            $(this).css('width','100%');
        });
    });

    function clear_form(form_id){
        if ( $(form_id+" .form-input-data").is( "form" ) ) {
            $(form_id+" .form-input-data")[0].reset();
            $('.input_select').trigger('chosen:updated');
            $(form_id+" .form-input-data").data('bootstrapValidator').resetForm();
        }
        else{
            $('.input_select').trigger('chosen:updated');
        }
    }

    function show_form_input(form_id){
        $(form_id+" .form-input-btn-add").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-add").addClass("animated form-hide");
        $(form_id+" .form-input-btn-delete").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-delete").addClass("animated form-hide");
        $(form_id+" .form-input-btn-verifikasi").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-verifikasi").addClass("animated form-hide");
        $(form_id+" .form-input-btn-unverifikasi").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-unverifikasi").addClass("animated form-hide");
        $(form_id+" .form-input-btn-export").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-export").addClass("animated form-hide");
        $(form_id+" .form-input-btn-reload").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-reload").addClass("animated form-hide");
        $(form_id+" .form-input-btn-closing").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-closing").addClass("animated form-hide");
        $(form_id+" .form-input-btn-unclosing").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-unclosing").addClass("animated form-hide");
        $(form_id+" .form-input-btn-auto_rev").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-auto_rev").addClass("animated form-hide");
        $(form_id+" .form-input-btn-search").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-search").addClass("animated form-hide");
        $(form_id+" .form-input-date-filter").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-date-filter").addClass("animated form-hide").css('display','none');
        $(form_id+" .form-input-btn-cancel").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-cancel").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-save").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-save").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-valid").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-valid").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-unvalid").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-unvalid").addClass("form-hide animated fadeInLeft");
        $(form_id+" .form-input-btn-active").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-active").addClass("animated form-hide");

        $(form_id+" .form-input-data").slideDown('slow');
        $(form_id+" .form-input-data").removeClass("form-hide form-show animated fadeOutRight fadeInRight");
        $(form_id+" .form-input-data").addClass("form-show animated fadeInRight");
        $(form_id+" .table-wraper").slideUp('slow');
    }
    function hide_form_input(form_id){
        $(form_id+" .form-input-btn-add").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-add").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-delete").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-delete").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-verifikasi").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-verifikasi").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-unverifikasi").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-unverifikasi").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-export").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-export").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-reload").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-reload").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-closing").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-closing").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-unclosing").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-unclosing").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-auto_rev").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-auto_rev").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-btn-search").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-search").addClass("form-show animated fadeInLeft");
        $(form_id+" .form-input-date-filter").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-date-filter").addClass("form-show animated fadeInLeft").css('display','inline-block');
        $(form_id+" .form-input-btn-cancel").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-cancel").addClass("animated form-hide");
        $(form_id+" .form-input-btn-save").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-save").addClass("animated form-hide");
        $(form_id+" .form-input-btn-valid").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-valid").addClass("animated form-hide");
        $(form_id+" .form-input-btn-unvalid").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-unvalid").addClass("animated form-hide");
        $(form_id+" .form-input-btn-active").removeClass("animated fadeInLeft form-hide form-show");
        $(form_id+" .form-input-btn-active").addClass("animated form-hide");

        $(form_id+" .form-input-data").removeClass("form-hide form-show animated fadeOutRight fadeInRight");
        $(form_id+" .form-input-data").addClass("animated fadeOutRight");
        $(form_id+" .form-input-data").slideUp('slow');
        $(form_id+" .table-wraper").slideDown('slow');
    }

    function RefreshTable(tableId, tolast){
        table = $(tableId).dataTable();
        if (tolast=='1') {
            table.fnPageChange( 'last' );
        }
        else if (tolast=='2') {
            table.fnPageChange( 'first' );
        }
        else{
            table.fnDraw(false);
        }
    }

    function RefreshTableUrl(tableId, urlData, tolast){
        $.getJSON(urlData, null, function(json){
            table = $(tableId).dataTable();
            oSettings = table.fnSettings();
            table.fnClearTable(this);
            for (var i=0; i<json.aaData.length; i++){
                table.oApi._fnAddData(oSettings, json.aaData[i]);
            }
            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
            table.fnDraw(false);
            if (tolast=='1') {
                table.fnPageChange( 'last' );
            }
            else if (tolast=='2') {
                table.fnPageChange( 'first' );
            }
        });
    }

    function fnGetSelected( oTableLocal ){
        return oTableLocal.$('tr.selected');
    }

    function callout(form,class_wraper,ico_text_info,text_info,text_info_detail,time_in,time_out){
        setTimeout(function(){
            $('#'+form+' .callout').slideDown('slow');
            $('#'+form+' .callout').removeClass('callout-success callout-danger');
            $('#'+form+' .callout').addClass(class_wraper);
            $('#'+form+' .callout .fa-icon').removeClass('fa-check fa-exclamation-circle');
            $('#'+form+' .callout .fa-icon').addClass(ico_text_info);
            $('#'+form+' .callout #text-info').html(text_info);
            $('#'+form+' .callout #text-info-detail').html(text_info_detail);
            setTimeout(function(){
                $('#'+form+' .callout').slideUp('slow');
            },time_out);
        },time_in);
    }

    function requestFullScreen() {
        var el = document.body;
        // Supports most browsers and their versions.
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullScreen;
        if (requestMethod) {
            // Native full screen.
            requestMethod.call(el);
        }
        else if (typeof window.ActiveXObject !== "undefined") {
            // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

    function toggleFullScreen(ele) {
        if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            }
            else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            }
            else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
            $(ele).find("i").removeClass('fa-expand fa-compress');
            $(ele).find("i").addClass('fa-compress');
        }
        else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            }
            else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            }
            else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
            $(ele).find("i").removeClass('fa-expand fa-compress');
            $(ele).find("i").addClass('fa-expand');
        }
    }

    function catch_expired_session(data){
    	try {
    		if(data.submit == 403) {
    			location.reload();
    		}
    	} 
        catch(e) {
    		return;
    	}
    }

    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top + 'px'
        }, 'slow');
        return this;
    }

    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": false,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "linear",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
</script>

<script type="text/javascript">
    function onReady(callback) {
        var intervalID = window.setInterval(checkReady, 2000);

        function checkReady() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalID);
                callback.call(this);
            }
        }
    }

    function show(id, value) {
        if (value) {
            $("#"+id).fadeIn("slow");
        }
        else{
            $("#"+id).fadeOut("slow");   
        }
    }

    onReady(function () {
        show('loading-full', false);
    });
</script>

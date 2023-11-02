<div class="row">
    <div class="col-lg-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header box-header-main" style="padding-bottom:0px;">
                <h3 class="box-title">
                    <div class="col-lg-12 no-padding">
                        <div class="form-input-date-filter" style="width: 322px; display: inline-block;">
                            <small id="countOvertime" class="label label-success label-flat" style="display: inline-block; border-radius: 0px; margin-right: 9px; font-size: 14px; padding: 10px 15px; min-width: 64px;"></small>
                            <div style="width: 192px;display: inline-block;vertical-align: top;">
                                <div class="input-group">
                                    <div class="input-group-addon" style="padding: 0px 22px;">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" style="text-align: center; font-size: 17px; letter-spacing: 7px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; cursor: pointer;" id="month_overtime" name="month_overtime" placeholder="" value="<? echo date('m/Y')?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right form-input-btn-reload" onclick="load_search('search-form','1')"><i class="fa fa-fw fa-refresh"></i> Reload</button>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right form-input-btn-search" onclick="open_modal('search-form')"><i class="fa fa-fw fa-filter"></i> Filter</button>
                        <?php if($this->auth->hasPrivilege("DeleteClaimOvertime")){?><button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-delete form-show animated fadeInLeft" style="margin-right: 10px;"><i class="fa fa-fw fa-times-circle"></i> Delete</button><?php }?>
                        <?php if($this->auth->hasPrivilege("AddClaimOvertime")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add form-show animated fadeInLeft"><i class="fa fa-fw fa-file-o"></i> Add</button><?php }?>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Close</button>
                        <?php if($this->auth->hasPrivilege("AddClaimOvertime") || $this->auth->hasPrivilege("EditClaimOvertime")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button><?php }?>
                    </div>
                </h3>
            </div><!-- /.box-header -->

            <div id="search-form" style="display:none;">
                <div class="box-header" style="padding-bottom:0px;">
                    <h3 class="box-title">
                        <div class="btn-group btn-block">
                            <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-search-cancel" onclick="close_modal('search-form')"><i class="fa fa-fw fa-reply"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right form-input-btn-search-search-all" onclick="load_search_all('search-form')"><i class="fa fa-fw fa-bars"></i> Show All</button>
                            <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right form-input-btn-search-search" onclick="load_search('search-form','all')"><i class="fa fa-fw fa-search"></i> Search</button>
                        </div>
                    </h3>
                </div>
                <form role="form" id="form-search" style="z-index: 1009;">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="input_select form-control" name="input[approve_status]" id="s_approve_status">
                                        <option></option>
                                        <? echo $approve_status;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <form role="form" class="form-input-data animated form-hide" style="z-index: 1009;">
                <input type="text" style="display:none;" id="id" name="id" value=""/>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Date for</label>
                                <input type="text" class="form-control field_disable" id="date_claim" name="date_claim" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Reason</label>
                                <input type="text" class="form-control field_disable" id="reason" name="reason" placeholder="" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Total Time</label>
                                <input type="text" class="form-control field_disable" id="total_claim" name="total_claim" readonly="" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%;" value="00:00:00" />
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Notes</label>
                                <input type="text" class="form-control field_disable" id="notes" name="notes" placeholder="" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" id="time_claim_wrap">
                            <label>Overtime Claim</label>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <select class="input_select form-control cmb_overtime field_disable" id="id_overtime1" name="id_overtime[]">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group bootstrap-timepicker">
                                        <input type="text" class="form-control text_time_claim timepicker field_disable" id="time_claim1" name="time_claim[]" value="00:00:00" onchange="get_total_time();"/>
                                    </div>
                                </div>
                            </div>
                            <div class="hide" id="xxxTemplate">
                                <div class="row data-row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <select class="form-control cmb_overtime">
                                                <option value="">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group bootstrap-timepicker">
                                            <input type="text" class="form-control text_time_claim"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group remove_detail_wrap">
                                            <button type="button" class="btn btn-flat btn-xs pull-left removeButton" data-template="xxx"><i class="fa fa-fw fa-times-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row add_detail_wrap" style="margin-bottom: 20px;">
                                <div class="col-md-12 col-lg-12">
                                    <div class="btn-group btn-block">
                                        <button type="button" class="btn btn-flat btn-sm pull-left addButton field_disable" data-template="xxx"><i class="fa fa-fw fa-calendar-plus-o"></i> Date Overtime Claim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="approve_status"></div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>

            <div class="box-body table-wraper">
                <table id="<? echo $table_id?>" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox" class="checkAlltogle"></th>
                            <th width="10%">Date Claim</th>
                            <th width="8%">Claim</th>
                            <th width="41%">Reason</th>
                            <th width="25%">Log</th>
                            <th width="10%">Status</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="overlay ovr_xx" style="display:none;">
                <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
                <span id="submit_progress"></span>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div>   <!-- /.row -->

<script type="text/javascript">
    $(document).ready(function(){
        $('.addButton').on('click', function() {
            var index = $(this).data('index');
            if (!index) {
                index = 0;
                $(this).data('index', 0);
            }
            index++;
            $(this).data('index', index);

            var template     = $(this).attr('data-template'),
                $templateEle = $('#' + template + 'Template'),
                $row         = $templateEle.clone().attr('id','ele_wrap'+index).insertBefore($templateEle).removeClass('hide'),
                $el1         = $row.find('select.cmb_overtime').eq(0).attr('name', 'id_overtime[]').attr('id','id_overtime'+index).addClass('input_select field_disable'),
                $el2         = $row.find('input.text_time_claim').eq(0).attr('name', 'time_claim[]').attr('id','time_claim'+index).addClass('timepicker field_disable').attr('onchange', 'get_total_time();');

            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el1);
            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el2);

            $('#time_claim_wrap #ele_wrap'+index+' .input_select').chosen({
                disable_search_threshold: 5,
                no_results_text: "Maaf, data tidak ditemukan..",
                width: "100%",
                placeholder_text_single: "Pilih...",
            });

            $('#time_claim_wrap #ele_wrap'+index+' .timepicker').timepicker({
                showInputs: false,
                showMeridian: false,
                showSeconds: true,
                minuteStep:1,
                defaultTime:""
            });

            $row.on('click', '.removeButton', function(e) {
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el1);
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el2);
                $row.remove();

                get_total_time();
            });
        });

        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,6]},
                {"sClass": "table_align_center", "aTargets": [5,6]},
            ],
            "aaSorting": [[ 0, "desc" ]],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '<? echo $url_load_table?>',
            "fnServerParams": function ( aoData ) {
                aoData.push({"name":"month_overtime","value":$("#month_overtime").val()});

                var search_param = $('#form-search').serializeArray();
                $.each(search_param, function(i, val) {
                    aoData.push({"name":val.name,"value":val.value});
                });
            },
            "fnDrawCallback": function(fnCallback) {
                catch_expired_session(fnCallback['jqXHR']['responseJSON']);
            },
        });

        $('#<? echo $form_id?> .form-input-data').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                // valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'date_claim': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        }
                    }
                },
                'total_claim': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        callback: {
                            message: 'max time claim is 23:59:00',
                            callback: function(value, validator, $field) {
                                var total_time = $('#total_claim').val();
                                var max_total_time = "23:59:00";

                                var parts1 = total_time.split(":");
                                var time1 = (parts1[0] * 3600) + (parts1[1] * 60) + (+parts1[2]);

                                var parts2 = max_total_time.split(":");
                                var time2 = (parts2[0] * 3600) + (parts2[1] * 60) + (+parts2[2]);

                                if (time1 > time2) {
                                    return false;
                                }
                                else {
                                    return true;
                                }
                            }
                        },
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var total_time = $('#total_claim').val();
                                
                                if (total_time == '00:00:00') {
                                    return false;
                                }
                                else {
                                    return true;
                                }
                            }
                        }
                    }
                },
                'reason': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'notes': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'id_overtime[]': {
                    trigger: 'change',
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var $ele     = validator.getFieldElements('id_overtime[]'),
                                    numele   = $ele.length,
                                    notEmptyCount    = 0,
                                    obj              = {},
                                    duplicateRemoved = [];

                                for (var i = 0; i < numele; i++) {
                                    var v = $ele.eq(i).val();
                                    if (v !== '') {
                                        obj[v] = 0;
                                        notEmptyCount++;
                                    }
                                }

                                for (i in obj) {
                                    duplicateRemoved.push(obj[i]);
                                }

                                if (duplicateRemoved.length !== notEmptyCount) {
                                    return {
                                        valid: false,
                                        message: 'date has been choose before'
                                    };
                                }

                                return true;
                                validator.updateStatus('id_overtime[]', validator.STATUS_VALID, 'callback');
                            }
                        }
                    }
                },
                'time_claim[]': {
                    trigger: 'change',
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var $ele     = validator.getFieldElements('id_overtime[]'),
                                    $ele2     = validator.getFieldElements('time_claim[]'),
                                    numele   = $ele2.length;

                                for (var ix = 0; ix < numele; ix++) {
                                    var vx = $ele.eq(ix).find(':selected').data('time')+':00';
                                    var vz = $ele2.eq(ix).val();

                                    if (vx) {
                                        var parts1 = vx.split(":");
                                        var time1 = (parts1[0] * 3600) + (parts1[1] * 60) + (+parts1[2]);
                                    }
                                    if (vz) {
                                        var parts2 = vz.split(":");
                                        var time2 = (parts2[0] * 3600) + (parts2[1] * 60) + (+parts2[2]);
                                    }

                                    if (time1 < time2) {
                                        return {
                                            valid: false,
                                            message: 'max time to claim '+vx
                                        };
                                    }
                                }

                                validator.updateStatus('time_claim[]', validator.STATUS_VALID, 'callback');
                                return true;
                            }
                        }
                    }
                },
            }
        })
        .on('success.form.bv', function (e) {
            return false;
        })
        .on('error.form.bv', function(e) {
            $(".has-error:first :input").goTo();
            return false;
        });

        $('#<? echo $form_id?> .form-input-data #date_claim').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_claim');
        })

        getCountClaim();

        $('#<? echo $form_id?> #month_overtime').datepicker({
            startView: 'decade',
            minViewMode: 'months',
            format: 'mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        })
        .on('changeDate', function(e) {
            RefreshTable('#<? echo $table_id?>', '2');
            getCountClaim();
        })

        $('#<? echo $form_id?> #date_claim').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            toggleActive: true,
            daysOfWeekDisabled: [0,6],
        })
        .on('changeDate', function(e) {
            $('.removeButton').click();
            $('.addButton').data('index', 1);
            if ($("#id").val()!='') {
                load_overtime('edit','noLeftover');
            }
            else{
                load_overtime();
            }
        })

        $('.form-input-btn-delete').click(function(){
            delete_datatable_1('1');
        })

        $('.form-input-btn-add').click(function(){
            $("#approve_status").html('');
            $('.remove_detail_wrap').attr('style','visibility:visible;position:relative;');
            $('.add_detail_wrap').attr('style','margin-bottom:20px;visibility:visible;position:relative;');
            $('.field_disable').removeAttr('disabled').trigger('chosen:updated');
            $('.removeButton').click();
            $('.addButton').data('index', 1);
            $('#date_claim').datepicker('update', '');
            load_overtime();
        })

        $('.form-input-btn-save').click(function(){
            if ($("#"+$(this).parents(".box-primary,.box-form").data('id')+" .form-input-data").bootstrapValidator('validate').data('bootstrapValidator').isValid()) {
                var action = '<? echo $url_add?>';
                var tolast = '0';

                $('#<? echo $form_id?> .form-input-data').ajaxSubmit({
                    url: action,
                    type: 'POST',
                    data: "",
                    dataType: 'json',
                    beforeSend: function(){
                        $('#<? echo $form_id?> .ovr_xx').fadeIn('slow');
                    },
                    uploadProgress: function(event, position, total, percentComplete){
                        var percentVal = percentComplete + '%';
                        $("#submit_progress").html("Menyimpan data "+percentVal+"...");
                    },
                    success: function(data){
                        catch_expired_session(data);
                        if(data.submit=='1'){
                            show_data(data.id);
                            RefreshTable('#<? echo $table_id?>', tolast);
                            toastr.success('The data has been successfully saved', 'Success');
                        }
                        else{
                            toastr.error(data.error, 'Error');
                        }
                        $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                        $("#submit_progress").html("");
                    }
                });
            }
        })

        $(".cmb_overtime").change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('time_claim[]');
        })
    });

    function show_data(id){
        $('html, body').animate({scrollTop: '0px'}, 800);
        $('#<? echo $form_id?> .ovr_xx').fadeIn('slow');
        show_form_input("#<? echo $form_id?>");
        clear_form("#<? echo $form_id?>");
        $.ajax({
            url:'<? echo $url_show_data?>',
            type: 'POST',
            data:"id="+id,
            dataType: 'json',
            async: false,
            success:function(data){
                $('#id').val(data.id);
                $('#date_claim').datepicker('update', data.date_claim);
                load_overtime('edit','noLeftover');

                $('.removeButton').click();
                $('.addButton').data('index', 1);
                for (i = 1; i <= data.jumlah_detail; i++) {
                    if (i != 1) {
                        $('.addButton').click();
                    }
                }
                
                var arr_not_change = ['date_claim'];
                for (var key in data) {
                    if (arr_not_change.indexOf(key) < 0) {
                        $('#'+key).val(String(data[key]));
                        $('.input_select').trigger('chosen:updated');
                    }
                }

                $('#approve_status_').val(data.approve_status_);
                $('#approve_status').html(data.approve_status);
                
                get_total_time();

                if (data.approve_status_=='1') {
                    $('.remove_detail_wrap').attr('style','visibility:hidden;position:absolute;');
                    $('.add_detail_wrap').attr('style','visibility:hidden;position:absolute;');
                    $('.field_disable').attr('disabled','disabled').trigger('chosen:updated');
                }
                else{
                    $('.remove_detail_wrap').attr('style','visibility:visible;position:relative;');
                    $('.add_detail_wrap').attr('style','margin-bottom:20px;visibility:visible;position:relative;');
                    $('.field_disable').removeAttr('disabled').trigger('chosen:updated');
                }
                
                $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
            }
        });
    }

    function delete_datatable(id){
        var confirm = window.confirm('You are sure to delete data ?');
        if(confirm){
            $.ajax({
                url:'<? echo $url_delete?>',
                type: 'POST',
                data:"id="+id,
                dataType: 'json',
                success:function(data){
                    catch_expired_session(data);
                    if(data.submit=='1'){
                        toastr.success('Data successfully deleted', 'Success');
                        RefreshTable('#<? echo $table_id?>', '0');
                    }
                    else{
                        toastr.error(data.error, 'Error');
                    }
                }
            });
        }else{
            return false;
        }
    }

    function delete_datatable_1(value){
        if ($("input:checkbox[name=check_list]:checked").length > 0) {
            swal({
                title: "You are sure to delete data ?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dd4b39',
                confirmButtonText: 'Yes',
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true,
                // showLoaderOnConfirm: true,
            }, 
            function(isConfirm){
                if (isConfirm){
                    $("input:checkbox[name=check_list]:checked").each(function(){
                        $.ajax({
                            url:'<? echo $url_delete?>',
                            type: 'POST',
                            data:{
                                id: $(this).val(),
                                value: value,
                            },
                            dataType: 'json',
                            success:function(data){
                                catch_expired_session(data);
                                if(data.submit=='1'){
                                    toastr.success('Data successfully deleted', 'Success');
                                    RefreshTable('#<? echo $table_id?>', '0');
                                    getCountClaim();
                                }
                                else{
                                    toastr.error(data.error, 'Error');
                                }
                            }
                        });
                    })
                    $("#<? echo $table_id?> input:checkbox").prop('checked', false);
                }
                else{
                    return false;
                }
            });
        }
        else{
            swal({
                title: "Warning",
                text: "select one of the data for the delete",
                type: "error",
                timer: 5000,
                showConfirmButton: false
            });
        }
    }

    function getCountClaim(){
        $.ajax({
            url:'<? echo $url_get_count_claim?>',
            type: 'POST',
            data:{
                month_overtime: $("#month_overtime").val(),
            },
            dataType: 'json',
            success:function(data){
                catch_expired_session(data);
                $("#countOvertime").html(data.total_claim+"/"+data.total_overtime);
            }
        });
    }

    function open_modal(id_modal){
        $('html, body').animate({scrollTop: '0px'}, 800);
        $("#"+id_modal).fadeIn('slow');
        $("#<? echo $form_id?> .box-header-main").hide();
        $("#<? echo $form_id?> .table-wraper").hide();
        $("#s_name").focus();
    }

    function close_modal(id_modal){
        $("#<? echo $form_id?> .box-header-main").fadeIn('slow');
        $("#<? echo $form_id?> .table-wraper").fadeIn('slow');
        $("#"+id_modal).hide();
    }

    function load_search(id_modal,table){
        close_modal(id_modal);
        if (table=='1') {
            RefreshTable('#<? echo $table_id?>', '2');
            getCountClaim();
        }
        else if (table=='all') {
            set_view();
        }
    }

    function load_search_all(id_modal){
        close_modal(id_modal);
        clear_form_search();
        set_view();
    }

    function set_view(){
        RefreshTable('#<? echo $table_id?>', '2');
        getCountClaim();
    }

    function clear_form_search(form_id){
        if ( $("#<? echo $form_id?> #form-search").is( "form" ) ) {
            $("#<? echo $form_id?> #form-search")[0].reset();
            $('.input_select').trigger('chosen:updated');

        }
        else{
            $('.input_select').trigger('chosen:updated');
        }
    }

    function timestrToSec(timestr) {
        var parts = timestr.split(":");
        return (parts[0] * 3600) + (parts[1] * 60) + (+parts[2]);
    }

    function pad(num) {
        if(num < 10) {
            return "0" + num;
        } else {
            return "" + num;
        }
    }

    function formatTime(seconds) {
        return [pad(Math.floor(seconds/3600)%60),pad(Math.floor(seconds/60)%60),pad(seconds%60),].join(":");
    }

    function get_total_time(){
        var time = $("input[name='time_claim[]']");
        var total_time = "00:00:00";
        var max_total_time = "24:00:00";
        time.each(function(){
            // console.log($(this).val());
            total_time = formatTime(timestrToSec(total_time) + timestrToSec($(this).val()));
        });

        $("#total_claim").val(total_time);
        $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('total_claim');
    }

    function load_overtime(x="",y="withLeftover"){
        $.ajax({
            type: "POST",
            url: "<? echo $url_load_overtime?>",
            data:{
                id_data: $("#id").val(),
                date_claim: $("#date_claim").val(),
                x: x,
                y: y,
            },
            async: false,
            success: function(data){
                $(".cmb_overtime").html(data);
                $('.cmb_overtime').trigger('chosen:updated');
                $(".text_time_claim").val("00:00:00");
            }
        });
    }
</script>
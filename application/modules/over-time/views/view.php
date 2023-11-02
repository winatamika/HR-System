<div class="row">
    <div class="col-lg-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header box-header-main" style="padding-bottom:0px;">
                <h3 class="box-title">
                    <div class="col-lg-12 no-padding">
                        <div class="form-input-date-filter" style="width: 270px; display: inline-block;">
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
                        <?php if($this->auth->hasPrivilege("DeleteOvertimeControl")){?><button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-delete form-show animated fadeInLeft" style="margin-right: 10px;"><i class="fa fa-fw fa-times-circle"></i> Delete</button><?php }?>
                        <?php if($this->auth->hasPrivilege("AddOvertimeControl")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add form-show animated fadeInLeft"><i class="fa fa-fw fa-file-o"></i> Add</button><?php }?>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Close</button>
                        <?php if($this->auth->hasPrivilege("AddOvertimeControl") || $this->auth->hasPrivilege("EditOvertimeControl")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button><?php }?>
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
                                    <label>Approve submission</label>
                                    <select class="input_select form-control" name="input[approve_status1]" id="s_approve_status1">
                                        <option></option>
                                        <? echo $approve_status;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-3">
                                <div class="form-group">
                                    <label>Approve job is done</label>
                                    <select class="input_select form-control" name="input[approve_status2]" id="s_approve_status2">
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
                <div class="box-body">
                    <label><i class="fa fa-fw fa-suitcase"></i> Over Time Assigment</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Date Assigment</label>
                                    <input type="text" style="display:none;" id="id" name="id" value=""/>
                                    <input type="text" class="form-control datetimepicker_normal field_disable" id="date_assigment" name="date_assigment" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group bootstrap-timepicker">
                                    <label>Expected Time Start</label>
                                    <input type="text" class="form-control timepicker field_disable" id="expected_start" name="expected_start" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group bootstrap-timepicker">
                                    <label>Expected Time End</label>
                                    <input type="text" class="form-control timepicker field_disable" id="expected_end" name="expected_end" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Reason / Job Description</label>
                                    <input type="text" class="form-control field_disable" id="reason" name="reason" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <input type="text" class="form-control field_disable" id="notes1" name="notes1" placeholder="" value="" />
                                </div>
                            </div>  
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="input_select form-control field_disable" id="approve_status1" name="approve_status1">
                                        <?php echo @$approve_status?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <label><i class="fa fa-fw fa-thumbs-up"></i> Job carried out (after approved Over Time Assigment)</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group bootstrap-timepicker">
                                    <label>Actual Time Start</label>
                                    <input type="text" class="form-control timepicker field_disable2" id="actual_start" name="actual_start" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group bootstrap-timepicker">
                                    <label>Actual Time End</label>
                                    <input type="text" class="form-control timepicker field_disable2" id="actual_end" name="actual_end" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <input type="text" class="form-control field_disable2" id="notes2" name="notes2" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="input_select form-control field_disable2" id="approve_status2" name="approve_status2">
                                        <?php echo @$approve_status?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="overtime_info"></div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
            <div class="box-body table-wraper">
                <table id="<? echo $table_id?>" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox" class="checkAlltogle"></th>
                            <th width="54%">Assigment</th>
                            <th width="25%">Times</th>
                            <th width="10%">Carried</th>
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
        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,5]},
                {"sClass": "table_align_center", "aTargets": [3,4,5]},
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
                'date_assigment': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        }
                    }
                },
                'expected_start': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        }
                    }
                },
                'expected_end': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        }
                    }
                },
                'actual_start': {
                    validators: {
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var approve_status1 = $('#approve_status1').val();
                                var actual_start = $('#actual_start').val();
                                return (approve_status1 == '1' && (actual_start == '' || actual_start == '00:00:00')) ? false : true;
                            }
                        }
                    }
                },
                'actual_end': {
                    validators: {
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var approve_status1 = $('#approve_status1').val();
                                var actual_end = $('#actual_end').val();
                                return (approve_status1 == '1' && (actual_end == '' || actual_end == '00:00:00')) ? false : true;
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
                }
            }
        })
        .on('success.form.bv', function (e) {
            return false;
        })
        .on('error.form.bv', function(e) {
            $(".has-error:first :input").goTo();
            return false;
        });

        $('#<? echo $form_id?> .form-input-data #expected_start').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('expected_start');
        })

        $('#<? echo $form_id?> .form-input-data #expected_end').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('expected_end');
        })

        $('#<? echo $form_id?> .form-input-data #actual_start').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('actual_start');
        })

        $('#<? echo $form_id?> .form-input-data #actual_end').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('actual_end');
        })

        getCountOvertime();

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
            getCountOvertime();
        })

        $('.form-input-btn-delete').click(function(){
            delete_datatable_1('1');
        })

        $('.form-input-btn-add').click(function(){
            $('#<? echo $form_id?> .form-input-data :input').filter(':not(button):not(#id)').attr('disabled','disabled').trigger('chosen:updated');
            $('.field_disable').removeAttr('disabled').trigger('chosen:updated');
            $('#approve_status1').attr('disabled','disabled').trigger('chosen:updated');
            $('#approve_status2').attr('disabled','disabled').trigger('chosen:updated');
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

        <?php
        if (isset($xid) && $xapprove_status1=='1') {
            ?>
            show_data(<?php echo $xid?>);
            <?php
        }
        ?>
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
                var arr_not_change = [];
                for (var key in data) {
                    if (arr_not_change.indexOf(key) < 0) {
                        $('#'+key).val(String(data[key]));
                        $('.input_select').trigger('chosen:updated');
                    }
                }

                $('.field_disable').removeAttr('disabled').trigger('chosen:updated');
                $('.field_disable2').removeAttr('disabled').trigger('chosen:updated');

                if (data.create_by_me == 'true') {
                    if (data.approve_status1!='0') {
                        $('.field_disable').attr('disabled','disabled').trigger('chosen:updated');
                        $('#approve_status2').attr('disabled','disabled').trigger('chosen:updated');
                    }
                    else{
                        // $('#approve_status1').attr('disabled','disabled').trigger('chosen:updated');
                        $('.field_disable2').attr('disabled','disabled').trigger('chosen:updated');
                    }
                }
                else {
                    $('.field_disable').attr('disabled','disabled').trigger('chosen:updated');
                    $('#approve_status2').attr('disabled','disabled').trigger('chosen:updated');
                }

                if (data.approve_status2!='0') {
                    $('#<? echo $form_id?> .form-input-data :input').filter(':not(button):not("#id")').attr('disabled','disabled').trigger('chosen:updated');
                }

                $('#overtime_info').html(data.leave_info);
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
                        toastr.error('Data failed deleted', 'Error');
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

    function getCountOvertime(){
        $.ajax({
            url:'<? echo $url_get_count_overtime?>',
            type: 'POST',
            data:{
                month_overtime: $("#month_overtime").val(),
            },
            dataType: 'json',
            success:function(data){
                catch_expired_session(data);
                $("#countOvertime").html(data.total_hour);
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
            getCountOvertime();
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
        getCountOvertime();
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

    function approve_data(id,value){
        var confirm = window.confirm('You are sure to Approve Assigment ?');
        if(confirm){
            var action = '<? echo $url_add?>';
            var tolast = '0';

            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    id: id,
                    approve_status1: value,
                    approve_by_me: '1',
                },
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
                        RefreshTable('#<? echo $table_id?>', tolast);
                        toastr.success('The data has been successfully saved', 'Success');
                    }
                    else{
                        toastr.error('Data could not be saved', 'Error');
                    }
                    $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                    $("#submit_progress").html("");
                }
            });
        }
        else{
            return false;
        }
    }
</script>
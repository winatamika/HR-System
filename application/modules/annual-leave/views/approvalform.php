<div class="row">
    <div class="col-lg-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header box-header-main" style="padding-bottom:0px;">
                <h3 class="box-title">
                    <div class="col-lg-12 no-padding">
                        <div class="form-input-date-filter" style="width: 243px; display: inline-block;">
                            <div style="width: 165px;display: inline-block;vertical-align: top;">
                                <div class="input-group">
                                    <div class="input-group-addon" style="padding: 0px 22px;">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" style="text-align: center; font-size: 17px; letter-spacing: 7px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; cursor: pointer;" id="leave_year" name="leave_year" placeholder="" value="<? echo date('Y')?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right form-input-btn-reload" onclick="load_search('search-form','1')"><i class="fa fa-fw fa-refresh"></i> Reload</button>
                        <button type="submit" class="btn btn-primary btn-flat btn-sm pull-right form-input-btn-search" onclick="open_modal('search-form')"><i class="fa fa-fw fa-filter"></i> Filter</button>
                        <?php if($this->auth->hasPrivilege("DeleteTimeOffRequest")){?><button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-delete form-show animated fadeInLeft" style="margin-right: 10px;"><i class="fa fa-fw fa-times-circle"></i> Delete</button><?php }?>
                        <?php if($this->auth->hasPrivilege("DeleteTimeOffRequest")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-active form-hide animated" style="margin-right: 10px;"><i class="fa fa-fw fa-check"></i> Active</button><?php }?>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Close</button>
                        <?php if($this->auth->hasPrivilege("AddTimeOffRequest") || $this->auth->hasPrivilege("EditTimeOffRequest")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button><?php }?>
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
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="input[employee]" id="s_employee"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Status Approve</label>
                                    <select class="input_select form-control" name="input[approve_status]" id="s_approve_status">
                                        <option></option>
                                        <? echo $approve_status;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Status Active</label>
                                    <select class="input_select form-control" name="input[delete]" id="s_delete">
                                        <option value="0">Active</option>
                                        <option value="1">Removed</option>
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
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Who Filed</label>
                                        <input type="text" class="form-control field_disable" id="filed" placeholder="" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <select class="input_select form-control selectHierarchy field_disable" id="reason" name="reason">
                                            <?php echo @$reason?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Date leave</label>
                                        <div class="input-daterange input-group" id="datepicker_leave">
                                            <input type="text" class="form-control field_disable" id="date_from" name="date_from" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="form-control field_disable" id="date_to" name="date_to" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6" id="half_date_wrap">
                                    <label>With Date half</label>
                                    <div class="hide" id="xxxTemplate">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text_half_date field_disable"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-flat btn-xs pull-left removeButton" data-template="xxx" disabled="disabled"><i class="fa fa-fw fa-times-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="btn-group btn-block">
                                                <button type="button" class="btn btn-flat btn-sm btn-block pull-left addButton" data-template="xxx" disabled="disabled"><i class="fa fa-fw fa-calendar-minus-o"></i> Half Day</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" id="exclude_date_wrap">
                                    <label>With Date exclude in range</label>
                                    <div class="hide" id="xxx1Template">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text_exclude_date field_disable"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-flat btn-xs pull-left removeButton1" data-template="xxx1" disabled="disabled"><i class="fa fa-fw fa-times-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="btn-group btn-block">
                                                <button type="button" class="btn btn-flat btn-sm btn-block pull-left addButton1" data-template="xxx1" disabled="disabled"><i class="fa fa-fw fa-calendar-times-o"></i> Exclude Day</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Days</label>
                                        <input type="text" class="form-control field_disable" id="total_date" name="total_date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <input type="text" class="form-control field_disable" id="notes" name="notes"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="input_select form-control" id="approve_status" name="approve_status">
                                            <?php echo @$approve_status?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="leave_info"></div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
            <div class="box-body table-wraper">
                <table id="<? echo $table_id?>" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox" class="checkAlltogle"></th>
                            <th width="56%">Employee</th>
                            <th width="8%">Total</th>
                            <th width="20%">Reason</th>
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
        $('.removeButton').click();
        $('.removeButton1').click();

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
                $el1         = $row.find('input.text_half_date').eq(0).attr('name', 'half_date[]').attr('id','half_date'+index).attr('onchange', 'total_count_leave();').addClass('datetimepicker_normal');

            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el1);

            $('#half_date_wrap #ele_wrap'+index+' .input_select').chosen({
                disable_search_threshold: 5,
                no_results_text: "Maaf, data tidak ditemukan..",
                width: "100%",
                placeholder_text_single: "Pilih...",
            });

            set_interval_date('.text_half_date');

            $row.on('click', '.removeButton', function(e) {
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el1);
                $row.remove();
                total_count_leave();
            });
        });

        $('.addButton1').on('click', function() {
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
                $el1         = $row.find('input.text_exclude_date').eq(0).attr('name', 'exclude_date[]').attr('id','exclude_date'+index).attr('onchange', 'total_count_leave();').addClass('datetimepicker_normal');

            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el1);

            $('#exclude_date_wrap #ele_wrap'+index+' .input_select').chosen({
                disable_search_threshold: 5,
                no_results_text: "Maaf, data tidak ditemukan..",
                width: "100%",
                placeholder_text_single: "Pilih...",
            });

            set_interval_date('.text_exclude_date');

            $row.on('click', '.removeButton1', function(e) {
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el1);
                $row.remove();
                total_count_leave();
            });
        });

        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,5]},
                {"sClass": "table_align_center", "aTargets": [4,5]},
            ],
            "aaSorting": [[ 0, "desc" ]],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '<? echo $url_load_table?>',
            "fnServerParams": function ( aoData ) {
                aoData.push({"name":"leave_year","value":$("#leave_year").val()});

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
                'date_from': {
                    validators: {
                        notEmpty: {
                            message: 'Date-from not empty'
                        }
                    }
                },
                'date_to': {
                    validators: {
                        notEmpty: {
                            message: 'Date-to not empty'
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
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'half_date[]': {
                    trigger: 'change',
                    validators: {
                        callback: {
                            callback: function(value, validator, $field) {
                                var $ele     = validator.getFieldElements('half_date[]'),
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

                                validator.updateStatus('half_date[]', validator.STATUS_VALID, 'callback');
                                return true;
                            }
                        }
                    }
                },
                'exclude_date[]': {
                    trigger: 'change',
                    validators: {
                        callback: {
                            callback: function(value, validator, $field) {
                                var $ele     = validator.getFieldElements('exclude_date[]'),
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

                                validator.updateStatus('exclude_date[]', validator.STATUS_VALID, 'callback');
                                return true;
                            }
                        }
                    }
                },
                'total_date': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        remote: {
                            type: 'POST',
                            url: '<? echo $url_check_annual_leave?>',
                            data: function(validator,$field,value){
                                return{
                                    total_date : validator.getFieldElements('total_date').val(),
                                    leave_min : $('#reason').find('option:selected').data('leave_min')
                                }
                            },
                            message: 'your count Annual Leave has larger than  Leave for this year',
                            delay: 1000
                        },
                        callback: {
                            message: 'your count Annual Leave has larger than max leave for this reason',
                            callback: function(value, validator, $field) {
                                var reason_leave_min = $('#reason').find('option:selected').data('leave_min');
                                var reason_leave = parseInt($('#reason').find('option:selected').data('time'));
                                var total_date = parseInt($('#total_date').val());
                                return (reason_leave_min == '0' && total_date > reason_leave) ? false : true;
                            }
                        }
                    }
                },
                'approve_status': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
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

        $('#<? echo $form_id?> #leave_year').datepicker({
            startView: 'decade',
            minViewMode: 'years',
            format: 'yyyy',
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
        })
        .on('changeDate', function(e) {
            RefreshTable('#<? echo $table_id?>', '2');
        })

        $('.form-input-btn-delete').click(function(){
            delete_datatable_1('1');
        })

        $('.form-input-btn-active').click(function(){
            delete_datatable_1('0');
        })

        $('.form-input-btn-add').click(function(){
            $("#approve_status").html('');
        })

        $('.form-input-btn-cancel').click(function(){
            set_view();
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

        $('#<? echo $form_id?> .form-input-data #date_from').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_from');
            total_count_leave();
            $('.removeButton').click();
            $('.addButton').data('index', '');
            $('.removeButton1').click();
            $('.addButton1').data('index', '');
        })

        $('#<? echo $form_id?> .form-input-data #date_to').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_to');
            total_count_leave();
            $('.removeButton').click();
            $('.addButton').data('index', '');
            $('.removeButton1').click();
            $('.addButton1').data('index', '');
        })

        $('#reason').change(function(){
            total_count_leave();
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
            data:{
                id: id,
                leave_year: $("#leave_year").val(),
            },
            dataType: 'json',
            async: false,
            success:function(data){
                $('#date_from').datepicker('update',String(data['date_from']));
                $('#date_to').datepicker('update',String(data['date_to']));

                $('.removeButton').click();
                $('.addButton').data('index', '');
                for (i = 0; i < data.jumlah_half; i++) {
                    $('.addButton').click();
                }

                $('.removeButton1').click();
                $('.addButton1').data('index', '');
                for (i = 0; i < data.jumlah_exclude; i++) {
                    $('.addButton1').click();
                }

                var arr_not_change = ['date_from','date_to'];
                for (var key in data) {
                    if (arr_not_change.indexOf(key) < 0) {
                        var key_x = key;
                        if (key_x.substring(0,5)=='half_' || key_x.substring(0,8)=='exclude_') {
                            $('#'+key).datepicker('update',String(data[key]));
                        }
                        else{
                            $('#'+key).val(String(data[key]));
                        }
                        $('.input_select').trigger('chosen:updated');
                    }
                }
                $('.field_disable').attr('disabled','disabled').trigger('chosen:updated');
                
                $('#leave_info').html(data.leave_info);
                $('#id').val(data.id);
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
        if (value=='0') {
            var text = 'active';
            var color = '#00a65a';
        }
        else if (value=='1') {
            var text = 'delete';
            var color = '#dd4b39';
        }
        if ($("input:checkbox[name=check_list]:checked").length > 0) {
            swal({
                title: "You are sure to "+text+" data ?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: color,
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
                                    toastr.success('Data successfully '+text+'d', 'Success');
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
                text: "select one of the data for the "+text,
                type: "error",
                timer: 5000,
                showConfirmButton: false
            });
        }
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
        RefreshTable('#<? echo $table_id?>', '2');
        set_view();
    }

    function load_search_all(id_modal){
        close_modal(id_modal);
        clear_form_search();
        RefreshTable('#<? echo $table_id?>', '2');
        set_view();
    }

    function set_view(){
        setTimeout(function(){
            if ($("#s_delete").val()==0) {
                $(".form-input-btn-active").removeClass("animated fadeInLeft form-hide form-show");
                $(".form-input-btn-active").addClass("animated form-hide");
                $(".form-input-btn-delete").removeClass("animated fadeInLeft form-hide form-show");
                $(".form-input-btn-delete").addClass("form-show animated fadeInLeft");
            }
            else if ($("#s_delete").val()==1) {
                $(".form-input-btn-active").removeClass("animated fadeInLeft form-hide form-show");
                $(".form-input-btn-active").addClass("form-show animated fadeInLeft");
                $(".form-input-btn-delete").removeClass("animated fadeInLeft form-hide form-show");
                $(".form-input-btn-delete").addClass("animated form-hide");
            }
        },1);
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

    function set_max_annual(starting_date,end_date,time,period,period_name){
        var DateDiff = {
            inDays: function(d1, d2) {
                var t2 = d2.getTime();
                var t1 = d1.getTime();
         
                return parseInt((t2-t1)/(24*3600*1000));
            },
            inWeeks: function(d1, d2) {
                var t2 = d2.getTime();
                var t1 = d1.getTime();
         
                return parseInt((t2-t1)/(24*3600*1000*7));
            },
            inMonths: function(d1, d2) {
                var d1Y = d1.getFullYear();
                var d2Y = d2.getFullYear();
                var d1M = d1.getMonth();
                var d2M = d2.getMonth();
         
                return (d2M+12*d2Y)-(d1M+12*d1Y);
            },
            inYears: function(d1, d2) {
                return d2.getFullYear()-d1.getFullYear();
            }
        }

        if (starting_date != "" && end_date != "") {
            var strd1 = starting_date;
            var strd2 = end_date;
            var arrd1 = strd1.split("/");
            var arrd2 = strd2.split("/");

            var d1 = new Date(arrd1[1]+','+arrd1[0]+','+arrd1[2]);
            var d2 = new Date(arrd2[1]+','+arrd2[0]+','+arrd2[2]);

            if (period==1) {
                var hasil = DateDiff.inDays(d1, d2);
            }
            else if (period==2) {
                var hasil = DateDiff.inWeeks(d1, d2);   
            }
            else if (period==3) {
                var hasil = DateDiff.inMonths(d1, d2);   
            }
            else if (period==4) {
                var hasil = DateDiff.inYears(d1, d2);   
            }

            if (time > 0 && (hasil+1) > time) {
                $('#date_from').datepicker('update',"");
                $('#date_to').datepicker('update',"");
                toastr.warning('Total date max '+time+' '+period_name, 'Warning');
            }
        }
        else{
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_from');
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_to');
        }

        $('.removeButton').click();
        $('.addButton').data('index', '');
        $('.removeButton1').click();
        $('.addButton1').data('index', '');
    }

    function count_date(starting_date,end_date,period){
        var DateDiff = {
            inDays: function(d1, d2) {
                var t2 = d2.getTime();
                var t1 = d1.getTime();
         
                return parseInt((t2-t1)/(24*3600*1000));
            },
            inWeeks: function(d1, d2) {
                var t2 = d2.getTime();
                var t1 = d1.getTime();
         
                return parseInt((t2-t1)/(24*3600*1000*7));
            },
            inMonths: function(d1, d2) {
                var d1Y = d1.getFullYear();
                var d2Y = d2.getFullYear();
                var d1M = d1.getMonth();
                var d2M = d2.getMonth();
         
                return (d2M+12*d2Y)-(d1M+12*d1Y);
            },
            inYears: function(d1, d2) {
                return d2.getFullYear()-d1.getFullYear();
            }
        }

        if (starting_date != "" && end_date != "") {
            var strd1 = starting_date;
            var strd2 = end_date;
            var arrd1 = strd1.split("/");
            var arrd2 = strd2.split("/");

            var d1 = new Date(arrd1[1]+','+arrd1[0]+','+arrd1[2]);
            var d2 = new Date(arrd2[1]+','+arrd2[0]+','+arrd2[2]);

            if (period==1) {
                var hasil = DateDiff.inDays(d1, d2);
            }
            else if (period==2) {
                var hasil = DateDiff.inWeeks(d1, d2);   
            }
            else if (period==3) {
                var hasil = DateDiff.inMonths(d1, d2);   
            }
            else if (period==4) {
                var hasil = DateDiff.inYears(d1, d2);   
            }

            return hasil;
        }
        else{
            return 0;
        }
    }

    function current_date(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd='0'+dd
        } 

        if(mm<10) {
            mm='0'+mm
        } 

        today = dd+'/'+mm+'/'+yyyy;
        return today;
    }

    function set_interval_date(ele){
        var count_from = count_date(current_date(),$("#date_from").val(),'1');
        if (count_from > 0) {
            count_from = '+'+count_from;
        }
        var count_to = count_date(current_date(),$("#date_to").val(),'1');
        if (count_to > 0) {
            count_to = '+'+count_to;
        }

        $(ele).datepicker({
            format: 'dd/mm/yyyy',
            clearBtn: true,
            daysOfWeekDisabled: "0,6",
            autoclose: true,
            startDate: count_from+'d',
            endDate: count_to+'d',
        });
    }

    function total_count_leave(){
        if($("#date_from").val()!='' && $("#date_to").val()!=''){
            var count = Math.floor(workday_count($("#date_from").val(),$("#date_to").val(),'1'));
        }
        else{
            var count = 0;
        }
        var total_half = (($("input[name='half_date[]']").map(function(){
            if ($(this).val()!='') {
                return $(this).val();
            }
        }).get()).length)*0.5;
        var total_exclude = (($("input[name='exclude_date[]']").map(function(){
            if ($(this).val()!='') {
                return $(this).val();
            }
        }).get()).length)*1;

        if ((count - total_half - total_exclude) > 0) {
            var total_all = count - total_half - total_exclude;
        }
        else{
            var total_all = 0;   
        }
        
        $("#total_date").val(total_all);
        $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('total_date');
    }


    function workday_count(starting_date,end_date) {
        var strd1 = starting_date;
        var strd2 = end_date;
        var arrd1 = strd1.split("/");
        var arrd2 = strd2.split("/");

        var start = moment(new Date(arrd1[1]+','+arrd1[0]+','+arrd1[2]));
        var end = moment(new Date(arrd2[1]+','+arrd2[0]+','+arrd2[2]));

        var first = start.clone().endOf('week'); // end of first week
        var last = end.clone().startOf('week'); // start of last week
        var days = last.diff(first,'days') * 5 / 7; // this will always multiply of 7
        var wfirst = first.day() - start.day(); // check first week
        if(start.day() == 0) --wfirst; // -1 if start with sunday 
        var wlast = end.day() - last.day(); // check last week
        if(end.day() == 6) --wlast; // -1 if end with saturday
        return wfirst + days + wlast; // get the total
    }
</script>
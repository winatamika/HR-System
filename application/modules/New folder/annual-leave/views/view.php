<div class="row">
    <div class="col-lg-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header box-header-main" style="padding-bottom:0px;">
                <h3 class="box-title">
                    <div class="col-lg-12 no-padding">
                        <div class="form-input-date-filter" style="width: 243px; display: inline-block;">
                            <small id="countLeave" class="label label-success label-flat" style="display: inline-block; border-radius: 0px; margin-right: 9px; font-size: 14px; padding: 10px 15px;"></small>
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
                        <?php if($this->auth->hasPrivilege("AddTimeOffRequest")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add form-show animated fadeInLeft"><i class="fa fa-fw fa-file-o"></i> Add</button><?php }?>
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
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Date From</label>
                                <input type="text" style="display:none;" id="id" name="id" value=""/>
                                <input type="text" class="form-control datetimepicker_normal field_disable" id="date_from" name="date_from" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Date To</label>
                                <input type="text" class="form-control datetimepicker_normal field_disable" id="date_to" name="date_to" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Reason</label>
                                <select class="input_select form-control field_disable" id="reason" name="reason">
                                    <?php echo @$reason?>
                                </select>
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
                            <th width="10%">Date From</th>
                            <th width="10%">Date To</th>
                            <th width="8%">Total</th>
                            <th width="31%">Reason</th>
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
        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,7]},
                {"sClass": "table_align_center", "aTargets": [6,7]},
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
                            message: 'not empty'
                        }
                    }
                },
                'date_to': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
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

        $('#<? echo $form_id?> .form-input-data #date_from').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_from');
        })

        $('#<? echo $form_id?> .form-input-data #date_to').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_to');
        })

        getCountLeave();

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
            getCountLeave();
        })

        $('.form-input-btn-delete').click(function(){
            delete_datatable_1('1');
        })

        $('.form-input-btn-add').click(function(){
            $("#approve_status").html('');
            $('.field_disable').removeAttr('disabled').trigger('chosen:updated');
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
                $('#date_from').val(data.date_from);
                $('#date_to').val(data.date_to);
                $('#reason').val(data.reason);
                $('#approve_status_').val(data.approve_status_);
                $('#approve_status').html(data.approve_status);
                $('#id').val(data.id);
                
                if (data.approve_status_=='1') {
                    $('.field_disable').attr('disabled','disabled').trigger('chosen:updated');
                }
                else{
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
                        getCountLeave();
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
                                    getCountLeave();
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

    function getCountLeave(){
        $.ajax({
            url:'<? echo $url_get_count_leave?>',
            type: 'POST',
            data:{
                leave_year: $("#leave_year").val(),
            },
            dataType: 'json',
            success:function(data){
                catch_expired_session(data);
                $("#countLeave").html(data.total_leave+"/"+data.total_leave_default);
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
            getCountLeave();
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
        getCountLeave();
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
</script>
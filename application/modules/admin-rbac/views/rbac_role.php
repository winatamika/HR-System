<div class="row">
    <div class="col-md-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header">
                <h3 class="box-title">
                    <div class="btn-group btn-block">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm pull-left form-input-btn-reload" onclick="RefreshTable('#<? echo $table_id?>', '2')"><i class="fa fa-fw fa-refresh"></i> Reload</button>
                        <?php if($this->auth->hasPrivilege("DeleteRoles")){?><button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-delete form-show animated fadeInLeft"><i class="fa fa-fw fa-times-circle"></i> Delete</button><?php }?>
                        <?php if($this->auth->hasPrivilege("AddRoles")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add form-show animated fadeInLeft"><i class="fa fa-fw fa-file-o"></i> Add</button><?php }?>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Close</button>
                        <?php if($this->auth->hasPrivilege("AddRoles") || $this->auth->hasPrivilege("EditRoles")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button><?php }?>
                    </div>
                </h3>
            </div><!-- /.box-header -->
            <form role="form" class="form-input-data animated form-hide">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Role</label>
                                <input type="text" style="display:none;" id="role_id" name="role_id" value=""/>
                                <input type="text" class="form-control" id="role_name" name="role_name" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Detail Role</label>
                                <input type="text" class="form-control" id="role_desc" name="role_desc" placeholder="" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="list_permission">
                            
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
            <div class="box-body table-wraper">
                <table id="<? echo $table_id?>" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox" class="checkAlltogle"></th>
                            <th width="25%">Role Name</th>
                            <th width="70%">Detail</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="overlay ovr_xx" style="display:none;">
                <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->
</div>   <!-- /.row -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,3]},
                {"sClass": "table_align_center", "aTargets": [3]},
            ],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '<? echo $url_load_table?>',
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
                'role_name': {
                    validators: {
                        notEmpty: {
                            message: 'Nama jabatan singkat tidak boleh kosong'
                        }
                    }
                },
                'perm_desc': {
                    validators: {
                        notEmpty: {
                            message: 'Nama jabatan panjang tidak boleh kosong'
                        }
                    }
                },
                'role_perm_check[]': {
                    validators: {
                        choice: {
                            min: 1,
                            message: 'Centang minimal 1 permission'
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

        $('.form-input-btn-delete').click(function(){
            delete_datatable_1();
        })

        $('.form-input-btn-add').click(function(){
            list_permission('');
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
                            show_role(data.role_id);
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
        })
    });

    function show_role(id){
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
                $('#role_id').val(data.role_id);
                $('#role_name').val(data.role_name);
                $('#role_desc').val(data.role_desc);
                list_permission(data.role_id);
                $('.input_select').trigger('chosen:updated');
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

    function delete_datatable_1(){
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
                            },
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

    function list_permission(id_role){
        $('#<? echo $form_id?> .ovr_xx').fadeIn('slow');
        $.ajax({
            url:'<? echo $url_list_permission?>',
            type: 'POST',
            data:"id_role="+id_role,
            dataType: 'json',
            async: false,
            success:function(data){
                $('#list_permission').html(data.list_permission);
                $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
            }
        });
    }

    function checkcentang(){
        if(document.getElementById('checkAll').checked) {
            $('#list_permission :checkbox').each(function() {
                this.checked = true;                        
            });
        }
        else{
            $('#list_permission :checkbox').each(function(){
                this.checked = false;
            });
        }
    }
</script>
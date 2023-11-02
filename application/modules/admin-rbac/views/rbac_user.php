<div class="row">
    <div class="col-lg-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header">
                <h3 class="box-title">
                    <div class="btn-group btn-block">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm pull-left form-input-btn-reload" onclick="RefreshTable('#<? echo $table_id?>', '2')"><i class="fa fa-fw fa-refresh"></i> Reload</button>
                        <?php if($this->auth->hasPrivilege("DeleteUser")){?><button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-delete form-show animated fadeInLeft"><i class="fa fa-fw fa-times-circle"></i> Delete</button><?php }?>
                        <?php if($this->auth->hasPrivilege("AddUser")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add form-show animated fadeInLeft"><i class="fa fa-fw fa-file-o"></i> Add</button><?php }?>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Close</button>
                        <?php if($this->auth->hasPrivilege("AddUser") || $this->auth->hasPrivilege("EditUser")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button><?php }?>
                    </div>
                </h3>
            </div><!-- /.box-header -->
            <form role="form" class="form-input-data animated form-hide" style="z-index: 1009;">
                <div class="box-body">
                    <label><i class="fa fa-fw fa-user"></i> Personal Data</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <div id="foto-fileframe" class="fileframe"></div>
                                    <input type="hidden" name="ko_foto" id="ko_foto" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Current Address</label>
                                            <input type="text" class="form-control" id="current_address" name="current_address" placeholder="" value="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Hometown Address</label>
                                            <input type="text" class="form-control" id="hometown_address" name="hometown_address" placeholder="" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>No. KTP/SIM/Paspor</label>
                                    <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Telp</label>
                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Handphone</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Place of birth</label>
                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="text" class="form-control datetimepicker_normal" id="date_of_birth" name="date_of_birth" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Blood type / rhesus</label>
                                    <select class="input_select form-control" id="blood_type" name="blood_type">
                                        <?php echo @$blood_type?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Religion</label>
                                    <select class="input_select form-control" id="religion" name="religion">
                                        <?php echo @$religion?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <select class="input_select form-control" id="nationality" name="nationality">
                                        <?php echo @$nationality?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Mother Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Marital status</label>
                                    <select class="input_select form-control" id="martial_status" name="martial_status">
                                        <?php echo @$martial_status?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Name of Heir</label>
                                    <input type="text" class="form-control" id="name_of_heir" name="name_of_heir" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Relation to heir</label>
                                    <select class="input_select form-control" id="relation_to_heir" name="relation_to_heir">
                                        <?php echo @$family_member?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <label><i class="fa fa-fw fa-life-ring"></i> Family contact for Emergency</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="fce_name" name="fce_name" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Relation Status</label>
                                    <select class="input_select form-control" id="fce_relation" name="fce_relation">
                                        <?php echo @$family_member?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Office Telp</label>
                                    <input type="text" class="form-control" id="fce_office_tlp" name="fce_office_tlp" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>House Telp</label>
                                    <input type="text" class="form-control" id="fce_house_tlp" name="fce_house_tlp" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <label><i class="fa fa-fw fa-suitcase"></i> Employment Data</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Position</label>
                                    <select class="input_select form-control selectHierarchy" id="position" name="position">
                                        <?php echo @$position?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Direct Supervisor</label>
                                    <select class="input_select form-control" id="direct_supervisor" name="direct_supervisor">
                                        <?php echo @$direct_supervisor?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Employment</label>
                                    <select class="input_select form-control" id="employment" name="employment">
                                        <?php echo @$employment?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Starting Date</label>
                                    <input type="text" class="form-control datetimepicker_normal" id="starting_date" name="starting_date" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="text" class="form-control datetimepicker_normal" id="end_date" name="end_date" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Max Annual Leave (day)</label>
                                    <input type="text" class="form-control" id="max_annual_leave" name="max_annual_leave" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Jamsostek No</label>
                                    <input type="text" class="form-control" id="jamsostek" name="jamsostek" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>NPWP No</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Bank Branch</label>
                                    <input type="text" class="form-control" id="bank_branch" name="bank_branch" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" class="form-control" id="bank_account_name" name="bank_account_name" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="file_bank_account" style="display: block;">Scan first page bank account book</label>
                                    <input type="file" accept="application/pdf" class="file_" id="file_bank_account" name="file_bank_account" style="opacity: 0; position: absolute; width: 98%; height: 33px;">
                                    <input type="text" class="form-control hasil_filename" id="hasil_file_bank_account" placeholder="Browse file...">
                                    <span id="file_bank_account_view" class="file_view"></span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <label><i class="fa fa-fw fa-group"></i> Family Data</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control fam_name" id="fam_name1" name="fam_name[]"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="input_select form-control fam_sex" id="fam_sex1" name="fam_sex[]">
                                        <?php echo @$sex?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="text" class="form-control datetimepicker_normal fam_date_of_birth" id="fam_date_of_birth1" name="fam_date_of_birth[]"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="input_select form-control fam_status" id="fam_status1" name="fam_status[]">
                                        <?php echo @$family_member?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Education</label>
                                    <input type="text" class="form-control fam_education" id="fam_education1" name="fam_education[]"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Job</label>
                                    <input type="text" class="form-control fam_job" id="fam_job1" name="fam_job[]"/>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="hide" id="xxxTemplate">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control text_fam_name"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control cmb_fam_sex">
                                        <?php echo @$sex?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="text" class="form-control datetimepicker_normal text_fam_date_of_birth"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control cmb_fam_status">
                                        <?php echo @$family_member?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Education</label>
                                    <input type="text" class="form-control text_fam_education"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Job</label>
                                    <input type="text" class="form-control text_fam_job"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label style="display: block;">&nbsp</label>
                                    <button type="button" class="btn btn-flat btn-xs pull-right removeButton" data-template="xxx"><i class="fa fa-fw fa-times-circle"></i></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12 col-lg-12">
                            <div class="btn-group btn-block">
                                <button type="button" class="btn btn-flat btn-sm pull-left addButton" data-template="xxx"><i class="fa fa-fw fa-user-plus"></i> Add Family</button>
                                <button type="button" class="btn btn-flat btn-sm pull-left clearButton" data-template="xxx"><i class="fa fa-fw fa-remove"></i> Clear All</button>
                            </div>
                        </div>
                    </div>
                    <label><i class="fa fa-fw fa-unlock-alt"></i> Login Data</label>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" style="display:none;" id="id" name="id" value=""/>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="input_select form-control" multiple="true" id="role" name="role[]">
                                        <? echo $combo_role;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div><!-- /.box-body -->
            </form>
            <div class="box-body table-wraper">
                <table id="<? echo $table_id?>" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox" class="checkAlltogle"></th>
                            <th width="94%">Data User</th>
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
        $('.addButton').data('index', 1);

        $('.addButton').on('click', function() {
            var index = $(this).data('index');
            if (!index) {
                index = 1;
                $(this).data('index', 1);
            }
            index++;
            $(this).data('index', index);

            var template     = $(this).attr('data-template'),
                $templateEle = $('#' + template + 'Template'),
                $row         = $templateEle.clone().attr('id','ele_wrap'+index).insertBefore($templateEle).removeClass('hide'),
                $el1         = $row.find('input.text_fam_name').eq(0).attr('name', 'fam_name[]').attr('id','fam_name'+index),
                $el2         = $row.find('select.cmb_fam_sex').eq(0).attr('name', 'fam_sex[]').attr('id','fam_sex'+index).addClass('input_select'),
                $el3         = $row.find('input.text_fam_date_of_birth').eq(0).attr('name', 'fam_date_of_birth[]').attr('id','fam_date_of_birth'+index),
                $el4         = $row.find('select.cmb_fam_status').eq(0).attr('name', 'fam_status[]').attr('id','fam_status'+index).addClass('input_select'),
                $el5         = $row.find('input.text_fam_education').eq(0).attr('name', 'fam_education[]').attr('id','fam_education'+index),
                $el6         = $row.find('input.text_fam_job').eq(0).attr('name', 'fam_job[]').attr('id','fam_job'+index);

            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el1);
            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el2);
            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el3);
            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el4);
            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el5);
            $('#<? echo $form_id?> .form-input-data').bootstrapValidator('addField', $el6);

            $('#ele_wrap'+index+' .input_select').chosen({
                disable_search_threshold: 5,
                no_results_text: "Maaf, data tidak ditemukan..",
                width: "100%",
                placeholder_text_single: "Pilih...",
            });

            $('#ele_wrap'+index+' .datetimepicker_normal').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });

            $row.on('click', '.removeButton', function(e) {
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el1);
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el2);
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el3);
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el4);
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el5);
                $('#<? echo $form_id?> .form-input-data').bootstrapValidator('removeField', $el6);
                $row.remove();
            });
        });

        $('.clearButton').click(function(){
            $('.removeButton').click();
            $('.addButton').data('index', 1);

            $('#fam_name1').val("");
            $('#fam_sex1').val("").trigger('chosen:updated');
            $('#fam_date_of_birth1').val("");
            $('#fam_status1').val("").trigger('chosen:updated');
            $('#fam_education1').val("");
            $('#fam_job1').val("");
        });

        $('#foto-fileframe').maxupload({
            url:'', 
            maxHeight : 182,
            maxWidth : 152,
            filenameid : 'filename-foto',
            photo: '<? echo base_url()?>media/dist/img/user_no_photo.png',
            ready:function(){
                $('#foto-fileframe #holder a img').addClass('positionStatic');
                $('#foto-fileframe #holder a #edit').hide();
                $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('filename-foto');
            },
            delete:function(){
                $('#foto-fileframe #holder a img').removeClass('positionStatic');  
                $('#foto-fileframe #holder a #edit').show();
                $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('filename-foto');
            },
            complete:function(ko_data){
                ko_foto = ko_data.x+";"+ko_data.y+";"+ko_data.w+";"+ko_data.h;
                $('#ko_foto').val(ko_foto);
            }
        })

        $('#foto-fileframe #holder a #edit').click(function(){
            $('#filename-foto').click();
        });

        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,2]},
                {"sClass": "table_align_center", "aTargets": [2]},
            ],
            "aaSorting": [[ 0, "asc" ]],
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
                'name': {
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
                'current_address': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'hometown_address': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'no_identitas': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'no_tlp': {
                    validators: {
                        regexp: {
                            regexp: "^[0-9 ()]+$",
                            message: 'input must (0-9 (spasi) ())'
                        }
                    }
                },
                'no_hp': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        regexp: {
                            regexp: "^[0-9 ()]+$",
                            message: 'input must (0-9 (spasi) ())'
                        }
                    }
                },
                'place_of_birth': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'date_of_birth': {
                    validators: {
                        
                    }
                },
                'religion': {
                    validators: {
                        
                    }
                },
                'martial_status': {
                    validators: {
                        
                    }
                },
                'name_of_heir': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'fce_name': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'fce_relation': {
                    validators: {
                        
                    }
                },
                'fce_house_tlp': {
                    validators: {
                        regexp: {
                            regexp: "^[0-9 ()]+$",
                            message: 'input must (0-9 (spasi) ())'
                        }
                    }
                },
                'position': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        }
                    }
                },
                'employment': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        }
                    }
                },
                'starting_date': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        callback: {
                            message: 'date end must larger than starting date',
                            callback: function(value, validator, $field) {
                                var strd1 = $('#starting_date').val();
								var strd2 = $('#end_date').val();
								var arrd1 = strd1.split("/");
								var arrd2 = strd2.split("/");

								var d1 = new Date(arrd1[1]+','+arrd1[0]+','+arrd1[2]);
								var d2 = new Date(arrd2[1]+','+arrd2[0]+','+arrd2[2]);

                                return (d1.getTime() >= d2.getTime()) ? false : true;
                            }
                        }
                    }
                },
                'end_date': {
                    validators: {
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var employment = $('#employment').val();
                                var end_date = $('#end_date').val();
                                return (employment == '2' && end_date == '') ? false : true;
                            }
                        },
                        callback: {
                            message: 'date end must larger than starting date',
                            callback: function(value, validator, $field) {
                                var strd1 = $('#starting_date').val();
								var strd2 = $('#end_date').val();
								var arrd1 = strd1.split("/");
								var arrd2 = strd2.split("/");

								var d1 = new Date(arrd1[1]+','+arrd1[0]+','+arrd1[2]);
								var d2 = new Date(arrd2[1]+','+arrd2[0]+','+arrd2[2]);

                                return (d1.getTime() >= d2.getTime()) ? false : true;
                            }
                        }
                    }
                },
                'direct_supervisor': {
                    validators: {
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var position = $('#position').find('option:selected').data('parent');
                                var direct_supervisor = $('#direct_supervisor').val();
                                return (position != '0' && direct_supervisor=='') ? false : true;
                            }
                        }
                    }
                },
                'email': {
                    validators: {
                        emailAddress: {
                            message: "Enter the correct email address"
                        }
                    }
                },
                'npwp': {
                    validators: {
                        
                    }
                },
                'max_annual_leave': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        regexp: {
                            regexp: "^[0-9.]+$",
                            message: "input must (0-9 .)"
                        }
                    }
                },
                'bank_name': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'bank_branch': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'bank_account_name': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'bank_account_number': {
                    validators: {
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input must (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'file_bank_account': {
                    validators: {
                        file: {
                            extension: 'pdf',
                            type: 'application/pdf',
                            maxSize: '5000000',
                            message: 'only upload .pdf files and maximum file size of 5MB'
                        }
                    }
                },
                'username': {
                    validators: {
                        notEmpty: {
                            message: 'not empty'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9._]+$",
                            message: 'input must (a-z A-Z 0-9 .)'
                        }
                    }
                },
                'password': {
                    validators: {
                        identical: {
                            field: 'confirmPassword',
                            message: 'Password and Retype Password not match'
                        },
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var id_ = $('#id').val();
                                var pass = $('#password').val();
                                return (id_ == '' && pass=='') ? false : true;
                            }
                        }
                    }
                },
                'confirmPassword': {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Password dan Retype Password not match sama'
                        },
                        callback: {
                            message: 'not empty',
                            callback: function(value, validator, $field) {
                                var id_ = $('#id').val();
                                var conpass = $('#confirmPassword').val();
                                return (id_ == '' && conpass=='') ? false : true;
                            }
                        }
                    }
                },
                'role[]': {
                    validators: {
                        choice: {
                            min: 1,
                            message: 'Choose minimal 1 role'
                        }
                    }
                },
                'filename-foto': {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: '1000000',
                            message: 'only upload .jpg,.png files and maximum file size of 1MB'
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
            $('#foto-fileframe #edit-tools #delete').click();
            $('#foto-fileframe #holder a img').attr('src','<? echo base_url()?>media/dist/img/user_no_photo.png');
        })

        $('.form-input-btn-save').click(function(){
            if ($("#"+$(this).parents(".box-primary,.box-form").data('id')+" .form-input-data").bootstrapValidator('validate').data('bootstrapValidator').isValid()) {
                $('#foto-fileframe #submit').click();

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
                            show_user(data.id_user);
                            RefreshTable('#<? echo $table_id?>', tolast);
                            if (data.is_user_login=='yes') {
                                if (data.photo_profile!="") {
                                    $(".user-panel .image img").attr("src","<? echo base_url()?>"+data.photo_profile);
                                }
                                $(".user-panel .info .info-name").html(data.name);
                            }
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
        
        $('#position').change(function(){
            load_upper_position($('#position').val());
        })

        $('#<? echo $form_id?> .form-input-data #date_of_birth').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('date_of_birth');
        })

        $('#<? echo $form_id?> .form-input-data #starting_date').change(function(){
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('starting_date');
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('end_date');
            set_max_annual($("#starting_date").val(),$("#end_date").val());
        })

        $('#<? echo $form_id?> .form-input-data #end_date').change(function(){
        	$('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('starting_date');
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('end_date');
            set_max_annual($("#starting_date").val(),$("#end_date").val());
        })

        $('#<? echo $form_id?> .form-input-data #employment').change(function(){
        	if ($("#employment").val()=='1') {
	        	$("#end_date").val("");
	        	$("#max_annual_leave").val(12*1.5);
	        }
	        else {
	        	set_max_annual($("#starting_date").val(),$("#end_date").val());
	        }
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('starting_date');
            $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('end_date');
        })

        $('#file_bank_account').change(function() {
            $('#hasil_file_bank_account').val($('#file_bank_account').val());
        });
    });
	
	function set_max_annual(starting_date,end_date){
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

			var hasil = (DateDiff.inMonths(d1, d2)) * 1.5;
			if (hasil > 0) {
				$("#max_annual_leave").val(hasil);
			}
			else{
				$("#max_annual_leave").val("");		
			}
		}
		else{
			$("#max_annual_leave").val("");	
		}

		$('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('max_annual_leave');
	}

    function show_user(id){
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
                $('.removeButton').click();
                $('.addButton').data('index', '');
                for (i = 1; i <= data.jumlah_family; i++) {
                    if (i != 1) {
                        $('.addButton').click();
                    }
                }

                var arr_not_change = ['filename-foto','file_bank_account'];
                for (var key in data) {
                    if (arr_not_change.indexOf(key) < 0) {
                        $('#'+key).val(String(data[key]));
                        $('.input_select').trigger('chosen:updated');
                    }
                }
                set_role_value(''+data.role+'');
                $('#foto-fileframe #holder a #edit').show();
                $('#foto-fileframe #edit-tools #delete').click();
                $('#foto-fileframe #holder a img').attr('src',data.photo_profile);

                var arr_file = ['file_bank_account'];
                for (var i = 0; i < arr_file.length; i++) {
                    if (data[arr_file[i]]!='') {
                        $('#'+arr_file[i]+'_view').html('<a href="'+data[arr_file[i]]+'" target="_blank"><i class="fa fa-fw fa-file-text"></i></a>');
                    }
                    else{
                        $('#'+arr_file[i]+'_view').html('');
                    }
                    $('#hasil_'+arr_file[i]).val('');
                };

                load_upper_position(data.position,data.direct_supervisor);

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
                async: false,
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

    function set_role_value(roles){
        $.each(roles.split(","), function(i,e){
            $("#role option[value='" + e + "']").prop("selected", true);
        });
        $('#role').trigger('chosen:updated');
    }

    function load_upper_position(position,value=''){
        $.ajax({
            type: "POST",
            url: "<? echo $url_load_upper_position?>",
            data:"position="+position+"&value="+value,
            success: function(data){
                $("#direct_supervisor").html(data);
                $("#direct_supervisor").trigger('chosen:updated');
                $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('direct_supervisor');
            }
        });
    }
</script>
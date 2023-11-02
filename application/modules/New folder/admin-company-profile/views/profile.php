<div class="row">
    <div class="col-md-12">
        <div class="box box-form box-purple" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header">
                <h3 class="box-title">
                    <div class="btn-group btn-block">
                        <?php if($this->auth->hasPrivilege("DeleteCompanyProfile")){?><button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-delete form-show animated fadeInLeft"><i class="fa fa-fw fa-times-circle"></i> Delete</button><?php }?>
                        <?php if($this->auth->hasPrivilege("AddCompanyProfile")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-add form-show animated fadeInLeft"><i class="fa fa-fw fa-file-o"></i> Add</button><?php }?>
                        <button type="submit" class="btn btn-danger btn-flat btn-sm pull-right form-input-btn-cancel form-hide"><i class="fa fa-fw fa-reply"></i> Cancel</button>
                        <?php if($this->auth->hasPrivilege("AddCompanyProfile") || $this->auth->hasPrivilege("EditCompanyProfile")){?><button type="submit" class="btn btn-success btn-flat btn-sm pull-right form-input-btn-save form-hide"><i class="fa fa-fw fa-save"></i> Save</button><?php }?>
                    </div>
                </h3>
                <div class="callout" style="margin-bottom: 0!important; display:none; margin-top:20px;">                                                
                    <h4><i class="fa fa-icon"></i> <span id="text-info"></span></h4>
                    <span id="text-info-detail"></span>
                </div>
            </div><!-- /.box-header -->
            <form role="form" class="form-input-data animated form-hide" style="z-index: 1009;">
                <input type="text" style="display:none;" id="id_" value=""/>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Image</label>
                                <div id="image_logo-fileframe" class="fileframe"></div>
                                <input type="hidden" name="ko_image" id="ko_image" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name detail</label>
                                        <input type="text" class="form-control" id="slogan" name="slogan" placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="-" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="-" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="" value="-" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="" value="-" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="" value="-" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="" value="-" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Google Plus</label>
                                        <input type="text" class="form-control" id="google" name="google" placeholder="" value="-" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Maps Coordinate</label>
                                        <input type="text" class="form-control" id="maps" name="maps" placeholder="" value="-" style="display:none;"/>
                                        <div id="map" style="height: 300px; border: 1px solid #D2D6DE;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->                
            </form>
            <div class="box-body table-wraper">
                <table id="<? echo $table_id?>" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" id="checkAll"></th>
                        <th width="91%">Profile</th>
                        <th width="8%">Action</th>
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

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".textarea").wysihtml5();
        $('#image_logo-fileframe').maxupload({
            url:'', 
            maxHeight : 161,
            maxWidth : 161,
            filenameid : 'filename-image',
            photo: '<? echo base_url()?>media/dist/img/sample_image.jpg',
            ready:function(){
                $('#image_logo-fileframe #holder a img').addClass('positionStatic');
                $('#image_logo-fileframe #holder a #edit').hide();
                $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('filename-image');
            },
            delete:function(){
                $('#image_logo-fileframe #holder a img').removeClass('positionStatic');  
                $('#image_logo-fileframe #holder a #edit').show();
                $('#<? echo $form_id?> .form-input-data').data('bootstrapValidator').revalidateField('filename-image');
            },
            complete:function(ko_data){
                ko_image = ko_data.x+";"+ko_data.y+";"+ko_data.w+";"+ko_data.h;
                $('#ko_image').val(ko_image);
            }
        })

        $('#image_logo-fileframe #holder a #edit').click(function(){
            $('#filename-image').click();
        });

        $('#<? echo $table_id?>').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0,2]},
                {"sClass": "table_align_center", "aTargets": [2]}
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
                'filename-image': {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: '3000000',
                            message: 'hanya boleh mengupload file jpeg,png dan maksimun ukuran file 3Mb'
                        },
                        callback: {
                            message: 'Tidak boleh kosong',
                            callback: function(value, validator, $field) {
                                var id_ = $('#id_').val();
                                var file = $('#filename-image').val();
                                return (id_ == '' && (typeof file =='undefined' || file=='')) ? false : true;
                            }
                        }
                    }
                },
                'name': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'slogan': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'address': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'phone': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[0-9., ()'-]+$",
                            message: "input harus (0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'email': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        emailAddress: {
                            message: "Masukkan alamat email yang benar"
                        }
                    }
                },
                'facebook': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-@#_]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'twitter': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-@#_]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'instagram': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-@#_]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                },
                'google': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-@#_]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#image_logo-fileframe #submit').click();
            var id_ = $('#id_').val();
            if (id_ == ''){
                var action = '<? echo $url_add?>';
                var tolast = '1';
            }
            else{
                var action = '<? echo $url_edit?>/'+id_;
                var tolast = '0';
            }
            
            e.preventDefault();

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
                    if(data.submit=='1'){
                        $('#tahun_ajar').removeAttr('disabled').trigger('chosen:updated');
                        hide_form_input("#<? echo $form_id?>");
                        RefreshTable('#<? echo $table_id?>', tolast);
                        $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                    }
                    else{
                        $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                        callout('<? echo $form_id?>','callout-danger','fa-exclamation-circle','Error','Data gagal disimpan','1000','3000');
                    }
                    $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                    $("#submit_progress").html("");
                }
            });
        })
        .on('error.form.bv', function(e) {
            return false;
        });

        $('.form-input-btn-add').click(function(){
            $('#id_').val('');
            $('#image_logo-fileframe #edit-tools #delete').click();
            $('#image_logo-fileframe #holder a img').attr('src','<? echo base_url()?>media/dist/img/sample_image.jpg');
            setTimeout(function(){
                $('#text').data("wysihtml5").editor.setValue("");
            },200);
        })

        $('.form-input-btn-cancel').click(function(){
            
        })

        $('.form-input-btn-delete').click(function(){
            delete_datatable_1();
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
                $('#id_').val(data.id_);
                $('#name').val(data.name);
                $('#slogan').val(data.slogan);
                $('#address').val(data.address);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $('#facebook').val(data.facebook);
                $('#twitter').val(data.twitter);
                $('#instagram').val(data.instagram);
                $('#google').val(data.google);
                $('#maps').val(data.maps);
                $('#image_logo-fileframe #holder a #edit').show();
                $('#image_logo-fileframe #edit-tools #delete').click();
                $('#image_logo-fileframe #holder a img').attr('src',data.img);

                var longlat = data.maps;
                var longlat_ = longlat.split(",");

                var latlng = new google.maps.LatLng(longlat_[0], longlat_[1]);
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: latlng,
                    zoom: 11,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: 'Set lat/lon values for this property',
                    draggable: true
                });
                google.maps.event.addListener(marker, 'dragend', function(a) {
                    $('#maps').val(a.latLng.lat().toFixed(4) + ', ' + a.latLng.lng().toFixed(4));
                });

                $('.input_select').trigger('chosen:updated');
                $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
            }
        });
    }

    function delete_data(id){
        var confirm = window.confirm('Anda yakin untuk menghapus data ?');
        if(confirm){
            $.ajax({
                url:'<? echo $url_delete?>',
                type: 'POST',
                data:"id="+id,
                dataType: 'json',
                success:function(data){
                    if(data.submit=='1'){
                        RefreshTable('#<? echo $table_id?>', '0');
                    }
                    else{
                        alert(data.error);
                    }
                }
            });
        }else{
            return false;
        }
    }

    function delete_datatable_1(){
        if ($("input:checkbox[name=check_list]:checked").length > 0) {
            var confirm = window.confirm('Anda yakin akan menghapus data ?');
            if(confirm){
                $("input:checkbox[name=check_list]:checked").each(function(){
                    $.ajax({
                        url:'<? echo $url_delete?>',
                        type: 'POST',
                        data:"id="+$(this).val(),
                        dataType: 'json',
                        success:function(data){
                            if(data.submit=='1'){
                                RefreshTable('#<? echo $table_id?>', '0');
                            }
                            else{
                                alert(data.error);
                            }
                        }
                    });
                })
            }
            else{
                return false;
            }
        }
        else{
            alert("pilih salah satu data untuk didelete");
        }
    }
</script>
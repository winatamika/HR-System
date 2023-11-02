<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="label-white">Maps <?php echo $profile_company->name?></label>
            <div class="maps">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <div style="overflow:hidden;height:430px;width:100%;">
                    <div id="gmap_canvas" style="height:430px;width:100%;"></div>
                    <iframe src="http://www.embed-google-map.com/map-embed.php"></iframe>
                </div>
                <?php
                    $longlat = explode(",", $profile_company->maps);
                ?>
                <script type="text/javascript"> 
                    function init_map(){
                        var myOptions = {
                            zoom:15,
                            center:new google.maps.LatLng(<?php echo $longlat[0]?>, <?php echo $longlat[1]?>),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                        marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $longlat[0]?>, <?php echo $longlat[1]?>)});
                        infowindow = new google.maps.InfoWindow({
                            content:"<div style='position:relative;line-height:1.34;overflow:hidden;white-space:nowrap;display:block;'><div style='margin-bottom:2px;font-weight:500;'><?php echo $profile_company->name?></div><span><?php echo $profile_company->address?></span></div>" 
                        });
                        google.maps.event.addListener(marker, "click", function(){
                            infowindow.open(map,marker);
                        });
                        infowindow.open(map,marker);
                    }
                    google.maps.event.addDomListener(window, 'load', init_map);
                </script>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="contact-list-address">
            <i class="fa fa-taxi"></i> <?php echo $profile_company->address?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="contact-list-address">
            <i class="fa fa-envelope"></i> <?php echo $profile_company->email?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="contact-list-address">
            <i class="fa fa-phone"></i> <?php echo $profile_company->phone?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-no-color" id="<? echo $form_id?>" data-id="<? echo $form_id?>">
            <div class="box-header no-padding">
                <div class="callout" style="margin-bottom: 0!important; display:none; margin-top:20px; margin-bottom:20px;">                                                
                    <h4><i class="fa fa-icon"></i> <span id="text-info"></span></h4>
                    <span id="text-info-detail"></span>
                </div>
            </div>
            <form role="form" class="form-input-data animated" style="z-index: 1009;">
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-white">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-white">Your Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-white">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="label-white">Message to <?php echo $profile_company->name?></label>
                                <textarea class="form-control" id="message" name="message" style="height:200px;min-height:200px;max-height:200px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-flat pull-left form-input-btn-sent"><i class="fa fa-fw fa-paper-plane"></i> Sent Email</button>
                </div>
            </div>
            <div class="overlay ovr_xx" style="display:none;">
                <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
                <span id="submit_progress"></span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.form-input-btn-sent').click(function(){
            $("#<? echo $form_id?> .form-input-data").bootstrapValidator('validate');
        })
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
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
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
                'subject': {
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
                'message': {
                    validators: {
                        notEmpty: {
                            message: 'tidak boleh kosong'
                        },
                        regexp: {
                            regexp: "^[a-zA-Z0-9., ()'-]+$",
                            message: "input harus (a-z A-Z 0-9 . (spasi) () ' -)"
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function() {
            $('#<? echo $form_id?> .form-input-data').ajaxSubmit({
                url: '<? echo $url_sent_email?>',
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
                        $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                        toastr.success('Message has been sent.', 'Success');
                    }
                    else{
                        $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                        toastr.error('Message failed sent.', 'Failed');
                    }
                    $('#<? echo $form_id?> .ovr_xx').fadeOut('slow');
                    $("#submit_progress").html("");
                    clear_form("#<? echo $form_id?>");
                }
            });
        })
        .on('error.form.bv', function(e) {
            return false;
        });
    });
</script>
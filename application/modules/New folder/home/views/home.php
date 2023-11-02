<div class="row">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-4">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 id="countLeave">00/00</h3>
                        <p>Time Off Request <? echo date("Y");?></p>
                    </div>
                    <div class="icon">
                        <i id="ico_annual" class="fa ion-ios-calendar"></i>
                    </div>
                    <a href="<? echo base_url()?>annual-leave/mainpage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 id="countOvertime">00<sup style="font-size: 20px">h</sup>:00<sup style="font-size: 20px">m</sup></h3>
                        <p>Overtime <? echo date("m/Y");?></p>
                    </div>
                    <div class="icon">
                        <i id="ico_overtime" class="fa ion-ios-time"></i>
                    </div>
                    <a href="<? echo base_url()?>over-time/mainpage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 id="countOvertimeClaim" style="margin-bottom: 0px;">00<sup style="font-size: 20px">h</sup>:00<sup style="font-size: 20px">m</sup></h3>
                        <p style="margin-bottom: 0px;">Claim Overtime <? echo date("m/Y");?></p>
                        <p id="overtime_left" style="margin-bottom: 0px; font-size: 14px;">00:00</p>
                        
                    </div>
                    <div class="icon">
                        <i id="ico_overtime_claim" class="fa ion-ios-timer"></i>
                    </div>
                    <a href="<? echo base_url()?>over-time/claim" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 style="width: 50%; display: inline-block; font-size: 16px; margin: 0px;">
                            <i class="fa fa-fw fa-bar-chart"></i> Chart of time off request
                        </h1>
                        <i id="loader_chart_leave" class="fa fa-fw fa-refresh fa-spin pull-right" style="display:none;width: auto;"></i>
                    </div>
                    <div class="box-body">
                        <div id="bar-chart" style="height: 287px; padding: 0px; position: relative;">
                            <canvas height="300" width="510" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 510px; height: 300px;" class="flot-base"></canvas><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);" class="flot-text"><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-x-axis flot-x1-axis xAxis x1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 85px; top: 283px; left: 23px; text-align: center;">January</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 85px; top: 283px; left: 107px; text-align: center;">February</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 85px; top: 283px; left: 198px; text-align: center;">March</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 85px; top: 283px; left: 287px; text-align: center;">April</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 85px; top: 283px; left: 373px; text-align: center;">May</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 85px; top: 283px; left: 456px; text-align: center;">June</div></div><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-y-axis flot-y1-axis yAxis y1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 203px; left: 7px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">20</div></div></div><canvas height="300" width="510" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 510px; height: 300px;" class="flot-overlay"></canvas>
                        </div>
                    </div><!-- /.box-body-->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 style="width: 80%; display: inline-block; font-size: 16px; margin: 0px;">
                            <i class="fa fa-fw fa-rocket"></i> Overtime by manager
                        </h1>
                        <i id="loader_overtime_manager" class="fa fa-fw fa-refresh fa-spin pull-right" style="display:none;width: auto;"></i>
                    </div>
                    <div class="box-body" style="min-height: 456px;">
                        <ul class="products-list product-list-in-box overtime_manager">
                            
                        </ul>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        getCountLeave();
        getCountOvertime();
        getCountClaim();
        getOvertimeManager();
        bar_data();

        setInterval(function(){ 
            getCountLeave();
            getCountOvertime();
            getCountClaim();
            getOvertimeManager();
            bar_data();
        }, 20000);

    })

    function bar_data(){
        $("#loader_chart_leave").fadeIn('slow');
        $.ajax({
            url:'<? echo $url_get_bar_leave?>',
            type: 'POST',
            data:{
                leave_year: '<? echo date("Y");?>',
            },
            dataType: 'json',
            async: true,
            success:function(data){
                catch_expired_session(data);
                
                $.plot("#bar-chart", [data], {
                    grid: {
                        borderWidth: 1,
                        borderColor: "#f3f3f3",
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        bars: {
                            show: true,
                            barWidth: 0.5,
                            align: "center"
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });
                $("#loader_chart_leave").fadeOut('slow');
            }
        });
    }

    function getCountLeave(){
        $("#ico_annual").removeClass('ion-ios-calendar');
        $("#ico_annual").addClass('ion-ios-loop-strong fa-spin');
        $.ajax({
            url:'<? echo $url_get_count_leave?>',
            type: 'POST',
            data:{
                leave_year: '<? echo date("Y");?>',
            },
            dataType: 'json',
            async: true,
            success:function(data){
                catch_expired_session(data);

                $("#countLeave").html(data.total_leave+"/"+data.total_leave_default+" <sup style='font-size: 20px'>day</sup>");
                $("#ico_annual").removeClass('ion-ios-loop-strong fa-spin');
                $("#ico_annual").addClass('ion-ios-calendar');
            }
        });
    }

    function getCountOvertime(){
        $("#ico_overtime").removeClass('ion-ios-time');
        $("#ico_overtime").addClass('ion-ios-loop-strong fa-spin');
        $.ajax({
            url:'<? echo $url_get_count_claim?>',
            type: 'POST',
            data:{
                month_overtime: '<? echo date("m/Y");?>',
            },
            dataType: 'json',
            success:function(data){
                catch_expired_session(data);
                
                var time_ = data.total_overtime;
                var time_arr = time_.split(":");
                $("#countOvertime").html(time_arr[0]+' <sup style="font-size: 20px">h</sup> : '+time_arr[1]+' <sup style="font-size: 20px">m</sup>');

                $("#ico_overtime").removeClass('ion-ios-loop-strong fa-spin');
                $("#ico_overtime").addClass('ion-ios-time');
            }
        });
    }

    function getCountClaim(){
        $("#ico_overtime_claim").removeClass('ion-ios-timer');
        $("#ico_overtime_claim").addClass('ion-ios-loop-strong fa-spin');
        $.ajax({
            url:'<? echo $url_get_count_claim?>',
            type: 'POST',
            data:{
                month_overtime: '<? echo date("m/Y");?>',
            },
            dataType: 'json',
            success:function(data){
                catch_expired_session(data);

                var time_ = data.total_claim;
                var time_arr = time_.split(":");
                $("#countOvertimeClaim").html(time_arr[0]+' <sup style="font-size: 20px">h</sup> : '+time_arr[1]+' <sup style="font-size: 20px">m</sup>');

                var time1_ = data.overtime_left;
                var time1_arr = time1_.split(":");
                $("#overtime_left").html(time1_arr[0]+' <sup style="font-size: 8px">h</sup> : '+time1_arr[1]+' <sup style="font-size: 8px">m</sup> Left');

                $("#ico_overtime_claim").removeClass('ion-ios-loop-strong fa-spin');
                $("#ico_overtime_claim").addClass('ion-ios-timer');
            }
        });
    }

    function getOvertimeManager(){
        $("#loader_overtime_manager").fadeIn('slow');
        $.ajax({
            url:'<? echo $url_get_overtime_manager?>',
            type: 'POST',
            data:{
                month_overtime: '<? echo date("m/Y");?>',
            },
            success:function(data){
                catch_expired_session(data);

                $(".overtime_manager").html(data);
                $("#loader_overtime_manager").fadeOut('slow');
            }
        });
    }
</script>
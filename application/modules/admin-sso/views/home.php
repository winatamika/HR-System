<div class="row">
    <!-- left column -->
    <div class="col-md-8" style="margin-bottom:20px;">
        <!-- general form elements -->
        <div class="box box-purple" style="margin-bottom:20px;">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Selamat Datang, <? echo $this->session->userdata('nama')?>
                </h3>
            </div>
            <div class="box-body" style="height: 162px;text-align:justify;overflow:auto;">
                <p>SIM SK adalah suatu aplikasi yang mampu menyimpan data SK kedalam database dan juga dapat menampilkan Surat Keputusan yang di terima oleh setiap dosen dan staff. Selain itu, dapat memberikan fasilitas dalam pembuatan Surat Keputusan yaitu berupa format penulisan surat keputusan. Penyimpanan data kedalam database dapat memudahkan para dosen dan karyawan untuk melakukan pencarian ulang Surat Keputusan yang telah diterima dengan mudah tanpa harus mencari terlebih dahulu pada tumpukan arsip. Sistem Informasi Manajemen Surat Keputusan ini akan langsung terintegrasi dengan semua Sistem Informasi yang membutuhkan bukti SK kegiatan di lingkungan Universitas Udayana.</p>
            </div>
        </div>

        <div class="box box-purple">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bullhorn"></i> Pengumuman</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" style="min-height: 163px;max-height: 163px;overflow: auto;">
                <ul class="nav nav-pills nav-stacked pengumuman_wraper">
                    <li><a href="#">Pengumuman 1 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 2 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 3 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span></a></li>
                    <li><a href="#">Pengumuman 1 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 2 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 3 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span></a></li>
                    <li><a href="#">Pengumuman 1 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 2 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 3 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span></a></li>
                    <li><a href="#">Pengumuman 1 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 2 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span> <span class="label label-success pull-right">new</span></a></li>
                    <li><a href="#">Pengumuman 3 <span class="direct-chat-timestamp datetime">23 Jan 2:00 pm</span></a></li>
                  </ul>
            </div><!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript::;" class="uppercase">Pengumuman Selanjutnya</a>
            </div><!-- /.box-footer -->
            <div class="overlay ovr_xx" id="pengumuman-loading" style="display:none;">
                <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
            </div>
        </div><!-- /.box -->
    </div>
    <div class="col-md-4" style="margin-bottom:20px;">
        <div class="box box-purple direct-chat direct-chat-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-comments-o"></i> Chat</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages " id="chat_wraper">
                    Tidak Ada Data...
                </div><!--/.direct-chat-messages-->
            </div><!-- /.box-body -->
            <div class="box-footer">
                <form id="form-chat">
                    <div class="input-group" style="min-width: 100%;max-width: 100%;width: 100%;">
                        <textarea name="message" placeholder="Tulis opini ..." class="form-control" style="min-width: 100%;max-width: 100%;width: 100%;border-radius: 5px 5px 0px 0px !important;"></textarea>
                        <button type="button" class="btn bg-green position-right" id="sent-chat" style="width: 100%;  border-radius: 0px 0px 5px 5px;">Kirim</button>
                        <!-- <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat" >Kirim</button>
                        </span> -->
                    </div>
                </form>
            </div><!-- /.box-footer-->
            <div class="overlay ovr_xx" id="chat-loading" style="display:none;">
                <div class='load-bar' id='materialPreloader'><div class='load-bar-container'><div style='background:#159756' class='load-bar-base base1'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div><div style='background:#159756' class='color green'></div></div></div> <div class='load-bar-container'><div style='background:#159756' class='load-bar-base base2'><div style='background:#da4733' class='color red'></div><div style='background:#3b78e7' class='color blue'></div><div style='background:#fdba2c' class='color yellow'></div> <div style='background:#159756' class='color green'></div> </div> </div> </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#to-top").hide();
        load_chat();
        load_pengumuman();

        setInterval(function(){ 
            load_chat();
            load_pengumuman();
        }, 20000);

        $('#sent-chat').click(function(){
            $.ajaxSetup({
                async: false
            });
            
            $('#chat-loading').fadeIn('slow');
            var data = $('#form-chat').serializeArray();
            data = jQuery.param(data);
            $.ajax({
                url: '<? echo $url_sent_chat?>',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data){
                    if(data.submit=='1'){
                        load_chat();
                        $("#form-chat")[0].reset();
                    }
                    else{
                        return false;
                    }
                }
            });
            $.ajaxSetup({
                async: true
            });
        })

        //calendar-------------------------------------------------------------------
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1),
              backgroundColor: "#f56954", //red
              borderColor: "#f56954" //red
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              backgroundColor: "#00a65a", //Success (green)
              borderColor: "#00a65a" //Success (green)
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://google.com/',
              backgroundColor: "#3c8dbc", //Primary (light-blue)
              borderColor: "#3c8dbc" //Primary (light-blue)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

    });

    function load_chat(){
        $.ajaxSetup({
            async: false
        });
        
        $('#chat-loading').fadeIn('slow');
        $.ajax({
            url: '<? echo $url_loading_chat?>',
            type: 'POST',
            data: "",
            dataType: 'json',
            success: function(data){
                if(data.submit=='1'){
                    $('#chat_wraper').html(data.list_chat);
                    $('#chat_wraper').scrollTop($('#chat_wraper')[0].scrollHeight);
                }
                else{
                    $('#chat_wraper').html("Tidak Ada Data...");
                }
                $('#chat-loading').fadeOut('slow');
            }
        });

        $.ajaxSetup({
            async: true
        });
    }

    function load_pengumuman(){
      $.ajaxSetup({
            async: false
        });
        
        $('#pengumuman-loading').fadeIn('slow');
        $.ajax({
            url: '<? echo $url_loading_pengumuman?>',
            type: 'POST',
            data: "",
            dataType: 'json',
            success: function(data){
                if(data.submit=='1'){
                    $('.pengumuman_wraper').html(data.list_pengumuman);
                }
                else{
                    $('.pengumuman_wraper').html("Tidak Ada Pengumuman...");
                }
                $('#pengumuman-loading').fadeOut('slow');
            }
        });

        $.ajaxSetup({
            async: true
        });
    }
</script>
<div class="row">
    <div class="col-md-6 col-lg-6 acco_det_img">
        <img src="<? echo base_url().$list_accommodation_detail->img?>">
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="box box-widget widget-user-2 box-detail-acco" style="margin-bottom: 0px;">
            <div class="widget-user-header bg-yellow">
                <h3 class="widget-user-username" style="margin-top: 0px;"><?php echo $list_accommodation_detail->name?></h3>
                <h5 class="widget-user-desc" style="margin-bottom: 0px;"><?php echo $list_accommodation_detail->name_detail?></h5>
            </div>
            <div class="box-footer no-padding box-detail-acco-list" style="height: 224px; overflow-x: auto;">
                <!-- <ul class="nav nav-stacked">
                    <li><a href="#">Tropical Garden View <i class="fa fa-briefcase pull-right"></i></a></li>
                    <li><a href="#">Free Wifi <i class="fa fa-wifi pull-right"></i></a></li>
                </ul> -->
                <?php
                    foreach ($list_accommodation_detail_img as $row) {
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 gallery-list-block no-padding">
                            <div class='block-image-acco'>
                                <a class='lightBox' href='<?php echo base_url().$row->img?>' data-lightbox='gallery' title='<?php echo $row->text?>'><img src='<?php echo base_url().$row->img?>'></a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-detail">
        <?php echo $list_accommodation_detail->text?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12" style="color:#fff;margin-bottom:10px;">
        <label>
            These accommodation are similar to <?php echo $list_accommodation_detail->name?>
        </label>
    </div>
    <div class="col-lg-12 no-padding">
        <?php
            foreach ($list_accommodation as $row) {
                ?>
                <div class="col-sm-6 col-md-3 col-lg-3 accommodation-list-block">
                    <img src="<? echo base_url().$row->img?>">
                    <div class="col-lg-12 info">
                        <div class="title">
                            <?php echo $row->name?>
                        </div>
                        <div class="row">
                            <a class="read-more" href="<?php echo base_url().'pages/accommodation_detail/'.$row->id?>">
                                <i class="fa fa-fw fa-eye"></i> read more
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
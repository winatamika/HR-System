<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="box box-widget widget-user-2 box-detail-acco">
            <div class="widget-user-header bg-yellow">
                <h3 class="widget-user-username" style="margin-top: 0px;"><?php echo $list_offers_detail->name?></h3>
                <h5 class="widget-user-desc" style="margin-bottom: 0px;"><?php echo $list_offers_detail->name_detail?></h5>
            </div>
          </div>
    </div>
    <div class="col-md-12 col-lg-12 acco_det_img">
        <img src="<? echo base_url().$list_offers_detail->img?>">
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-detail">
        <?php echo $list_offers_detail->text?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12" style="color:#fff;margin-bottom:10px;">
        <label>
            These offer are similar to <?php echo $list_offers_detail->name?>
        </label>
    </div>
    <div class="col-lg-12 no-padding">
        <?php
            foreach ($list_offers as $row) {
                ?>
                <div class="col-sm-6 col-md-3 col-lg-3 accommodation-list-block">
                    <img src="<? echo base_url().$row->img?>">
                    <div class="col-lg-12 info">
                        <div class="title">
                            <?php echo $row->name?>
                        </div>
                        <div class="row">
                            <a class="read-more" href="<?php echo base_url().'pages/specialoffer_detail/'.$row->id?>">
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
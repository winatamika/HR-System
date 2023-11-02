<div class="row">
    <div class="col-lg-12">
        <p class="text1-wraper">Batu Empug Ubud offer the Best Available Rates and special discount and add value benefits, available exclusively for direct bookings. These special rates are updated regularly so please check this page for the best rates on Ubud cottage special offer. All guests at our tropical cottage enjoy complimentary resort-wide high-speed internet.</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 no-padding">
        <?php
            foreach ($list_offers as $row) {
                ?>
                <div class="col-sm-6 col-md-4 col-lg-4 accommodation-list-block">
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
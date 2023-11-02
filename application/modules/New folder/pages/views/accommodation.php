<div class="row">
    <div class="col-lg-12">
        <p class="text1-wraper">If you are wanting a genuine Bali experience then you simply must try staying in a Batu Empug Cottage Ubud. The place is homey and staying in a cottage will just add to the memorable holiday experience. The cottage we have at Batu Empug Escapes are all hand picked for their privacy, charm, and friendly.</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 no-padding">
        <?php
            foreach ($list_accommodation as $row) {
                ?>
                <div class="col-sm-6 col-md-4 col-lg-4 accommodation-list-block">
                    <img src="<? echo base_url().$row->img?>">
                    <div class="col-lg-12 info">
                        <div class="title">
                            <?php echo $row->name?>
                        </div>
                        <?php
                            echo substr(preg_replace('/\s+/', ' ', strip_tags($row->text)),0,200);
                        ?>
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
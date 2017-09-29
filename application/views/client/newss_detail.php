<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs'); ?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <?php if (!empty($item)): ?>
                    <div class="panel-box">
                        <div class="titles" style="margin-bottom:10px !important">
                            <h4><?php echo $item->title; ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4><?php echo $item->intro; ?></h4>
                                <div class="embed-responsive embed-responsive-16by9">
                                </div>
                            </div>
                            <div class="col-xs-12 padding-top">
                                <?php
                                foreach ($newss_content as $value):
                                    ?>
                                    <p>
                                        <img class="cangiua" src="<?= get_image_link($value->photo) ?>"
                                             alt="<?php echo translate($value->title, $value->title_en); ?>">
                                    </p>
                                    <p><?php echo $value->content; ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php $this->load->view('client/language');?>
            </div>
        </div>
    </div>
</section>

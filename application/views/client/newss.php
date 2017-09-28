<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <section class="section-title"></section>
    <section class="content-info">
        <?php $this->load->view('client/crumbs');?>
        <div class="container padding-top">
            <div class="row">
                <div class="col-md-8"> 
                    <div class="panel-box">
                        <div class="titles" style="margin-bottom:10px !important">
                            <h4><?= t('newss') ?></h4>
                        </div>
                        <?php var_dump($newss); die;?>
                        <?php if(!empty($newss)):?>
                        <div class="row fontawesome-icon-list" style="padding-bottom:10px !important">
                            <?php $i = 1; foreach($newss as $value):?>
                            <div class="fa-hover col-md-6">
                                <a href="<?= site_url('newss/' . $value->alias) ?>" title="<?=translate($value->title, $value->title_en)?>"><?php echo $i;?>. <?php echo $value->title;?></a>
                            </div>
                            <?php $i++; endforeach;?>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                ﻿               <div class="col-md-4"> 
                    <?php $this->load->view('client/language');?>
                </div>
            </div>
        </div>
    </section>
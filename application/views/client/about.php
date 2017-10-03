<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8"> 
                <div class="panel-box">
                    <div class="titles" style="margin-bottom:0px !important">
                        <h4><?= t('about') ?></h4>
                    </div>
                    <div class="row">
                        <?php if(!empty($rows)):?>
                        <ul id="testimonials" class="testimonials">
                            <?php foreach($rows as $value):?>
                            <li>
                                <blockquote>
                                    <h4><?=translate($value->title, $value->title_en)?></h4>
                                    <p><?=translate($value->intro, $value->intro_en)?></p>
                                    <?=translate($value->content, $value->content_en)?>
                                </blockquote>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            ﻿           <div class="col-md-4"> 
                <?php $this->load->view('client/language');?>
            </div>
        </div>
    </div>
</section>

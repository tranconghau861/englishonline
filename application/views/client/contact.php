<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    $config = $this->setting->items();
?>
    <section class="section-title"></section>
    <section class="content-info">
        <?php $this->load->view('client/crumbs');?>
        <div class="container padding-top">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel-box">
                        <div class="titles">
                            <h4><?=t('contact')?></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <aside class="panel-box">
                                    <div class="titles">
                                        <h4><?=t('office-address')?></h4>
                                    </div>
                                    <address>
                                      <i class="fa fa-map-marker"></i><strong>Địa chỉ: </strong> <?=$config['address']?><br>
                                      <i class="fa fa-plane"></i><strong>Thành phố: </strong>TP. Hồ Chí Minh<br>
                                      <i class="fa fa-phone"></i> <abbr title="Phone"><?=t('phone')?>:</abbr> <?=$config['phone']?><br>
                                      <i class="fa fa-envelope"></i><strong>Email:</strong> <?=mailto($config['email'])?><br>
                                    </address>
                                </aside>                                
                            </div>
                            <div class="col-md-8">
                                <div class="panel-box">
                                    <div class="titles">
                                        <h4><?=t('contact-us')?></h4>
                                    </div>
                                    <form id="form-contact" class="form-theme" method="post" role="form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label><?=t('name')?> *</label>
                                                    <input class="form-control" name="name" placeholder="<?=t('name')?>" type="text" value="" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email *</label>
                                                    <input class="form-control" name="email" placeholder="Email" type="email" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?=t('subject')?> *</label>
                                                    <input class="form-control" name="subject" placeholder="<?=t('subject')?>" type="text" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?=t('content')?> *</label>
                                                    <textarea class="form-control" name="message" placeholder="<?=t('content')?>" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label><?=t('text-captcha')?> *</label>
                                                    <input type="text" name="captcha" class="form-control" placeholder="<?=t('text-captcha')?>" required maxlength="10">
                                                </div>
                                                <div class="col-md-6" style="padding-left: 0px !important; margin-top:6px;">
                                                    <?php
                                                        $captcha = $this->captcha->main();
                                                        $this->session->set_userdata('captcha', $captcha);
                                                    ?> <br/>
                                                    <img src="<?=$captcha['image_src']?>" alt="<?=t('text-captcha')?>" height="34">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input value="<?=t('send')?>" class="btn btn-lg btn-primary" type="submit">
                                                <input value="<?=t('reset')?>" class="btn btn-lg btn-primary" type="reset">
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();
$segs = $this->uri->segment_array();
$arg1 = isset($segs[0]) ? $segs[0] : '';
?>
<header class="header-2">
    <div class="container">
        <div class="row">
            <div class="col-md-2 logo">
                <a href="<?=base_url()?>" title="hocthuanhvan.com">
                    <img style="height:52px;" src="<?= get_image_link('assets/client/img/learningenglish.jpg') ;?>" alt="learning english" class="logo_img">
                </a>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <nav class="mainmenu">
                        <ul class="sf-menu" id="menu">
                            <li class="selected sf-menu-active">
                                <a href="."><i class="fa fa-home"></i></a>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'about') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('about-us') ?>" title="<?= t('about') ?>"><?= t('about') ?></a>
                            </li>                            
                            <li class="current a-uppercase <?php echo ($class == 'video') ? 'sf-menu-active' : ''; ?>">
                                <a href="javascript:void(0)" title="<?= t('video') ?>"><?= t('video') ?></a>
                                <?php
                                $menu = $this->node->get_posts(array(
                                    'query'         => 'result',
                                    'extension'     => 'category-video',
                                    'status'        => 1,
                                    'order_by'      => 'ordering ASC',
                                ), 'home_video_menu');
                                if(!empty($menu)):
                                    ?>
                                    <ul class="sub-current">
                                        <?php foreach($menu as $info):?>
                                            <li>
                                                <a href="<?= site_url('video/category/'.$info->alias) ?>">Video <?php echo nl2br(translate($info->title, $info->title_en));?></a>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif;?>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'alphabet' && $method == 'index') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('alphabet') ?>"
                                   title="<?= t('alphabet') ?>"><?= t('alphabet') ?></a>
                            </li>
                            <li class="current a-uppercase <?php echo (($method == 'pronounce' && $class == 'alphabet') or $method == 'detail' && $class == 'alphabet') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('alphabet/pronounce') ?>"
                                   title="<?= t('pronounce') ?>"><?= t('pronounce') ?></a>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'lessons') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('100-lessons') ?>"
                                   title="<?= t('100-lessons') ?>"><?= t('100-lessons') ?></a>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'news') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('news') ?>"
                                   title="<?= t('news') ?>"><?= t('news') ?></a>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'noun' && $arg1 == '1000-most-common-phrases') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('1000-most-common-phrases') ?>"
                                   title="<?= t('1000-phrases') ?>"><?= t('1000-phrases') ?></a>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'noun' && $arg1 == '1500-most-common-words') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('1500-most-common-words') ?>"
                                   title="<?= t('1500-words') ?>"><?= t('1500-words') ?></a>
                            </li>
                            <li class="current a-uppercase <?php echo ($class == 'contact') ? 'sf-menu-active' : ''; ?>">
                                <a href="<?= site_url('contact') ?>" title="<?= t('contact') ?>"><?= t('contact') ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>                
            </div>
        </div>
    </div>
</header>
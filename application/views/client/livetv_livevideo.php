<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <main class="main">
    <div class="container-video">
      <div class="container">
        <div class="video-left">
          <div class="video-slide swiper-container">
            <?php if(!empty($livevideo)):?>
			<div class="swiper-wrapper">
              <?php 
				foreach($livevideo as $key=>$value):
					if($key <2):
					$link = site_url('truyen-hinh/'. $value->alias );					
			  ?>
			  <div class="swiper-slide">
                <article class="bx-video">
                  <a class="cover" href="javascript:void(0)" onclick='subhref("<?php echo $link;?>")'>
                    <figure>
                      <img class="img-bg" src="<?=base_url()?>assets/client/images/video.png" style="background-image: url(<?=get_image_link($value->photo)?>);" alt="<?=translate($value->name, $value->name_en)?>">
                    </figure>
                    <p class="title_news"><?=translate($value->name, $value->name_en)?></p>
                  </a>
                </article>
              </div>
              <?php endif;endforeach;?>
            </div>
			<?php endif;?>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <div class="video-right">
          <div class="videobox-highlight">
            <h2 class="highlight-title"><?=t('video-highlight')?></h2>
            <div class="highlight-content x-mCustomScrollbar-minimalDark">
              <?php if(!empty($livevideo)):?>
      			  <ul class="list-video-thumbs">
      				<?php
      					foreach($livevideo as $key=>$value):
      						if($key >=2):
      						  $_link = site_url('truyen-hinh/'. $value->alias );
      				?>
                      <li>
                        <article class="bx-news">
                            <a class="cover" href="<?php echo $_link;?>" title="<?=translate($value->name, $value->name_en)?>">
                              <figure>
                                <img class="img-bg" src="<?=base_url()?>assets/client/images/video.png"
                               style="background-image: url(<?=get_image_link($value->photo)?>)" alt="<?=translate($value->name, $value->name_en)?>">
                              </figure>
                            </a>
                            <div class="title_news">                              
                              <p class="article-title">
                                <a title="<?=translate($value->name, $value->name_en)?>" href="<?php echo $_link;?>"><?=translate($value->name, $value->name_en)?></a>
                              </p>
                            </div>
                          </article>
                      </li>
                      <?php endif;endforeach;?>
                    </ul>
      			  <?php endif;?>
          </div>
        </div>
      </div>
    </div>
    <div class="container-content">
      <div class="container">        
		<?php include dirname(__FILE__) .'/video_list.php'; ?>
      </div>
    </div>
    <?php include dirname(__FILE__) .'/bottom.php'; ?>
  </main>
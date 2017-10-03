<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$relax = $this->node->get_posts(array(
	'query' 		=> 'result',
	'extension' 	=> 'relax',
	'status' 		=> 1,
	'order_by' 		=> 'created DESC',
	'limit' 		=> 10,
), 'bottom_relax');

if($relax){ ?>
    <div class="container-program">
      <div class="container">
        <h2 class="program-title">
          <?=t('ktv-relax')?>
        </h2>
        <div class="program-content">
          <div class="program-slide swiper-container">
            <div class="swiper-wrapper">
	          <?php foreach($relax as $row){ ?>
              <div class="swiper-slide">
                <article class="bx-video">
                  <a class="cover" href="<?=site_url('giai-tri/'. $row->alias)?>" title="<?=translate($row->title, $row->title_en)?>">
                    <figure>
                      <img class="img-bg" src="<?=base_url()?>assets/client/images/video.png" style="background-image: url(<?=image_link($row->photo, 830, 468)?>);" alt="<?=translate($row->title, $row->title_en)?>">
                    </figure>
                    <p class="title_news"><?=translate($row->title, $row->title_en)?></p>
                  </a>
                </article>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
<?php } ?>
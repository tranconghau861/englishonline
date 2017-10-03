<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <main class="main">
    <div class="container-content">
      <div class="container">
        <div class="main-content clearfix">
          <div class="content-left">
            <section class="box-group">
              <div class="box-title">
                <h2 class="title"><span><?=translate($item->title, $item->title_en)?></span></h2>
              </div>
              <div class="box-content">
	            <?php if($items){ ?>
                <div class="row">
	              <?php
		              foreach($items as $row)
		              {
						$link = site_url('video/'. $row->alias);
						include dirname(__FILE__) .'/loop_video.php';
					  }
				  ?>
                </div>
                <?php } else { echo '<div style="background: #fff; padding: 20px;">'. t('updating') .'</div>'; } ?>
              </div>
            </section>
            
            <?=$pagination?>
          </div>
          <aside class="content-right">
            <?php $layout = 'news'; include dirname(__FILE__) .'/sidebar.php'; ?>
          </aside>
        </div>
      </div>
    </div>
    <?php include dirname(__FILE__) .'/bottom.php'; ?>
  </main>
<?php if(!empty($livetv_video)):?>
      <div class="box-content" >
        <div class="row">
          <?php 
          foreach($livetv_video['rows'] as $key=>$value):
            $link = site_url('truyen-hinh/'. $value->alias );   
          ?>
          <div class="col-xs-6 col-md-4">
            <article class="bx-news">
              <a class="cover" title="<?=translate($value->name, $value->name_en)?>" href="<?php echo $link;?>">
                <figure>
                  <img class="img-bg" src="<?=base_url()?>assets/client/images/video.png"
                       style="background-image: url(<?=get_image_link($value->photo)?>);" alt="<?=translate($value->name, $value->name_en)?>">
                </figure>
              </a>
              <div class="title_news">
                <p class="article-meta">
                  <span class="article-publish">
                    <?php echo date('d/m/Y', strtotime($value->date));?>
                  </span>
                  <span class="view-count"><i class="zmdi zmdi-eye"></i> <?php echo $value->sum_view;?></span>
                  <span class="like-count"><i class="zmdi zmdi-favorite-outline"></i>  <?php echo $value->sum_like;?></span>
                </p>
                <p class="article-title">
                  <a title="<?=translate($value->name, $value->name_en)?>" href="<?php echo $link;?>"><?=translate($value->name, $value->name_en)?></a>
                </p>
              </div>
            </article>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    <?php endif;?>

  <?php if($livetv_video['number_page'] >1):?>
    <nav class="pagination-wrap">      
      <?php include dirname(__FILE__) .'/video_padding.php'; ?>
    </nav>

    <?php endif;?>
     <script type="text/javascript">    

    bindPageTournametMatch();   

</script>
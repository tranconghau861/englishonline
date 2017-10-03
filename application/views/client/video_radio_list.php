<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="main-content clearfix">
  <div class="content-left">
    <section class="box-group">
      <div class="box-title-search">
       
        <form id="form-video-radio" >
          <div class="row">

            <div class="col-md-6">
              <input type="text" name="title" class="form-control" placeholder="<?= t('search-video') ?>"
                     id="filter-video-radio" autocomplete="off">
            </div>
            
            <div class="col-md-4"><input type="text" id="date" name="date" class="form-control date-picker"
                                         placeholder="<?= t('select-date') ?>">
            </div>
            <div class="col-md-2">
              <a onclick="submintsearch()" href="javascript:void(0)" class="btn btn-primary btn-block"><?= t('search') ?></a>
              <input type="hidden" id="id" name="id" value="<?= $video_id ?>">
              <input type="hidden" id="extension" name="extension" value="<?= $extension ?>">
            </div>

          </div>
          <div class="filter-video"></div>
        </form>


      </div>
      <div id="table_content">
      <?php if(!empty($livetv_video)):?>
      <div class="box-content" >
        <div class="row">
          <?php 
          foreach($livetv_video['rows'] as $key=>$value):
            $ext = ($extension =='radiovideo') ? 'phat-thanh' : 'truyen-hinh';
            $links = site_url($ext .'/'. $value->alias );   
			
          ?>
          <div class="col-xs-6 col-md-4">
            <article class="bx-news">
              <a class="cover" title="<?=translate($value->name, $value->name_en)?>" href="<?php echo $links;?>">
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
                  <a title="<?=translate($value->name, $value->name_en)?>" href="<?php echo $links;?>"><?=translate($value->name, $value->name_en)?></a>
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

    </div>
    <script type="text/javascript"> 
      bindPageTournametMatch();
      function bindPageTournametMatch(){  
        $(".num-pagings,.first-paging,.last-paging,.next-paging,.prev-paging").each(function(){
          if($(this).hasClass('page_number_active'))return;   
          $(this).click(function(){       
            //ShowLoadingMatch();         
            var url='<?=site_url('livetv/paddinglist')?>';
            var data_to_post={};        
            var get_selected_page = parseInt($(this).attr("offset")); 
            var extension = '<?php echo $extension;?>';    
            data_to_post={extension: extension, offset:get_selected_page};
            $.post(url,data_to_post,function(result)
            {             
              $("#table_content").html(result);
              //CloseLoadingMatch();
            });       
          });   
        });
      }
      function ShowLoadingMatch(){
        if($('#table_content .popup_wrapper_loading').size()<=0){
          $("#table_content ").append("<div class='popup_wrapper_loading' style='height:100%;display:none;position:absolute;top: 0px;'></div>");
          $('#table_content .popup_wrapper_loading').css('opacity',0.9);
        }
        $('#table_content .popup_wrapper_loading').height($('#table_content').height());
        $('#table_content .popup_wrapper_loading').width($('#table_content').width());
        $('#table_content .popup_wrapper_loading').css('display','');  
      }
      function CloseLoadingMatch(){
        $('#table_content .popup_wrapper_loading').css('display','none'); 
      } 
    </script>

    </section>
    

  </div>
  <aside class="content-right">
    <?php $layout = 'news';
    include dirname(__FILE__) . '/sidebar.php'; ?>
  </aside>
</div>
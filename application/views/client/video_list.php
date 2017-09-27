<?php defined('BASEPATH') OR exit('No direct script access allowed');


$segs = $this->uri->segment_array();
$arg1 = isset($segs[0]) ? $segs[0] : '';
$extension = $arg1 == 'giai-tri' ? 'relax' : 'video';

$video_id = isset($item) ? $item->id : 0;

$category_video = $this->node->get_posts(array(
  'query' => 'result',
  'extension' => 'category-' . $extension,
  'status' => 1,
  'order_by' => 'ordering ASC',
), 'video_category_' . $extension);

$video_related = $this->node->get_posts(array(
  'query' => 'result',
  'extension' => $extension,
  'status' => 1,
  'where' => 'id != ' . $video_id,
  'limit' => 18,
), 'video_related_' . $video_id);

?>

<div class="main-content clearfix">
  <div class="content-left">
    <section class="box-group">
      <div class="box-title-search">
        <form id="form-video-list">
          <div class="row">

            <div class="col-md-4">
              <input type="text" name="title" class="form-control" placeholder="<?= t('search-video') ?>"
                     id="filter-video" autocomplete="off">
            </div>
            <div class="col-md-3"><select class="form-control" name="parent">
                <option value=""><?= t('all') ?></option>
                <?php if ($category_video) {
                  foreach ($category_video as $row) { ?>
                    <option value="<?= $row->id ?>"><?= translate($row->title, $row->title_en) ?></option>
                  <?php }
                } ?>
              </select></div>
            <div class="col-md-3"><input type="text" name="date" class="form-control date-picker"
                                         placeholder="<?= t('select-date') ?>">
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary btn-block"><?= t('search') ?></button>
              <input type="hidden" name="id" value="<?= $video_id ?>">
              <input type="hidden" name="extension" value="<?= $extension ?>">
            </div>

          </div>
          <div class="filter-video"></div>
        </form>
      </div>

      <?php if ($video_related) { ?>
        <div class="box-content">
          <div class="row" id="video-list-result">
            <?php
            foreach ($video_related as $row) {
              $link = site_url($arg1 . '/' . $row->alias);
              include dirname(__FILE__) . '/loop_' . $extension . '.php';
            }
            ?>
          </div>

        </div>
      <?php } ?>
    </section>

  </div>
  <aside class="content-right">
    <?php $layout = 'news';
    include dirname(__FILE__) . '/sidebar.php'; ?>
  </aside>
</div>

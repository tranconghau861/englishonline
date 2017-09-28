<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="section-title"></section>
<section class="content-info">
    <?php $this->load->view('client/crumbs');?>
    <div class="container padding-top">
        <div class="row">
            <div class="col-md-8">
                <?php if(!empty($item)):?>
                    <div class="panel-box">
                        <div class="titles" style="margin-bottom:10px !important">
                            <h4><?php echo $item->title;?></h4>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <h4><?php echo $item->intro; ?></h4>
                                <!--
                                <div class="embed-responsive embed-responsive-16by9">
                                    <div id="myRadio">​</div>
                                    <script type="text/javascript">
                                        var files = '<?= site_url('home/security'. token($item->id, $item->files_video) . '&type=newss') ?>';
                                        var $param = {
                                            autostart: false,
                                            image: "<?= get_image_link($item->photo)?>",
                                            width: 720,
                                            height: 160,
                                            provider: "sound",
                                            aboutlink: http,
                                            media_id: "hocthuanhvan",
                                            primary: 'html5',
                                            title : "<?php echo translate($item->title, $item->title_en);?>",
                                            sources: [
                                                {
                                                    file: files,
                                                    "default": true,
                                                    type: 'mp3',
                                                }
                                            ]
                                        };
                                        var jwplayer = jwplayer("myRadio").setup($param);
                                        jwplayer.on('play', function(){
                                            $('.jw-preview').css({
                                                'background-image': 'url(' + $param['image'] + ')',
                                                'display': 'block'
                                            });
                                        });

                                        function addSoundVideo(video, type, files) {
                                            var list = jwplayer.getPlaylist();
                                            if(list == ''){
                                                list = $param;
                                            }
                                            jwplayer.load([{
                                                file: http + 'upload/sound/'+type+'/' + video
                                            }]);
                                            jwplayer.play();
                                            jwplayer.onComplete(function(){
                                                jwplayer.load(list);
                                            });
                                        }
                                    </script>
                                                                -->

                            </div>
                        </div>
                            <?php if(!empty($news_content)):?>
                                <div class="col-xs-12 padding-top">
                                    <h4>Conversation Sentences</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Intro</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($news_content as $value):
                                            $content = translate($value->content, $value->content_en);
                                            $vowels = array(".", ",");
                                            $consonants = str_replace($vowels, "", $content);
                                            ?>
                                            <tr>
                                                <td style="cursor:pointer; width:15%">
                                                </td>
                                                <td>
                                                </td>
                                                <td style="width:10%">
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
<!--            <div class="col-md-4">-->
<!--                --><?php //$this->load->view('client/language');?>
<!--            </div>-->
        </div>
<!--    </div>-->
</section>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <section class="section-title"></section>
    <section class="content-info">
        <?php $this->load->view('client/crumbs');?>
        <div class="container padding-top">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-box">
                        <div class="titles" style="margin-bottom: 0px;">
                            <h4><?=translate($item->title, $item->title_en)?></h4>
                        </div>
                        <div class="single-news">
                            <div id="videos">&nbsp;</div>
                            <ul id="list-video" class="container events-carousel list-video"></ul>
                            <script type="text/javascript">
                                var playerInstance = jwplayer("videos");
                                playerInstance.setup({
                                    playlist: jQuery.parseJSON('<?php echo $video_list;?>'),
                                    displaytitle: false,
                                    width: '100%',
                                    height: 400,
                                    primary: 'html5',
                                    //type: 'mp3', //mp4
                                    provider: "video",//sound, video
                                });

                                var list = document.getElementById("list-video");
                                var html = list.innerHTML;

                                playerInstance.on('ready',function(){
                                    var playlist = playerInstance.getPlaylist();
                                    for (var index=0;index<playlist.length;index++){
                                        var playindex = index +1;
                                        html += "<li><span class='dropt' title='"+playlist[index].title+"'><a href='javascript:playThis("+index+")'><img alt="+playlist[index].title+" height='75' width='120' src='" + playlist[index].image + "'</img></a></span></li>"
                                        list.innerHTML = html;
                                    }
                                });
                                function playThis(index) {
                                    playerInstance.playlistItem(index);
                                }
                            </script>
                        </div>
                    </div>
                    <div class="panel-box">
                        <div class="titles">
                            <h4>Bình luận</h4>
                        </div>
                        <div class="post-item single-news">
                            <div class="row">
                                <div class="col-md-12">                                    
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php $this->load->view('client/language');?>
                </div>
            </div>
        </div>
    </section>

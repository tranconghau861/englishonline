function setupJWPlayer($divPlayer, $param, $plays, $radio) {
	var defaults = {
		autostart: ($plays) ? false : true,
		image: ($param['image']) ? $param['image'] : 'http://hocthuanhvan.com/assets/client/img/learningenglish.jpg',
		width: ($param['width']) ? $param['width'] : 960,
		height: ($param['height']) ? $param['height'] : 420,
		title: ($param['title']) ? $param['title'] : 'Learn English',
		primary: 'html5', //html5
		aspectratio: '16:9',
		media_id: "hocthuanhvan",
		aboutlink: http,
		provider: ($param['provider']) ? $param['provider'] : "sound",//sound, video
		sources: [
			{
				file: $param['channel'],
				"default": true,
				type: ($param['type']) ? $param['type'] : 'mp3', //mp4
			}
		]
	};
	
	var $jwplayer = jwplayer($divPlayer).setup(defaults);
	if($radio){
		jwplayer($divPlayer).on('play', function(){
			$('.jw-preview').css({
				'background-image': 'url(' + $param['image'] + ')',
				'display': 'block'
			});
		});
	}
	
	return $jwplayer;
}
function addSoundVideo(soundIds, videoThumb, videoTitle) {
	var list = jwplayer().getPlaylist();
	
	$.ajax({
		url: http + "home/getsound",
		beforeSend: function( xhr ) {},
		method: "POST",
		data: { id : soundIds },
		dataType: "json"
	}).done(function( data ) {
		/*
		var newItem = {		
			file: data.videoUrl,
			image: videoThumb,
			title: videoTitle
		};
		*/
		var newItem = {
			file: 'http://hocthuanhvan.com/upload/sound/individual/02/03.mp3', 
			image: 'http://content.bitsontherun.com/thumbs/i8oQD9zd-640.jpg', 
			title: 'Tears of Steel'
		}
		jwplayers.load(newItem).onComplete(function(){
			jwplayers.load(list);
		});
		
	});
}
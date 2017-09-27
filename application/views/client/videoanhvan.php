<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:og="http://ogp.me/ns#"
      xml:lang="vi-vn" lang="vi-vn" dir="ltr" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>    
<head>
<title>Page Title</title>
<script type="text/javascript" src="http://hocthuanhvan.com/jwplayer/jquery.min.js"></script>

<script src="//content.jwplatform.com/libraries/bFyELn2w.js"></script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,600italic,400italic' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
<link href="//s3.amazonaws.com/support-static.jwplayer.com/css/main.css" rel="stylesheet">


</head>
<body>
	
	<div id="fullPlaylist" style="width:680px;">
		<div id="container1">&nbsp;</div>
		<div class="ListItems" style="position:inherit;">
			
			<ul id="list" style="position:relative;">
			</ul>
		</div>
	</div>
	<script type="text/javascript">
		var playerInstance = jwplayer("container1");
		playerInstance.setup({
			playlist: 
				[
					{
						image: "vtts/bbb-splash.png", 
						file: "rtmp://draco.streamingwizard.com:1935/wizard/_definst_/demo/sample.mp4", 
						title: "Big Buck Bunny",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "/images/phone-us.jpg", 
						file: "rtmp://draco.streamingwizard.com:1935/wizard/_definst_/demo/streaming_320_v2.mp4", 
						title: "Streaming Wizard Promo",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "vtts/flashstreaming.jpg", 
						file: "rtmp://draco.streamingwizard.com:1935/wizard/_definst_/demo/flashstreaming/gfx.flv", 
						title: "Flashstreaming Demo",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "vtts/RTV.jpg", 
						file: "rtmp://draco.streamingwizard.com:1935/wizard/_definst_/demo/flashstreaming/RTV_reel.flv", 
						title: "RTV Reel",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "http://content.jwplatform.com/thumbs/ERk7S891-720.jpg", 
						file: "http://content.jwplatform.com/videos/ERk7S891-DZ7jSYgM.mp4", 
						title: "After Effects project end result clip",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "http://content.jwplatform.com/thumbs/Nj80QZ3D-720.jpg", 
						file: "http://content.jwplatform.com/videos/Nj80QZ3D-DZ7jSYgM.mp4", 
						title: "Colorful Origami",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "http://content.jwplatform.com/thumbs/Wc07BeJm-720.jpg", 
						file: "http://content.jwplatform.com/videos/Wc07BeJm-DZ7jSYgM.mp4", 
						title: "Light Paths",
						description: 'The Wooden Dimensions project'
					},
					{
						image: "http://content.jwplatform.com/thumbs/JGrwpDk4-720.jpg", 
						file: "http://content.jwplatform.com/videos/JGrwpDk4-DZ7jSYgM.mp4", 
						title: "Words in Lines",
						description: 'The Wooden Dimensions project'
					}
				],			
			displaytitle: false,
			width: 680,
			height: 360,
			primary: 'html5',
			//type: 'mp3', //mp4
			//provider: "video",//sound, video
		});

		var list = document.getElementById("list");
		var html = list.innerHTML;

		playerInstance.on('ready',function(){
			var playlist = playerInstance.getPlaylist();
			for (var index=0;index<playlist.length;index++){
				var playindex = index +1;
				html += "<li><span class='dropt' title='"+playlist[index].title+"'><a href='javascript:playThis("+index+")'><img height='75' width='120' src='" + playlist[index].image + "'</img></br>"+playlist[index].title+"</a></br><span style='width:500px;'</span></span></li>"
				list.innerHTML = html;
			}
		});
		function playThis(index) {
			playerInstance.playlistItem(index);
		}
	</script>
	  
	  
	  
	<div align="center">
		<div id="container">​</div>
	</div>
	<script type="text/javascript">
		var jwplayer = jwplayer("container").setup({
			file: "//content.jwplatform.com/videos/C4lp6Dtd-640.mp4",
			image: "//content.jwplatform.com/thumbs/C4lp6Dtd-640.jpg",
			title: "Tears of Steel",
			width: 680,
		  height: 360
		});
		function playTrailer(video, thumb) {
		  jwplayer.load([{
			file: video,
			image: thumb
		  }]);
		  jwplayer.play();
		}
	</script>

	<div align="center" style="margin:0 0 0 50px">
		<a href="javascript:playTrailer('https://content.jwplatform.com/videos/C4lp6Dtd-640.mp4', '//content.jwplatform.com/thumbs/C4lp6Dtd-640.jpg')">
		<img alt="" border="0" src="https://support.jwplayer.com/customer/portal/attachments/256826" />
		</a> 
		<a href="javascript:playTrailer('https://content.jwplatform.com/videos/3XnJSIm4-640.mp4','//content.jwplatform.com/thumbs/3XnJSIm4-640.jpg')">
		<img alt="" border="0" src="https://support.jwplayer.com/customer/portal/attachments/256827" />
		</a> 
		<a href="javascript:playTrailer('//content.jwplatform.com/videos/bkaovAYt-640.mp4','//content.jwplatform.com/thumbs/bkaovAYt-640.jpg')">
		<img alt="" border="0" src="https://support.jwplayer.com/customer/portal/attachments/256828" /></a> 
		<a href="javascript:playTrailer('https:////content.jwplatform.com/videos/kaUXWqTZ-640.mp4','//content.jwplatform.com/thumbs/kaUXWqTZ-640.jpg')">
		<img alt="" border="0" src="https://support.jwplayer.com/customer/portal/attachments/256829" />
		</a>
	</div>

    
   
</body>
</html>
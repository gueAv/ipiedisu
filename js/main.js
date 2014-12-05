(function($) {
	var yt_api_ready = false, mainvideo_box,thumbs,mobile=false, mainplayer, timeoutApi, timeoutFirstVideo, timeoutFirstVideo2,  firstVideo = true;
	var params = {
		'controls': 1,
		'modestbranding': 1,
		'title': ' ',
		'rel': 0,
		'showinfo': 0,
		'enablejsapi': 1,
		'wmode': 'opaque',
		'autohide': 1
	};
	if (!$('html').hasClass('lt-ie10')) {
		params['html5'] = 1;
	};
	if($('html').hasClass('mobile')){
		mobile = true;
	}

	function initYoutube(){
		// Load the IFrame Player API code asynchronously.
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		// Replace the 'ytplayer' element with an <iframe> and
		// YouTube player after the API code downloads.
		var player;
		window.onYouTubeIframeAPIReady = function() {
		 	yt_api_ready = true;
		 	changeMainVideo(mainvideo_box.find('.layer_play').data('idvideo'),false,'');
		 }
	}

	function onPlayerReady(){
		if (firstVideo) {
			firstVideo = false;
			return;
		}
		mainplayer.playVideo();
	}
	
	function onPlayerStateChange(event){
		if (event.data == YT.PlayerState.PLAYING) {
			if(!mobile){
				mainplayer.setPlaybackQuality('default');
			}
			mainvideo_box.find('.to_play').hide();
		} else if (event.data == YT.PlayerState.PAUSED) {

		} else if (event.data == YT.PlayerState.ENDED) {
			
		}
	}

	function changeMainVideo(id, show_thumb, div){
		if (!yt_api_ready) {
			clearTimeout(timeoutApi);
			timeoutApi = setTimeout(function(){
				changeMainVideo(id, show_thumb, div);
			},50);
			return;
		}
			
		if(show_thumb){
			if (firstVideo) {	
				clearTimeout(timeoutFirstVideo2);
				timeoutFirstVideo2 =  setTimeout(changeMainVideo(id, show_thumb, div),50);
				return;
			}
			thumbs.removeClass('hide');
			//mainplayer.pauseVideo();
			
			mainplayer.loadVideoById(id);
			//mainplayer.loadVideoById({'videoId': id , 'startSeconds': 0 });
			div.addClass('hide');
			$('html,body').animate({
			        scrollTop: 0},
			        'slow');
		}else{
			mainplayer = new YT.Player('mainplayer', {
					height: '100%',
					width: '100%',
					videoId: id,
					playerVars: params,
					events: {
						'onReady': onPlayerReady,
						'onStateChange': onPlayerStateChange
					}
				});
			
			
		}
		
	}
	function playFirstVideo(){
		if (firstVideo) {	
			clearTimeout(timeoutFirstVideo);
			timeoutFirstVideo =  setTimeout(playFirstVideo,50);
			return;
		}
		mainvideo_box.find('.to_play').hide();
		mainplayer.playVideo();
	}

	$(document).on('ready',function(){
		mainvideo_box = $('.mainvideo');
		thumbs = $('.thumb');
		initYoutube();
		mainvideo_box.find('.layer_play').on('click',function(){
			playFirstVideo();
		});
		thumbs.on('click','.layer_play', function(){
			firstVideo = false;
			mainvideo_box.find('.to_play').hide();
			changeMainVideo($(this).data('idvideo'), true, $(this).closest('.thumb'));
		});
	});

})(jQuery);

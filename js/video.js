/**
 * 
 */
var player;
var videos;
var playing; 


$(document).ready(function() {

	getVideos();

});


function createPlayer() {
	player = new MediaElementPlayer('#videoPlayer', {
//		features: ['volume', 'fullscreen', 'playpause', 'current' ],
		success : function(me) {
			me.addEventListener('play', function(){
				getTagsVideo();
                                clearTags();
				//console.log("Chamada para Funcao de Recomendacao");
			});
			me.addEventListener('ended', function() {
				showTags();
			});
		}
	});

}

function getTagsVideo(){
	console.log(videos[playing].title);
	getTags(videos[playing].title);
}

function createVideo(idVideo) {
	var newSrc = 'http://www.youtube.com/watch?v=' + idVideo;
        
	videoContainer = document.getElementById("videoContainer");
	vp = document.getElementById('videoPlayer');
	if (vp)
		videoContainer.removeChild(vp);

	vp = document.createElement("video");
	vp.id = 'videoPlayer';
	vp.setAttribute('controls', 'controls');
	vp.setAttribute('style', 'width:100%;height:100%');
        
	vpSrc = document.createElement("source");
	vpSrc.type = "video/youtube";
	vpSrc.src = newSrc;
        vp.appendChild(vpSrc);

	videoContainer.appendChild(vp);

}

function changeVideo() {
	player.pause();
	player.remove();

	playing = playing + 1;
	if (playing == videos.length)
		playing = 0;

	createVideo(videos[playing].id);

	createPlayer();
	player.load();

	return false;
}

function getVideos() {

	var xmlhttp = new XMLHttpRequest();
	
	var url = "http://localhost:3030/src/videos.php";
	xmlhttp.onreadystatechange = function() {
                
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //        alert(xmlhttp.responseText + 'estou dentro do if');
			inflateVideos(xmlhttp.responseText);
		}
	};
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function inflateVideos(response) {
	console.log(response);
	playing=0;

	videos = JSON.parse(response);
       
	createVideo(videos[playing].id);
	createPlayer();
}


<? include("header.php");?>
<div class="row">
	<div class="col-8 col-md-offset-4">
		<div id="ytapiplayerModal">
			You need Flash player 8+ and JavaScript enabled to view this video.
		</div>
	</div>
</div>
<script type="text/javascript">

    var params = { allowScriptAccess: "always" };
	var attsModal = { id: "myytplayerModal" };
    swfobject.embedSWF("http://www.youtube.com/v/rBGo6TP1DtM?enablejsapi=1&playerapiid=ytplayer&version=3",
                       "ytapiplayerModal", "625", "556", "8", null, null, params, attsModal);
	
	function onYouTubePlayerReady(playerId) {
		ytplayerModal = document.getElementById("myytplayerModal");
		playModal();
    }
	function playModal() {
		var sec;
		if (ytplayerModal) {
			sec = parseInt(document.getElementById("sec").value);
			
			ytplayerModal.seekTo(sec,true);
		}
	}
</script>
<input id="sec" value="<?php echo $sec; ?>" type="hidden"/>
<? include("footer.php");?>
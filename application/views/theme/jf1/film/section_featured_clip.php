<div class="video-thumb" style="position:relative;">
    <div class="" style="position:absolute;bottom:0;color:#fff;width:100%;padding:0 0 18px 22px">
        <div class="title" style="font-size: 14px; font-weight: bold; margin-bottom: 2px;"><?php print $clip['name']?></div>
        <div class="length" style="font-size: 12px;"><?php print $clip['length']?></div>
    </div>
    <a href="<?php print $_base_url .'film/'.$clip['refId']?>"><img src="<?php print $clip['boxArtUrls'][2]->url->uri?>" width="440"/></a>
</div>
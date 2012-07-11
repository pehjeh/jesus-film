<div class="video-thumb">
    <div class="details">
        <div class="left play-button"></div>
        <div class="left detail">
            <div class="title">
                <a href="<?php print base_url() .'film/'.$data['refId']?>"><?php print $data['name'];?></a>
            </div>
            <div class="length">
                <?php print $data['length']?>
            </div>
        </div>
    </div>
    <a href="<?php print base_url() .'film/'.$data['refId']?>"><img src="<?php print $data['videoStillUrl']?>" width="440" alt="<?php print $data['name'];?>" /></a>
</div>

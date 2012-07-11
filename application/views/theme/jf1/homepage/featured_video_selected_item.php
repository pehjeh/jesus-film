
<?php //printr($data['url'])?>
<div id="video-carousel-selected-<?php print $data['refId']?>" class="content-slide">
        <div class="video-title">
                <h1><?php print $data['name']?> <span class="time-duration"><?php print $data['length']?></span></h1>
        </div>
    <div class="video-player">
        <a href="<?php print $data['url']?>"><img src="<?php print $data['boxArtUrls'][1]->url->uri?>" width="600" alt="" /></a>
    </div>
    <p class="video-description">
        <?php print $data['shortDescription']?>. <a href="<?php print $data['url']?>" class="more-link">More</a>
    </p>
    
    
    <ul class="social-menu">
        <li>
            <a class="fb" href="http://www.facebook.com/sharer.php?u=<?php print urlencode($data['url'])?>" target="_blank">
                Facebook
            </a> 
        </li>
        <li>
            <a class="twitter" href="https://twitter.com/share?url=<?php print urlencode($data['url'])?>&text=<?php print $data['name']?>" target="_blank" class="twitter-share-button" data-lang="en">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </li>
        <li>
                <a href="javascript:mailThisPage()" class="email">email</a>
        </li>
        <li><a href="<?php print $data['downloadUrls'][1]->url->uri?>" class="download" target="_blank">Download</a></li>
        <li><a href="#" class="embed">embed</a></li>
    </ul>
</div>


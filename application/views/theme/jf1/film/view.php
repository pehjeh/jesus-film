<script type="text/javascript">

    function mailpage()
    {
        mail_str = "mailto:?subject=Check out the " + document.title;
        mail_str += "&body=I thought you might be interested in the " + document.title;
        mail_str += ". You can view it at, " + location.href;
        location.href = mail_str;
    }
</script>

<div class="grid-row">
        <div class="grid-4">
          <div class="top"></div>
          <div class="grid-content">
                <div class="video-title">
                    <h1><?php print $data['name']?> <span class="time-duration"><?php print $data['length']?></span></h1>
                        
                        
                    <ul class="social-menu">
                        <li>
                            <a class="fb" href="http://www.facebook.com/share.php?u=<?php print urlencode($_current_url)?>" onclick="return fbs_click()" target="_blank" title="<?php print $data['name']?>">Facebook</a> 
                        </li>
                        <li>
                                <a class="twitter" href="https://twitter.com/share?url=<?php print urlencode($_current_url)?>&text=<?php print $data['name']?>" target="_blank" class="twitter-share-button" data-lang="en">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                         </li>
                        <li>
                            <a href="javascript:mailThisPage()" class="email">email</a>
                        </li>
                        <li><a href="<?php print $data['downloadUrls'][1]->url->uri?>" target="_blank" class="download">download</a></li>
                        <li><a href="#" class="embed">embed</a></li>
                    </ul>
                    <div class="language-select">
                            <a href="#">English</a>
                        	<div id="language-select-box">
				   <div class="arrow"></div>
				   <div class="language-content">
				
				   <div class="language-title-row">
				     <h2 class="language-location-title"><a href="#" class="on">Languages by Location</a></h2>
				     <p>Start by clicking a continent</p>
				   </div>
				
				   <div class="map-select">
				     <img src="<?php print $_theme_path_abs?>images/map.png" alt="" width="460" height="260" />
				   </div>
				
				   <div class="language-title-row">
				     <h2 class="language-name-title"><a href="#">Languages by Name</a></h2>
				   </div>
				
				   </div>
				</div>
                   <?php //print $data['select_languages']?>
                   </div>
                </div>
                <div id="video-title">
                    <?php print $data['playerCode']?>
                </div>
            
          </div>
          <div class="bottom"></div>
        </div>
</div>
                
	   	    <div class="title-about">About Film</div>
	        <div class="title-clips">Featured Clips</div>
	        <a href="#" class="link-more-clips">59 More Clips</a>

<div class="grid-row">
        <div class="grid-2">
          <div class="top"></div>
      <div class="grid-content" style="min-height:510px">
        
            <div class="inner-content">
                
                <p><?php print $data['longDescription']?> </p>

                        <p><b><?php print $data['languageName']?><br />
                        <?php print $data['length']?></b></p>
                
                </div>
                
          </div>
          <div class="bottom"></div>
        </div>
        <div class="grid-2">
          <div class="top"></div>
          <div class="grid-content">
            <?php print $data['featured_clips']?>
          <!--
            <div class="video-thumb"><a href="#"><img src="filler/filler-440.jpg" width="440" alt="" /></a></div>
            <div class="video-thumb"><a href="#"><img src="filler/filler-440-2.jpg" width="440" alt="" /></a></div>
        -->
          </div>
          <div class="bottom"></div>
        </div>
</div>

<style type="text/css">
	#carousel_thumbnails{height:494px;overflow:hidden;}
	#carousel_thumbnails li a{cursor: pointer;}

	#tab_list-featured_set_1 li a{cursor: pointer;}
	.tab_content{display:none}
	.tab_content.current{display:block}
	
</style>
	
	    <div class="grid-row">
		    <div class="grid-3">
			<div class="top"></div>
			<div id="carousel_video" class="grid-content" style="min-height:494px;">
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
			     </div>
			      
			<div class="active-slides">
				<?php print $featured_videos_selected?>
			  </div>
		      
			

			</div>
			<div class="bottom"></div>
		      </div>
			<div class="grid-1">
			  <div class="top"></div>
			  <div class="grid-content slide-height">
				<a href="#" class="prev">Previous</a>
				<a href="#" class="next">Next</a>
					
				  	<div id="slide-items-wrapper">
					  <ul id="slide-items">
						<?php print $carousel_videos?>
					  </ul>
					  </div>	

			  </div>
			</div>
			  <div class="bottom"></div>
		</div>
		
		
		
		<ul id="tab_list-featured_set_1" class="menu-left-col">
		  <li class="m-featured-videos" data-id="featured-videos"><a class="on" rel="featured_videos">Featured Videos</a></li>
		  <li class="m-discover"><a rel="discover">Discover</a></li>
		  <li class="m-languages"><a rel="languages">Languages</a></li>
		</ul>
		
		<ul id="tab_list-featured_set_2" class="menu-right-col">
		  <li class="m-featured-stories"><a class="on" rel="featured-stories">Featured Stories</a></li>
		  <li class="m-your-story"><a rel="tell-your-story">Tell Your Story</a></li>
		  <li class="m-post"><a rel="user-upload">Post a Photo or Video</a></li>
		</ul>
	
       	<div class="grid-row">
			<div class="grid-2">
			  <div class="top"></div>
			  
			  <div id="tab_list-featured_set_1-content" class="grid-content">
				<div id="tab_content-featured_videos" class="tab_content current">
					<?php print $featured_videos?>
				</div>
				
				<div id="tab_content-discover" class="inner-content tab_content">

					    <h2>Headline here</h2>
						<p>Vestibulum pharetra, libero vitae lobortis molestie, libero urna scelerisque ante, ac tincidunt elit ipsum a mauris. Cras tortor purus, volutpat et cursus vitae, sodales luctus sem. </p>

						<div class="content-form">
							<form method="get" action="<?php print base_url()?>search">
								<input name="category" type="text" class="category" value="Search by Category" />
								<input name="language" type="text" class="category" value="Search by Language" />
								<input name="keyword" type="text" class="category" value="Search by Keyword" />
								
								<img class="img-button" src="<?php print $_theme_path_abs?>images/btn-search.png" />
								<span class="form-btn-aside">Or <a href="#">Browse by Language</a></span>
							</form>
						</div>
						
						
						<h2>Popular Searches</h2>
						<div>
							<?php print $popular_searches?>
							
						</div>

				</div>

				<div id="tab_content-languages" class="tab_content">
					<div class="inner-content">
						 <h2>Headline here</h2>
							<p>Vestibulum pharetra, libero vitae lobortis molestie, libero urna scelerisque ante, ac tincidunt elit ipsum a mauris. Cras tortor purus, volutpat et cursus vitae, sodales luctus sem. </p>
					</div>
					
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
			    
			  </div>
			  <div class="bottom"></div>
			</div>
			
			
			<div class="grid-2">
			  <div class="top"></div>
				<div id="tab_list-featured_set_2-content" class="grid-content" style="min-height:510px">
			
				<!-- FEATURED STORIES CONTENT -->
				<div id="tab_content-featured-stories" class="tab_content inner-content current">
				    
					    <div class="post">
					<h2>Maria's Story from Bolivia</h2>
					<a href="#" class="inset"><img src="<?php print $_theme_path_abs?>images/filler/filler-136.jpg" alt="" /></a>
					    <p>Suspendisse auctor sapien at lacus suscipit feugiat. Aliquam ut urna eget diam facilisis ultrices non at odio. Aptent taciti sociosqu ad litora torquent per conubia nostra. Class aptent taciti socio...</p>
					    <a href="#" class="comment-link">22 comments</a>
					    </div>
				
					    <div class="post">
					    <h2>The Gospel Changing Lives in Japan</h2>
					    <p>Vestibulum pharetra, libero vitae lobortis molestie, libero urna scelerisque ante, ac tincidunt elit ipsum a mauris. Cras tortor purus, volutpat et cursus vitae, sodales luctus sem. Lorem ipsum dolor sit amet, consectetur...</p>
					    <a href="#" class="comment-link">15 comments</a>
					    </div>
				
					    <div class="post">
					    <h2>Worth 1,000 Words</h2>
					    <a href="#" class="inset"><img src="<?php print $_theme_path_abs?>images/filler/filler-136-2.jpg" alt="" /></a>
					    <p>Nam quis enim non lorem porta tristique gravida non lorem. Maecenas elit neque, blandit sit amet cursus sit amet, laoreet. Curabitur velit lorem, euismod at convallis at, ultricies blandit odio. Suspendisse...</p>
					    <a href="#" class="comment-link">9 comments</a>
					    </div>
				    
				    </div>
				
				
				<!-- TELL YOUR STORY CONTENT -->
				 <div id="tab_content-tell-your-story" class="tab_content inner-content">
				
					<h2>Headline here</h2>
					    <p>Vestibulum pharetra, libero vitae lobortis molestie, libero urna scelerisque ante, ac tincidunt elit ipsum a mauris. Cras tortor purus, volutpat et cursus vitae, sodales luctus sem. </p>
				
					    <div class="content-form">
					      <input type="text" value="Name or Nickname" />
					      <input type="text" value="Email Address (We'll keep this private)" />
					      <textarea>Your Story</textarea>
					      <label><input type="checkbox" /> Terms/Permission disclaimer and checkbox here</label>
				
					      <input type="image" src="<?php print $_theme_path_abs?>images/btn-send.png" />
					    </div>
				
				</div>
					    
				    
				<!-- UPLOAD A PHOTO OR VIDEO -->
				<div id="tab_content-user-upload" class="tab_content inner-content">
				
					    <h2>Headline here</h2>
						<p>Vestibulum pharetra, libero vitae lobortis molestie, libero urna scelerisque ante, ac tincidunt elit ipsum a mauris. Cras tortor purus, volutpat et cursus vitae, sodales luctus sem. </p>
				
				</div>
				
				
			  </div>
			  <div class="bottom"></div>
			</div>
		</div>



var home = {
    
    cache: null,
    settings : null,
    
    
    action_populate_carousel_video:function(data)
    {
        					
        /*jwplayer('svideo-player').setup({
            'flashplayer': 'player.swf',
            'file': 'http://api.jfpmedia.com/videoPlayerUrl?ovpId=1661938820001&key=AQ%7E%7E%2CAAABHZ9yTuE%7E%2CbuuwStv8LWCmzYo5jLutdkqeumLiT54Q&refId=1_3934-31425-ot-0-0',
            'controlbar': 'bottom',
            'width': '600',
            'height': '320'
          });
        */
        
        /*
        data.playerCode = data.playerCode.replace(/\<\!\[CDATA\[/,'');
        data.playerCode = data.playerCode.replace(/\]\]\>/,'');
        
        $('#video-player').html(data.playerCode);
        $('#video-player iframe').attr('width',600);
        $('#video-player iframe').attr('height',338);
        */
        
        /*console.log(data);
        $('#video-player-screenshot-link').attr('href',base_url+'film/'+data.refId);
        $('#video-player-screenshot').attr('src',data.videoStillUrl);
        $('#carousel_video .video-title .title').html(data.name);
        $('#carousel_video .video-description').html(data.shortDescription);
        $('#carousel_video .time-duration').html(data.length);

        $('#carousel_video .social-menu a.fb').attr('href','http://www.facebook.com/share.php?u='+base_url+'film/'+data.refId);
        $('#carousel_video .social-menu a.fb').attr('title',data.name);
        $('#carousel_video .social-menu a.twitter').attr('href','http://twitter.com/share?text='+data.name+'&url='+base_url+'film/'+data.refId);
        */
        
        $('.content-slide .video-title .title').html(data.name);
        $('.content-slide .video-title .time-duration').html(data.length);
        
    },
    
    init_featured_set_1:function()
    {
        $('#tab_list-featured_set_1 li').each(function(){
            $(this).children('a').click(function(){
                id = $(this).attr('rel');
                $('#tab_list-featured_set_1 li a').removeClass('on');
                $(this).addClass('on');
                
                $('#tab_list-featured_set_1-content .tab_content').hide();
                $('#tab_content-'+id).show();
                $('#tab_content-'+id).addClass('current');
            }); 
        });  
    },
    
    init_featured_set_2:function()
    {
        $('#tab_list-featured_set_2 li').each(function(){
            $(this).children('a').click(function(){
                id = $(this).attr('rel');
                $('#tab_list-featured_set_2 li a').removeClass('on');
                $(this).addClass('on');
                
                $('#tab_list-featured_set_2-content .tab_content').hide();
                $('#tab_content-'+id).show();
                $('#tab_content-'+id).addClass('current');
            }); 
        });  
    },
    
    init_carousel_videos:function()
    {
        var $obj = this;
        $('#slide-items .carousel-item').each(function(){
            $(this).click(function(){
                id = $(this).children('a').attr('rel');
                //$('#carousel_video').html('loading '+id +'...');          
                $.ajax({
                    url:base_url + 'home/a_get_video',
                    type:'POST',
                    dataType:'json',
                    data:{refid:id},
                    success:function(data){
                        data.assetDetails[0].refId = id;
                        if (data.assetDetails)
                            $obj.action_populate_carousel_video(data.assetDetails[0]);
                        else
                            alert('does not exist');
                    }
                });
            });
        });
        
        //$('#slide-items .carousel-item:first-child').trigger('click');
    },
    
    selected_filter:null,
    init_discover_search_form:function()
    {
        var $obj = this;
        $('input[name=category]').elementDV({
            'default_value' : 'Search by Category',
            'replace_with' : ''
        });
        $('input[name=language]').elementDV({
            'default_value' : 'Search by Language',
            'replace_with' : ''
        });
        $('input[name=keyword]').elementDV({
            'default_value' : 'Search by Keyword',
            'replace_with' : ''
        });
        
        $('#tab_content-discover form .category').each(function(){
            
            $(this).focus(function(){
                $obj.selected_filter = $(this);
            });
        });
        
        $('#tab_content-discover form .img-button').click(function(){
            
            value = $obj.selected_filter.attr('value');
            filter = $obj.selected_filter.attr('name');
            if (filter.length > 0 && value.length > 0)
            {
                qs = '?filter=' + escape(filter) + '&s='+escape(value);
                //console.log($('#tab_content-discover form').attr('action') + qs);
                window.location = $('#tab_content-discover form').attr('action') + qs;
                
            }
        });
    },
    
    init_featured_videos:function()
    {
        var $obj = this;

        var videos = {};
        $.each($obj.cache,function(ck,cv){
            $.each($obj.settings.featured_videos, function(fvk,fvv){
                if (fvv == cv.title.refId)
                    videos[fvv] = cv;
            })
        });
    
       $('#tab_content-featured_videos').html('loading');

    },
    
    
    init:function()
    {
        var $obj = this;
        $obj.init_carousel_videos();
        $obj.init_featured_set_1();
        $obj.init_featured_set_2();       
    }
};


$(function(){
        
    $(document).ready(function(){
        home.init();
        home.init_discover_search_form();
        
    }); 
    
    // Homepage Slider
    if($('#slide-items-wrapper').length)
    {   
        var transSpeed = 300;
	var delaySpeed = 8000;
	var slideList = $('.active-slides>div.content-slide');	

	var slider = $('#slide-items').bxSlider({
	    mode: 'vertical',
	    infiniteLoop: true,
	    controls: false,
	    pager: false,
	    speed: transSpeed,
	    pause: delaySpeed,
	    auto: true,
	    autoDirection: 'prev',
	    displaySlideQty:3
	});

	$('a.prev').click(function() {
	    slider.goToNextSlide();
	    clearInterval(rotateFunction);
	    goToSpecificSlide(slider.getCurrentSlide(),'up');
	    return false;
	});

	$('a.next').click(function() {
	    slider.goToPreviousSlide();
           
            cur_refid = $($(slider).children('li').get(slider.getCurrentSlide())).children('a').attr('rel');
                      
	    clearInterval(rotateFunction);
            goToSpecificSlide(slider.getCurrentSlide(),'down');
	    return false;
	});
        

	slideList.children().click(function() {
	    slider.stopShow();
	    clearInterval(rotateFunction);
	});


	function goToSpecificSlide(slideIndex,dir) {
            if(dir=='up') slideIndex - 2;
            else if(dir=='down') slideIndex + 2;
            
            if(slideIndex<=0) slideIndex=4;
            
            slideList.css('z-index','0').eq(slideIndex-1).css('z-index','9999').fadeIn(transSpeed,function(){
                    slideList.hide().eq(slideIndex-1).show().css('z-index','0');
            });
	}

	  slideList.hide().eq(3).show();
	  var slideIndex = 2;
	  var slideLength = slideList.length;
	  var rotateFunction = setInterval(function() {
		  slideList.css('z-index','0').eq(slideIndex).css('z-index','9999').fadeIn(transSpeed,function() {
			slideList.hide().eq(slideIndex).show().css('z-index','0');
			slideIndex=slideIndex-1;
		    if(slideIndex==-1) slideIndex=slideLength-1;
		});
	}, delaySpeed);

    }    
    
});
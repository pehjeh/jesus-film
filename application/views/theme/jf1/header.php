<!DOCTYPE html>
<html lang="en"
      xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
  <meta charset="UTF-8" />
  
  <meta property="og:title" content="This is the TITLE"/>
<meta property="og:image" content="<?php print $_theme_path_abs?>css/images/logo.png"/>
<meta property="og:site_name" content="David Walsh Blog"/>
<meta property="og:description" content="Facebook's Open Graph protocol allows for web developers to turn their websites into Facebook "graph" objects, allowing a certain level of customization over how information is carried over from a non-Facebook website to Facebook when a page is 'recommended', 'liked', or just generally shared."/>

  
  <title><?php print $_head_title?> | The Jesus Film</title>
      
  <link rel="stylesheet" href="<?php print $_theme_path_abs?>css/style.css" />
  <link rel="stylesheet" href="<?php print $_theme_path_abs?>css/global.css" />
  <script type="text/javascript">
    var base_url = '<?php echo base_url()?>';
  </script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php print $_theme_path_abs?>js/jquery.elementdv.js"></script>
  <script type="text/javascript" src="<?php print $_theme_path_abs?>js/global.js"></script>
  
  <?php print $_styles?>
  <?php print $_scripts?>
  
  <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php print $_theme_path_abs?>css/style-ie8.css" />
  <![endif]-->

</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=452771731413367";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  
<div id="global-wrapper">
	
<div id="wrapper">

  <div id="header">
	
	<div class="header-text">
	  Equipping the Church with film to share the story of Jesus	
	</div>

    <a href="<?php print $_base_url?>" class="logo">The Jesus Film</a>

      <ul class="main-menu">
      <li class="m-about"><a href="<?php base_url()?>about">About</a>
	     <div class="sub-menu-box">
		   <div class="arrow"></div>
		
		    <div class="sub-menu-content">
		    <ul class="sub-menu">
			  <li class="m-history"><a href="<?php base_url()?>about/history">History &amp; Mission</a></li>
			  <li class="m-faq"><a href="<?php base_url()?>about/faq">FAQ</a></li>
			  <li class="m-get-involved"><a href="<?php base_url()?>about/get-involved">Get Involved</a></li>
			  <li class="m-blog"><a href="<?php base_url()?>about/blog">Blog</a></li>
			</ul>
			
			<p>The goal of the Jesus Film Project is to help share Jesus with everyone in his or her own heart language using media tools and movement building strategies. <a href="#">More</a></p>
			</div>
			
		 </div>
	  </li>
      <li class="m-donate"><a href="<?php base_url()?>donate">Donate</a></li>
      <li class="m-works"><a href="<?php base_url()?>how-it-works">How It Works</a></li>
    </ul>


    <div id="header-search-box" class="search-box">
	<form action="<?php print base_url()?>search" method="get" name="search">
	  <input id="search-keywords" type="text" name="s" value="Search Videos" maxlength="30" />
	</form>
    </div>

   </div>
   
   <div id="content">
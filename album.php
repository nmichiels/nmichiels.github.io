<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	<meta name="author" content="Your Name" />
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="origo.css" title="Origo" media="all" />
	<title>Nick Michiels</title>
	
	
	<?php

    // build feed URL
    $feedURL = "https://picasaweb.google.com/data/feed/api/user/$userid";
	
	
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
    
    // get album name and number of photos
    // $counts = $sxml->children('http://a9.com/-/spec/opensearchrss/1.0/');
    // $total = $counts->totalResults; 
	
	
	foreach ($sxml->entry as $entry) {
	$media = $entry->children('http://search.yahoo.com/mrss/');
	$photographer = $media->group->credit;
	}
	
	
    ?>
	
	
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33583741-3', 'auto');
  ga('send', 'pageview');
ga('set', '&uid', {{'UA-33583741-3'}}); // Set the user ID using signed-in user_id.
</script>

	<!--
	1 ) Reference to the files containing the JavaScript and CSS.
	These files must be located on your server.
-->

<script type="text/javascript" src="highslide/highslide.js"></script>

<!--<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="../highslide/highslide-ie6.css" />
<![endif]-->



<!--
    2) Optionally override the settings defined at the top
    of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
//<![CDATA[
hs.registerOverlay({
	html: '<div class="closebutton" onclick="return hs.close(this)" title="Close"></div>',
	position: 'top right',
	fade: 2 // fading the semi-transparent overlay looks bad in IE
});


hs.graphicsDir = 'highslide/graphics/';
hs.wrapperClassName = 'borderless';
//]]>
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

function toggle_v(e, name, button)
{
	e.preventDefault();
	 $(name).slideToggle( 'fast', 'swing');
	 if ($(button).text() == 'close') {
		$(button).text('click here for more info/results');
		}
		else {
		$(button).text('close');
		}
	 
	 
	
}
$(document).ready(function(e){
 

  
 
})

</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.galleryURL = "xml.php?album=<?php echo $_GET["album"]; ?>%26userid=<?php echo $_GET["userid"]; ?>";
			var params = {};			
			params.allowfullscreen = true;
			params.allowscriptaccess = "always";
			params.wmode = "transparent"; 
			swfobject.embedSWF("simpleviewer.swf", "flashContent", "100%", "100%", "9.0.124", false, flashvars, params);
		</script>
		
		<style type="text/css" media="screen">	
			html, body	{ height:100%; }
			body {			
				margin:0;
				padding:0;
				overflow:auto;
				color:#666;
				font-family:sans-serif;
				font-size:20px;		
			}
			a {	
				color:#ff0000;	
			}
		</style>

</head>

<body class="light green smaller freestyle01" onLoad="resettoggle()">
<div id="layout">
 
	<div class="row smaller">
		<div class="col c5 smaller">
			<h1><a href="index.html">Nick Michiels</a></h1>
		</div>
		
		<div class="col c7 aligncenter">
			<p class="slogan">PhD Student - Expertise Centre for Digital Media - Hasselt University</p>
		</div>
	</div>
  
	<div class="row">
		<div class="col c12 aligncenter">
			<img src="images/front.jpg" width="960" height="240" alt="" />
		</div>
	</div>
 
	<div class="row" id="slide">
		<div class="col c2 alignleft">
			<ul class="menu">
				<li><a href="index.html">About me</a></li>
				<li><a href="publications.html">Publications</a></li>
				<li><a href="teaching.html">Teaching</a></li>
				<li><a href="education.html">Educational Projects</a>
					<!--
					<ul class="subpages">
						<li><a href="index.html">3 columns</a></li>
						<li><a class="current" href="2-col-a.html">2 columns A</a></li>
						<li><a href="2-col-b.html">2 columns B</a></li>
					</ul>
					-->
				</li>
				<li><a href="#">Links</a></li>
			</ul>
		</div>
 
		<div class="col c10">

		<h2>Picasa Gallery</h2>
			<br/>
			<div id="flashContent">SimpleViewer requires JavaScript and the Flash Player. <a href="http://get.adobe.com/flashplayer/">Get Flash</a></div>
			
			<h2>2015</h2>
			
			
		</div>
	</div>
 
	<div id="footer" class="row">
		<div class="col c12 aligncenter">
			<h3>&copy; 2014 Nick Michiels</h3>
			<p><a href="http://andreasviklund.com/templates/origo/">Template design</a> by <a href="http://andreasviklund.com/">Andreas Viklund</a></p>
		</div>
	</div>
 </div>
</body>
</html>

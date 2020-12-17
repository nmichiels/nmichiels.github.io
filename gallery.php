<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	<meta name="author" content="Your Name" />
	<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="origo.css" title="Origo" media="all" />
	<title>Nick Michiels</title>
	
	
	<?
  
	// set default userid in this case (paulvanroekel) and startup album (Pairs)
	// mention any albums to ble blocked in the file blocked_albums.css

	 $userid = (isset($_GET['userid'])) ? $_GET['userid'] : '100389608400628415822'; 	
	 $album = (isset($_GET['album'])) ? $_GET['album'] : 'MijnsiteDeSchachtHeusdenZolder'; 	
		
	?>
    
      <?php

	



    // build feed URL
    $feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid";
	
	
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



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript">
			var flashvars = {};
			flashvars.galleryURL = "xml.php?album=<?php echo (isset($_GET['album'])) ? $_GET['album'] : 'MijnsiteDeSchachtHeusdenZolder'; ?>%26userid=<?php echo (isset($_GET['userid'])) ? $_GET['userid'] : '100389608400628415822'; ?>";
			var params = {};			
			params.allowfullscreen = true;
			params.allowscriptaccess = "always";
			params.wmode = "transparent"; 
			swfobject.embedSWF("simpleviewer.swf", "flashContent", "100%", "100%", "9.0.124", false, flashvars, params);
		</script>
<link href="styles.css" rel="stylesheet" type="text/css" />  
<link href="blocked_albums.css" rel="stylesheet" type="text/css" />

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
			
			<table width="100%">
			<!-- Michiels et al., VISIGRAPP 2015 -->
			
				<?php    
			// iterate over entries in album
			// print each entry's title, size, dimensions, tags, and thumbnail image
			foreach ($sxml->entry as $entry) {
			  $title = $entry->title;
			  $summary = $entry->summary;
			  
			  $gphoto = $entry->children('http://schemas.google.com/photos/2007');
			  $size = $gphoto->size;
			  // h x w of original image!! 
			  $height = $gphoto->height;
			  $width = $gphoto->width;
			  $album = $gphoto->name;
			 
			  
			  $media = $entry->children('http://search.yahoo.com/mrss/');
			  $thumbnail = $media->group->thumbnail;
			   $content = $media->group->content;
			  $tags = $media->group->keywords;
			  $credit = $media->group->credit;
			  $mediatitle = $media->group->title;
			  
		
			  
			  
			  echo "<tr>"; 
				echo "<td class=\"publiImg\"><img class=\"publiImg shadow\" src=\"publications/Michiels_VISIGRAP15/thumb_Michiels_VISIGRAP15.png\" width=\"128\" alt=\"\"></td>";
				echo "<td > ";
				echo "<div class=\"publiInfo\">";
				echo "name: ";
				//echo $test;
				//$elem=new SimpleXMLElement($entry);
				//foreach ($elem as $car)
				  //{
				  //printf("%s has %d children.<br>", $car['name'], $car->count());
				  //}
				  
  
				  
  
				echo "<a id=\"";
					echo $album;
					echo "\" href=\"album.php?album=";
					echo $album;
					echo "&userid=";
					echo $userid;
					echo "\" >";	
					echo $title; 
					echo "</a>"; 
					echo "</div>"; 
					
				echo "</td>"; 
			echo "</tr>"; 
			  
		
			}
			?>
			</table> 
			 <div id="flashContent">SimpleViewer requires JavaScript and the Flash Player. <a href="http://get.adobe.com/flashplayer/">Get Flash</a></div>
			
			
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

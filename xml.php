    <?php


  $userid  = $_GET["userid"];
  $album = $_GET["album"]; 
		
   
	
    // build feed URL
      $feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid/album/$album?imgmax=912";
	 // $feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid?kind=photo&max-results=500";



    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
	
	echo "<simpleviewergallery title=\"$album\" textColor=\"FFFFFF\" galleryStyle=\"MODERN\" thumbPosition=\"LEFT\" frameWidth=\"2\" thumbColumns=\"2\" thumbRows=\"4\" >\n"; 


    // iterate over entries in album
    // print each entry's title, size, dimensions, tags, and thumbnail image
    foreach ($sxml->entry as $entry) {
	  $title = $entry->title;
      $summary = $entry->summary;
      
      $gphoto = $entry->children('http://schemas.google.com/photos/2007');
      $size = $gphoto->size;
      $height = $gphoto->height;
      $width = $gphoto->width;
      
      $media = $entry->children('http://search.yahoo.com/mrss/');
      $thumbnail = $media->group->thumbnail[1];
      $content = $media->group->content;
	  $tags = $media->group->keywords;
  
  		


		echo "<image imageURL=\"";
		// url van photo
		echo $content->attributes()->{'url'};
		echo "\" thumbURL=\"";
		// url van thumb
		echo $thumbnail->attributes()->{'url'};
		echo "\">";
		echo "<caption>";
		echo $summary ;
		echo "</caption>";
		echo "</image>";
		echo "\n";

   
		}
		

	echo "</simpleviewergallery>";

?>
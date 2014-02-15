<?php include 'dbconnect.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/default.css" rel="stylesheet" type="text/css" />
<link href="styles/style8.css" rel="stylesheet" type="text/css" />
<title>News Media Website</title>


<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1//style.css" media="screen" />
	<script type="text/javascript" src="engine1//jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

</head>

<body>
	<!--
	<div id="preheader">
        <div id="login">
    	<img src="images/facebook.jpg" width="28" height="24" alt="facebook" title="facebook" />
        <img src="images/twitter.jpg" width="28" height="24" alt="twitter" title="twitter" />
        <a href="" id="login">Sign-In</a>&nbsp;|&nbsp;<a href="" id="login">Register</a>
        </div>
   -->
    </div>
	<div id="header"> 
            <a href="" id="menulinks">HEADLINES</a>
            <a href="" id="menulinks">WORLD</a>
            <a href="" id="menulinks">POLITICS</a>
            <a href="" id="menulinks">RELIGION</a>
            <a href="" id="menulinks">ENTERTAINMENT</a>
            <a href="" id="menulinks">FASHION</a>
            <a href="" id="menulinks">METRO</a>
            <a href="" id="menulinks">PERSONALS</a>
            <a href=""><img src="images/search.jpg" width="20" height="20" /></a>
            <a href=""><img src="images/login.jpg" width="20" height="20" /></a>
    </div>
    <div id="header_separator1"></div>
    <div id="header_middle">
    	TOP HEADLINES&nbsp;
        <a href="" id="header_middle_links" style="text-decoration:none">Hillary Preparing</a>
         <a href="" id="header_middle_links" style="text-decoration:none">Kentucky Marriage Ban</a>
          <a href="" id="header_middle_links" style="text-decoration:none">Winter Storm</a>
           <a href="" id="header_middle_links" style="text-decoration:none">Olympic Medals</a>
            <a href="" id="header_middle_links" style="text-decoration:none">US CAPITAL BLANKETED</a>
          	
            <span class="social">
            <img src="images/facebook.jpg" width="18" height="14" alt="facebook" title="facebook" />
        	<img src="images/twitter.jpg" width="18" height="14" alt="twitter" title="twitter" />
    		</span>
            <span class="datetime"><?php print(Date("l F d, Y")); ?></span>
          
     
    </div>
    <div id="header_separator2"></div>

    <div id="headline_image">   
     	<img id="image" src="<?php echo $topstory_image ?>" width="960" height="444" />
        <p id="headline_image_text"><?php echo $topstory_headline ?></p>
    </div>

   
    <div id="headline">
    <span class="headline_text2">
	<?php echo substr($topstory_text,0,650); ?>...
    <a href="" id="full_story_link" >Read More</a>
    </span></div>
    <div id="header_separator2"></div>
    <div id="header_separator2"></div>
    <div id="states">FROM AROUND THE NATION</div>
    <div id="story_area">
  
        <div id="story_box">
            <span class="story_box_text1"><?php echo $nation_category[0] ?></span>
            <span class="story_box_image"><img src="<?php echo $nation_image[0] ?>" width="150" height="98"/></span>
            <a href="" id="story_box_text2" style="text-decoration:none"><?php echo $nation_headline[0] ?></a>
        </div>
 		 &nbsp;
         <div id="story_box">
            <span class="story_box_text1"><?php echo $nation_category[1] ?></span>
            <span class="story_box_image"><img src="<?php echo $nation_image[1] ?>" width="150" height="98"/></span>
            <a href="" id="story_box_text2" style="text-decoration:none"><?php echo $nation_headline[1] ?></a>
        </div>
 		 &nbsp;
         <div id="story_box">
            <span class="story_box_text1"><?php echo $nation_category[2] ?></span>
            <span class="story_box_image"><img src="<?php echo $nation_image[2] ?>" width="150" height="98"/></span>
            <a href="" id="story_box_text2" style="text-decoration:none"><?php echo $nation_headline[2] ?></a>
        </div>
 		 &nbsp;
         <div id="story_box">
            <span class="story_box_text1"><?php echo $nation_category[3] ?></span>
            <span class="story_box_image"><img src="<?php echo $nation_image[3] ?>" width="150" height="98"/></span>
            <a href="" id="story_box_text2" style="text-decoration:none"><?php echo $nation_headline[3] ?></a>
        </div>
        &nbsp;
         <div id="story_box">
            <span class="story_box_text1"><?php echo $nation_category[4] ?></span>
            <span class="story_box_image"><img src="<?php echo $nation_image[4] ?>" width="150" height="98"/></span>
            <a href="" id="story_box_text2" style="text-decoration:none"><?php echo $nation_headline[4] ?></a>
        </div>
 		<div id="advertisement"></div>
       
              
    </div>
    </br></br></br></br>
    <div id="header_separator2"></div>
    <div id="worth">WORTH NOTING</div>
  
    <div id="worth_box">
    
    <?php for ($x=5; $x<=37; $x++) { ?>
     <span id="worth_story">
       	<a href="javascript:window.open('<?php echo $nation_article_url[$x] ?>');" id="worth_noting_href">
			<?php echo substr($nation_headline[$x],0,65) ?><?php if (strlen($nation_headline[$x])>65) { ?>...<?php } ?>
        </a><br/>
     </span>
	<?php } ?>
    

    </div>
    <div id="contributors_box">
        <img src="images/faith.jpg" width="60" height="60"/>
  		<span id="contributors_text1">SOME CATCHY<span id="contributors_text2">PHRASE HERE<br/><br/></span><span id="contributors_text3">by Michael Doe</span>  </span> 
        <br/><br/><br/>
        <span id="contributors_text1">ANOTHER CATCHY<span id="contributors_text2">HEADLINE HERE<br/><br/></span><span id="contributors_text3">by Michael Doe</span>  </span> 
        <img src="images/faith.jpg" width="60" height="60"/>
        <br/><br/><br/>
        <img src="images/faith.jpg" width="60" height="60"/>
  		<span id="contributors_text1">SOME CATCHY<span id="contributors_text2">PHRASE HERE<br/><br/></span><span id="contributors_text3">by Michael Doe</span>  </span> 
        <br/><br /><br/><br/><br/>
        <img src="images/poll-banner.jpg" width="332" height="338"/>
       
    </div>
    <div id="advertisement2"></div>
    
	<!--    <div id="advertisement3"></div>-->
    <div id="footer">
    	<div id="footer_column1">
        	SECTIONS</br>
            <span id="footer_separator"></span></br>
            <a href="" id="footer_href">Headlines</a></br>
            <a href="" id="footer_href">World</a></br>
            <a href="" id="footer_href">Politics</a></br>
            <a href="" id="footer_href">Religion</a></br>
            <a href="" id="footer_href">Entertainment</a></br>
            <a href="" id="footer_href">Sports</a></br>
            <a href="" id="footer_href">Fashion</a></br>
        </div>
    	<div id="footer_column2">
        	Social Media</br>
            <span id="footer_separator"></span></br>
            <a href="" id="footer_href">Follow us on Twitter</a></br>
            <a href="" id="footer_href">Like us on Facebook</a></br> 
        </div>
    	<div id="footer_column3">
        	About Us</br>
            <span id="footer_separator"></span></br>
            <a href="" id="footer_href">About Us</a></br>
            <a href="" id="footer_href">Advertise</a></br> 
            <a href="" id="footer_href">Career Opportunities</a></br> 
            <a href="" id="footer_href">Contact Us</a></br> 
        </div>
        
 
    </div>
    <div id="copyright">
        	Website Name &copy;2014
            </br></br>
    </div>
    
</div>
</body>
</html>
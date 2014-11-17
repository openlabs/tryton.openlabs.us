<?php 
$name_of_your_site = "yourcompanyname.com"; 
$email_adress_reciever = "gsrthemes9@gmail.com";

if(isset($_POST['Send']))
{
	include('send.php');	
}
?>

<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<title>Liva - Multipurpose Template</title>
	
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    
    <!-- Favicon --> 
	<link rel="shortcut icon" href="images/favicon.ico">
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600italic,600,400italic,300italic,300|Roboto:100,300,400,500,700&amp;subset=latin,latin-ext' type='text/css' />
    
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
	
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    
    <!-- responsive devices styles -->
	<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    
<!-- just remove the below comments witch color skin you want to use -->
    <!--<link rel="stylesheet" href="css/colors/orange.css" />-->
    <!--<link rel="stylesheet" href="css/colors/lightgreen.css" />-->
    <!--<link rel="stylesheet" href="css/colors/blue.css" />-->
    <!--<link rel="stylesheet" href="css/colors/green.css" />-->
    <!--<link rel="stylesheet" href="css/colors/red.css" />-->
    <!--<link rel="stylesheet" href="css/colors/cyan.css" />-->
    <!--<link rel="stylesheet" href="css/colors/purple.css" />-->
    <!--<link rel="stylesheet" href="css/colors/pink.css" />-->
    <!--<link rel="stylesheet" href="css/colors/brown.css" />-->
    
<!-- just remove the below comments witch bg patterns you want to use --> 
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-default.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-one.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-two.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-three.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-four.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-five.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-six.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-seven.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-eight.css" />-->
    <!--<link rel="stylesheet" href="css/bg-patterns/pattern-nine.css" />-->
    

    
    <!-- sticky menu -->
    <link rel="stylesheet" href="js/sticky-menu/core.css">
    
    <!-- progressbar -->
  	<link rel="stylesheet" href="js/progressbar/ui.progress-bar.css">
    
    
</head>

<body>

<div class="site_wrapper">
   

<!-- HEADER -->
<header id="header">

	<div id="trueHeader">
    
	<div class="wrapper">
    
     <div class="container">
    
		<!-- Logo -->
		<div class="one_fourth"><a href="index.html" id="logo"></a></div>
		
        <!-- Menu -->
        <div class="three_fourth last">
           
           <nav id="access" class="access" role="navigation">
           
            <div id="menu" class="menu">
                
                <ul id="tiny">
                
                    <li><a href="index.html">Home</a></li>  
                    
                    <li><a href="#">Layouts</a>
                    
                    	<ul>
                            <li><a href="http://gsrthemes.com/liva/layout1/fullwidth/index.html">Corporate</a></li>
                            <li><a href="http://gsrthemes.com/liva/layout2/fullwidth/index.html">Business Classic</a></li>
                            <li><a href="http://gsrthemes.com/liva/layout3/fullwidth/index.html">Creative</a></li>
                            <li><a href="http://gsrthemes.com/liva/layout4/fullwidth/index.html">One Page</a></li>
                        </ul>
                    
                    </li>
                    
                    <li><a href="#">Pages</a>
                    
                        <ul>
                            <li><a href="about.html">About Page Style 1</a></li>
                            <li><a href="about-2.html">About Page Style 2</a></li>
                            <li><a href="services.html">Services Style 1</a></li>
                            <li><a href="services-2.html">Services Style 2</a></li>
                            <li><a href="full-width.html">Full Width Page</a></li>
                            <li><a href="left-sidebar.html">Left Sidebar Page</a></li>
                            <li><a href="right-sidebar.html">Right Sidebar Page</a></li>
                            <li><a href="left-nav.html">Left Navigation</a></li>
                            <li><a href="right-nav.html">Right Navigation</a></li>
                            <li><a href="404.html">404 Error Page</a></li>
                        </ul>
                        
                    </li>
                    
                    <li><a href="#">Features</a>
                    
                        <ul>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="columns.html">Page Columns</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">FAQs</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                            <li><a href="#">4 Diffrent Layouts</a></li>                         
                            <li><a href="#">Custom BGs &amp; Colors</a></li>
                            <li><a href="#">PSD Files Included</a></li>                             
                            <li><a href="#">Clean &amp; Valid Code</a></li>
                            <li><a href="#">Useful Typo Elements</a></li>
                            <li><a href="#">Cross Browser Check</a></li>   
                        </ul>
                        
                    </li>
  
                    <li><a href="#">Portfolio</a>
                    
                        <ul>
                            <li><a href="portfolio-one.html">Single Image</a></li>
                            <li><a href="portfolio-two.html">2 Columns</a></li>
                            <li><a href="portfolio-three.html">3 Columns</a></li>
                            <li><a href="portfolio-four.html">4 Columns</a></li>
                            <li><a href="portfolio-five.html">Portfolio + Sidebar</a></li>
                            <li><a href="portfolio-six.html">Portfolio Fancy</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="#">Blog</a>
                    
                        <ul>
                            <li><a href="blog.html">with Large Image</a></li>
                            <li><a href="blog-2.html">with Small Image</a></li>
                            <li><a href="blog-post.html">Single Post</a></li>
                        </ul>
                    </li>
                    
                    <li class="last"><a href="contact.php" class="active">Contact</a></li>
                    
                </ul>
                
            </div>
            
        </nav><!-- end nav menu -->
      
        </div>
        
        
		</div>
		
	</div>
    
	</div>
    
</header><!-- end header -->

<div class="clearfix"></div>

<div class="page_title">

	<div class="container">
		<div class="title"><h1>Full Width</h1></div>
        <div class="pagenation">&nbsp;<a href="index.html">Home</a> <i>/</i> <a href="#">Pages</a> <i>/</i> Full Width</div>
	</div>
</div><!-- end page title --> 


<!-- Contant
======================================= -->

<div class="container">

	<div class="content_fullwidth">
        	
    <div class="one_half">
        

    <p>Feel free to talk to our online representative at any time you please using our Live Chat system on our website or one of the below instant messaging programs.</p>
    <br />
    <p>Please be patient while waiting for response. (24/7 Support!)
    <strong>Phone General Inquiries: 1-888-123-4567-8900</strong></p>

    <br />
    <h3><i>Contact Form</i></h3>

    <form action="" method="post">
    
        <fieldset>
        
        <?php if (!isset($errorC) || $errorC == true){ ?>
        
        <label for="name" class="blocklabel">Your Name*</label>
        <p class="<?php if (isset($the_nameclass)) echo $the_nameclass; ?>" ><input name="yourname" class="input_bg" type="text" id="name" value='<?php if (isset($the_name)) echo $the_name?>'/></p>
        
        
        <label for="email" class="blocklabel">E-Mail*</label>
        <p class="<?php if (isset($the_emailclass)) echo $the_emailclass; ?>" ><input name="email" class="input_bg" type="text" id="email" value='<?php if (isset($the_email)) echo $the_email ?>' /></p>
        
        
        <label for="website" class="blocklabel">Website</label>
        <p><input name="website" class="input_bg" type="text" id="website" value="<?php if (isset($the_website))  echo $the_website?>"/></p>
        
        
        <label for="message" class="blocklabel">Your Message*</label>
        <p class="<?php if (isset($the_messageclass)) echo $the_messageclass; ?>"><textarea name="message" class="textarea_bg" id="message" cols="20" rows="7" ><?php  if (isset($the_message)) echo $the_message ?></textarea></p>
        
        
        <p>
        <input type="hidden" id="myemail" name="myemail" value="<?php echo $email_adress_reciever; ?>" />
        <input type="hidden" id="myblogname" name="myblogname" value="<?php echo $name_of_your_site; ?>" />
        <div class="clearfix"></div>
        <input name="Send" type="submit" value="SUBMIT" class="comment_submit" id="send"/></p>
        <?php } else { ?> 
        
        <div class="success">
            <div class="message-box-wrap">
               Your message has been <strong>Received Successfully!</strong> Thank you!</div>
        </div>
        
        <?php } ?>
        
        </fieldset>
        
        </form> 
    
    </div>
               
    <div class="one_half last">
    
        <div class="address-info">
            <h3><i>Address Info</i></h3>
                <ul>
                <li>
                <strong>Company Name</strong><br />
                2901 Marmora Road, Glassgow, Seattle, WA 98122-1090<br />
                Telephone: +1 1234-567-89000<br />
                FAX: +1 0123-4567-8900<br />
                E-mail: <a href="mailto:mail@companyname.com">mail@companyname.com</a><br />
                Website: <a href="index.html">www.yoursitename.com</a>
                </li>
            </ul>
        </div>

         <h3><i>Find the Address</i></h3>
            <iframe class="google-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=WA,+United+States&amp;aq=0&amp;oq=WA&amp;sll=47.605288,-122.329296&amp;sspn=0.008999,0.016544&amp;ie=UTF8&amp;hq=&amp;hnear=Washington,+District+of+Columbia&amp;t=m&amp;z=7&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=WA,+United+States&amp;aq=0&amp;oq=WA&amp;sll=47.605288,-122.329296&amp;sspn=0.008999,0.016544&amp;ie=UTF8&amp;hq=&amp;hnear=Washington,+District+of+Columbia&amp;t=m&amp;z=7&amp;iwloc=A">View Larger Map</a></small>
        
    </div>
            
</div>

</div><!-- end content area -->


<div class="clearfix mar_top5"></div>

<!-- Footer
======================================= -->

<div class="footer">
	
    <div class="clearfix mar_top7"></div>
	
    <div class="container">
    
   		<div class="one_fourth">
            
            <div class="footer_logo"><img src="images/footer-logo.png" alt="" /></div><!-- end footer logo -->
            
            <ul class="contact_address">
                <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; 2901 Marmora Road, Glassgow,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seattle, WA 98122-1090</li>
                <li><i class="fa fa-phone"></i>&nbsp; 1 -234 -456 -7890</li>
                <li><i class="fa fa-print"></i>&nbsp; 1 -234 -456 -7890</li>
                <li><img src="images/footer-wmap.png" alt="" /></li>
            </ul>
            
        </div><!-- end address section -->
        
        
        <div class="one_fourth">
        	
            <h2>Useful <i>Links</i></h2>
            
            <ul class="list">
                <li><a href="#"><i class="fa fa-angle-right"></i> Home Page Variations</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Awsome Slidershows</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Features and Typography</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Different &amp; Unique Pages</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Single and Portfolios</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Recent Blogs or News</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> Layered PSD Files</a></li>
            </ul>
            
        </div><!-- end useful links -->
        
        
        <div class="one_fourth">
        	
            <div class="twitter_feed">
            
            	<h2>Latest <i>Tweets</i></h2>
                
                <div class="left"><i class="fa fa-twitter fa-lg"></i></div>
                <div class="right"><a href="https://twitter.com/gsrthemes9" target="_blank">gsrthemes9</a>: Avira - Responsive html5 Professional and Brand New Look Template on ThemeForest.<br />
				<a href="#" class="small">.9 days ago</a> .<a href="#" class="small">reply</a> .<a href="#" class="small">retweet</a> .<a href="#" class="small">favorite</a></div>
                
                <div class="clearfix divider_line4"></div>
                
                <div class="left"><i class="fa fa-twitter fa-lg"></i></div>
                <div class="right"><a href="https://twitter.com/gsrthemes9" target="_blank">gsrthemes9</a>: Kinvexy - Responsive HTML5 / CSS3, Professional Corporate Theme.<br />
				<a href="#" class="small">.10 days ago</a> .<a href="#" class="small">reply</a> .<a href="#" class="small">retweet</a> .<a href="#" class="small">favorite</a></div>
                
            </div>
            
        </div><!-- end tweets -->
        
        
        <div class="one_fourth last">
        	
            <h2>Flickr <i>Photos</i></h2>
            
        	<div id="flickr_badge_wrapper">
            	<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=h&amp;source=user&amp;user=93382411%40N07"></script>     
            </div>
            
        </div><!-- end flickr -->
        
        
    </div>
	
    <div class="clearfix mar_top6"></div>
    
</div>


<div class="copyright_info">

    <div class="container">
    
        <div class="one_half">
        
            <b>Copyright © 2013 liva.com. All rights reserved.  <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></b>
            
        </div>
    
    	<div class="one_half last">
     		
            <ul class="footer_social_links">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                <li><a href="#"><i class="fa fa-html5"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
                
    	</div>
    
    </div>
    
</div><!-- end copyright info -->


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->



 
</div>

    
<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="js/universal/jquery.js"></script>



<!-- main menu -->
<script type="text/javascript" src="js/mainmenu/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/mainmenu/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/mainmenu/selectnav.js"></script>

<!-- progress bar -->
<script src="js/progressbar/progress.js" type="text/javascript" charset="utf-8"></script>
  
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-374977-27']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

<script type="text/javascript" src="js/mainmenu/scripts.js"></script>

<!-- scroll up -->
<script type="text/javascript">
    $(document).ready(function(){
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 500);
            return false;
        });
 
    });
</script>

<script type="text/javascript" src="js/sticky-menu/core.js"></script>


<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-56799195-1']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title><?php get_my_title_tag(); ?></title>
<meta charset="UTF-8" />
<meta name="robots" content="noindex, nofollow"/>
<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?> "/>    

<!-- Remy Sharp Shim -->
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Istok+Web%7cLobster+Two%7cShadows+Into+Light+Two' rel='stylesheet' type='text/css'>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    
<!--toggle menu -->
    <script type="text/javascript">
        $(window).load(function() {
            $("#toggle").click(function() {
                $("#nav-main").toggle();
            });
        });

    </script>
<?php wp_head(); ?>
</head>





<body <?php body_class(); ?>>
<div id="wrapper">

<header>
<h1>
<a href="kaelalavin.com/scc/170/wordpress">
<img src="<?php bloginfo('template_directory'); ?>/images/logobrown2.png" id="logo" alt="Krakatoa Lounge">
<span>Krakatoa Lounge</span> <!-- SEO -->
</a>
</h1>

</header>

<img id="toggle" src="<?php bloginfo('template_directory'); ?>/images/multimedia-option.png"  alt="Toggle Menu">
<!--
<nav id="nav-main">
 <ul class="active">
     
     
    <li  id="menus"><a href="menu.php"><br>Menus</a></li>
        
    <li id="about"><a href="about.php"><br>About Us</a></li>
     
     <li id="events"><a href="events.php"  class="stacked">Lounge Events</a></li>
     
     <li id="private"><a href="rental.php"><br>Blog</a></li>
     
    <li id="reviews"><a href="reviews.php"><br>Reviews</a></li>
     
</ul>
</nav>-->
<!--Main Navigation-->
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => 'nav', 'container_id' => 'nav-main', 'items_wrap' => '<ul class="active">%3$s</ul>', ) ); ?>
    



   		<div id="main">
            <div id="content">
		<!-- Main Content -->
         
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Let's Loop! -->

<article class="post-excerpt">                
<h2><a href="<?php the_permalink();  ?>"><?php the_title(); ?></a></h2> <!--Link the page, get the title-->
                
<small>Posted on <?php the_time('F j, Y'); ?> by <?php the_author(); ?> in <?php the_category(', '); ?></small>                
<a href="<?php the_permalink(); ?>">    
    
    <?php the_post_thumbnail( 'thumbnail' ); ?></a>              
                
<?php the_excerpt(''); ?> <!--Grab the content-->
    <p class="read-more"><a href="<?php the_permalink(); ?>">Read More!</a></p>
                </article>
                
<?php endwhile; endif; ?> <!--Loop done!-->
            </div>


<aside id="secondary">

    <div id="sub-navigation" class="widget">
    <?php if (is_page()) : ?>    
    <h2 class="subnav-title">
        <?php echo get_the_title($post->post_parent); ?></h2>
        
        <ul class="subnav-items">
        <?php
if ($post->post_parent) {
    wp_list_pages(array('child_of' => $post->post_parent, 'title_li' => __('')));

    } else {

    wp_list_pages(array('child_of' => $post->ID, 'title_li' => __('')));

}
?>
        </ul>
        <?php endif; ?>
        
        <?php if (!(is_page())) : ?>
        <h2 class="subnav-title">Blog</h2>
        <ul class="subnav-items"><?php wp_list_categories(array('title_li' => __(''))); ?></ul>
        <?php endif; ?>
   
    
    <!--quote-->
    <?php if (get_post_meta($post->ID, 'Quote', true)) : ?> <!--quote?-->
    
    <blockquote><?php echo get_post_meta($post->ID, 'Quote', true); ?></blockquote>
    
    <?php endif; ?>
        
    <?php dynamic_sidebar(1); ?>    
    </div>
   <div>
    <h2>Hours</h2>
      <ul>
        <li>Monday 4pm-2am</li>
        <li>Tuesday 4pm-2am</li>
        <li>Wednesday 4pm-2am</li>
        <li>Thursday 4pm-2am</li>
        <li>Friday 4pm-2am</li>
        <li>Saturday 4pm-2am</li>
        <li>Sunday 4pm-2am</li>
      </ul>
            </div>

</aside>
</div>



<footer class="clear">



    
    <nav id="social">
        <ul>
            <li>
               <a href="https://www.facebook.com/TheBottleNeckLounge" target="_blank">
    <img src="<?php bloginfo('template_directory'); ?>/images/facebook3.png" id="facebook" alt="Facebook"  class="fb">
</a>
            </li>
            <li class="last"><a href="https://twitter.com/bneck" target="_blank">
    <img src="<?php bloginfo('template_directory'); ?>/images/logo22.png" alt="twitter" class="twit"/>
  </a></li>    
        </ul>
    </nav>
<form  action="formhandler.php" method="post">
   <fieldset>
        <label for="email"> Sign Up For Our Newsletter:</label>
        <input type="email" name="email" id="email" maxlength="40" required="required" placeholder="(your email here)" />
   </fieldset>
 </form>
<p>
  <a href="copyright.php">&copy;Kaela Designs
  </a>
</p>

</footer>
</div> <!-- closes wrapper -->

<?php wp_footer(); ?>
</body>
</html>
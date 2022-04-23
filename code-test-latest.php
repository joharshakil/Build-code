•	WORDPRESS
 
•	PHP
 
•	OPENCART
 
•	JQUERY
 
•	EXTENSIONS


/* ============================================================================================================
            Show logo , socail value
=============================================================================================================*/

<?php bloginfo('template_directory'); ?>/

<a href="<?php echo site_url(); ?>"><?php echo $options['logo']  ?></a>


 <?php wp_nav_menu( array( 'menu'=>'top-menu' ) ); ?> 
 
 
/* ============================================================================================================
        Custom Post Call 
=============================================================================================================*/

<?php $index_query = new WP_Query(array( 'post_type' => 'photogallery')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
    
       <?php  $title = get_the_title();  echo multiColor($title, '2') ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      $url = $thumb['0'];
  ?>
        <a href="<?=$url; ?>" class="fancybox" title="<?=the_title(); ?>">
      <?php
            if ( has_post_thumbnail() ) {
            the_post_thumbnail();
            }
            else {
            echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
            } ?>
        </a>
        
         <?php $content = strip_tags(get_the_content()); echo  substr($content, 0, 100); ?>
        
        
        <a href="<?php the_permalink(); ?>" > Read More</a> </p>
    <?php endwhile; wp_reset_query(); ?>
  


<?php echo  get_post_meta(get_the_id(), 'wpcf-google-adsense' , true);  ?>
/* ============================================================================================================
        Post  Post Call 
=============================================================================================================*/
    
    
<?php $index_query = new WP_Query(array( 'post_type' => 'post', 'p' => '12' , 'posts_per_page' => '1')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
   
    <?php endwhile; wp_reset_query(); ?>
    
    
/* ============================================================================================================
        category  Post Call 
=============================================================================================================*/

<?php $latestArticles = new WP_Query( 'category_name=latest-guest-post&posts_per_page=1' ); ?>  
          <?php while( $latestArticles->have_posts() ) : $latestArticles->the_post();  ?>
  
    
    <?php endwhile; wp_reset_query(); ?>
    
    
/* ================================================================
        Tool Set post type code for pages and posts
==================================================================*/
<?php $index_query = new WP_Query(array('post_type'=>'page', 'p'=>'29')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?> 
        <?php
    $csmTitle = get_post_meta(get_the_ID(), 'wpcf-custom-title', true);
        $subHead  = get_post_meta(get_the_ID(), 'wpcf-subheading', true);
    $expIcon  = get_post_meta(get_the_ID(), 'wpcf-excerpt-icon', true);
    $expImg   = get_post_meta(get_the_ID(), 'wpcf-excerpt-image', true);
        $expText  = get_post_meta(get_the_ID(), 'wpcf-excerpt-text', true);
        $expMore  = get_post_meta(get_the_ID(), 'wpcf-excerpt-more', true);
        $expLink  = get_post_meta(get_the_ID(), 'wpcf-excerpt-link', true);
    $expImg   = get_bloginfo('template_directory').'/images/placeholder.png';
        ?>
        <div class="thumb" style="background-image:url('<?php if(!empty($expImg)){ echo $expImg; } else { echo $dfImg; } ?>')"></div>
        <?php if(!empty($expIcon)){ echo '<img src="'.$expIcon.'" alt="" />'; } ?>
        <?php if(!empty($expImg)){ echo '<img src="'.$expImg.'" alt="" />'; } ?>
        <h2><?php if(!empty($csmTitle)){ echo $csmTitle; } else { the_title(); } ?></h2>
        <?php if(!empty($subHead)){ echo "<h3>$subHead</h3>"; } ?>
    <?php if(!empty($expText)){ echo "<p>$expText</p>"; } ?>
        <?php the_content(); ?>
        <a class="moreTag" href="<?php if(!empty($expLink)){ echo $expLink; } else { the_permalink(); } ?>"><?php if(!empty($expMore)){ echo $expMore; } else { echo 'Read More'; } ?></a>

    <?php endwhile; wp_reset_query(); ?> 

/************* by category *******************/
    <?php $index_query = new WP_Query(array('post_type'=>'the-team', 'cat' => '6' )); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?> 

      <?php endwhile; wp_reset_query(); ?>     
    
    
    
  
/* ============================================================================================================
      Change WordPress post date format to time ago using custom template function   
             Facebook style like posted “10 minutes ago”, “1 hour ago”, “3 hours ago”,
=============================================================================================================*/
   
 <?php    
 // add function file
function meks_time_ago() {
  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

?>

<?php 
// Call where u want 
echo meks_time_ago(); /* post date in time ago format */ ?>


/* ============================================================================================================
                Get Server Url
=============================================================================================================*/

<?php
$array = $_SERVER['REQUEST_URI']; 
//echo $array; 

$parts = explode("/", $array);
$cat_name = $parts[3];

?>
/* ============================================================================================================
    
=============================================================================================================*/
<script >

//alert(popular);
$('a[rel="tag"]').each(function() {
  var tag_anc = $(this).html(); 
  $(this).addClass(tag_anc);    
});


var sidebar_adultside_bar = $('.sidebar-adultside-bar').width(); 
$('.sidebar-adultside-bar iframe').css({width:sidebar_adultside_bar}); 


</script>



/* ============================================================================================================
                         if custom field is exist
=============================================================================================================*/
<script >
 $(window).bind('scroll', function () {
     $('.header-area').on("mousewheel", function() {
      // alert($(document).scrollTop());
    });
    if ($(window).scrollTop() > 805) {
    
    
        $('.header-area').addClass('fixed fixed-menu');
    } else {
        $('.header-area').removeClass('fixed fixed-menu');
    }
});
</script>

/* ============================================================================================================
                         if custom field is exist
=============================================================================================================*/
<?php
$key = 'field_name';
$themeta = get_post_meta($post->ID, $key, TRUE);
if($themeta != '') {
echo 'your text';
}
?>

/* ============================================================================================================
                        Page navi
=============================================================================================================*/

    <?php

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    
     $index_query = new WP_Query(array( 'post_type' => 'blog' , 'posts_per_page' => '1','paged'=> $paged)); ?>

      <?php $x=1; while ($index_query->have_posts()) : $index_query->the_post(); ?>

    <?php $x++; endwhile; wp_reset_query(); ?>
        <div class="navigation">
      <div class="nav-page-area"> <?php echo wp_pagenavi( array( 'query' => $index_query ) ); ?></div>
      </div>


/* ============================================================================================================
                        user login status 
=============================================================================================================*/

<?php
    $current_user = wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
?>


/* ============================================================================================================
                        Remove Css from Woo commerce  
=============================================================================================================*/
go to function file and add this code
<?php 
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
  unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
  unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
  return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

?>

/* ============================================================================================================
                         Woo commerce Featured Product
=============================================================================================================*/

<?php
 $args = array( 'post_type' => 'product', 'meta_key' => '_featured', 'meta_value' => 'yes', 'posts_per_page' => 1 ); 
  $index_query = new WP_Query($args);
    
  while ($index_query->have_posts()) : $index_query->the_post(); ?>
    <h3><?php the_title(); ?></h3>
          <p><?php echo $product->get_price_html();  ?></p>
          <?php  the_post_thumbnail('full' , array( 'class' => 'product-img-right1' ) ); ?>
      
            <?php endwhile; wp_reset_query(); ?>
      
            

/* ============================================================================================================
                         Woo commerce Top Sales
=============================================================================================================*/
<?php
 $args = array( 'post_type' => 'product', 'meta_key' => 'total_sales', 'orderby' => 'meta_value_num', 'posts_per_page' => 2 ); 
  $index_query = new WP_Query($args);
    
  while ($index_query->have_posts()) : $index_query->the_post(); ?>
    <h3><?php the_title(); ?></h3>
          <p><?php echo $product->get_price_html();  ?></p>
          <?php  the_post_thumbnail('full' , array( 'class' => 'product-img-right1' ) ); ?>
      
            <?php endwhile; wp_reset_query(); ?>
      
 
 
 
/* ============================================================================================================
                    WordPress & Woo commerce Thumbnail
=============================================================================================================*/
<?php            
            //Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
 
//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)

?>



/* ============================================================================================================
                   cart number show on 
=============================================================================================================*/
ref link :: http://www.boshanka.co.uk/web-design-tutorials-resources/ajaxify-woocommerce-shopping-cart-widget/

<?php 

//add in function file
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php

$fragments['a.cart-contents'] = ob_get_clean();

return $fragments;

}

// call on header or every u want

global $woocommerce; ?>

<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>

//-------------MENU NAVIGATION CSS

header nav li.current_page_item a {color: #2d57a6;}


//===================== woocommerce =========================//

<?php $index_query = new WP_Query(array( 'post_type' => 'slider' , 'posts_per_page' => '-1'  )); ?>

      <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>

        <li>
          <div class="products-image"><?php the_post_thumbnail(); ?> </div>
          <div class="products-cont">
          <img src="<?php the_post_thumbnail_url('full'); ?>">
            <h2><?php the_title(); ?></h2>
            <?php wpautop(the_content()); ?>
             <?php the_excerpt(); ?>
            <h4>
              <?php $sale_price =   get_post_meta(get_the_id(), '_sale_price' , true);  
              $regular_price =   get_post_meta(get_the_id(), '_regular_price' , true);

              if($sale_price){
                $price = $sale_price;
              }else{
                $price = $regular_price;
              }  ?>

              <?php echo '$ '.  $price; ?>
            </h4>
            <a href="<?php the_permalink(); ?>" href="#scroll-to-top">Add to Cart</a> </div>
          </li>
        <?php endwhile; wp_reset_query(); ?>



/* ============================================================================================================
                                             Woo Commerce Star Rating ...
=============================================================================================================*/


<?php global $product;
if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
  return;
}
$review_count = $product->get_review_count();
$average      = $product->get_average_rating(); 
$score = ($average/5)*100;
?>

<div class="review-stats"><span style="width:<?php echo $score; ?>%"><img /></span></div>
<div class="review-count"><?php echo $review_count; ?> Reviews </div>


.review-stats span {
    display: block;
    background: url(images/star-full.jpg) no-repeat 0 0 transparent;
    width: 108px;
    height: 18px;
}
.review-stats {
    background: url(images/star-bg.jpg);
    width: 108px;
    height: 18px;
    float: left;
    position: relative;
}

http://jkp.pixelslogodesign.net/wp-content/themes/jkp/images/star-bg.jpg
http://jkp.pixelslogodesign.net/wp-content/themes/jkp/images/star-full.jpg

/* ============================================================================================================
                                            Page Content ...
=============================================================================================================*/


 <?php  $page = basename(get_permalink()); ?>
<?php $content = get_posts(array('name' => '"'.$page.'"','post_type' => 'page'));
// FOR ID
$content = get_posts(array('page_id' => '27','post_type' => 'page')); 

$image = wp_get_attachment_image_src( get_post_thumbnail_id($content[0]->ID), 'full' ); ?>

<?php echo $content[0]->post_title; ?>
<?php echo wpautop($content[0]->post_content); ?>
<?php echo $image[0]; ?>

<?php echo the_field('designation', get_the_ID()); ?>

/////------------------------ TABLE

    <div class="group-table">
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td width="8%">S.no</td>
          <td width="47%">Art Day at School</td>
          <td width="45%">Age Criteria</td>
        </tr>
        <tr>
          <td width="8%">1</td>
          <td width="47%">Day care</td>
          <td width="45%">6 months- 12 months</td>
        </tr>
        

      </table>
    </div>

.group-table{width:67%; margin:0 auto; padding:30px 0 60px;}
.group-table table{width:100%;}
.group-table tr{width:100%;}
.group-table tr:first-child td{background:#2d3091; font-size:14px; font-weight:bold; color:#FFF;}
.group-table tr td{ border:1px solid #dddddd; font-family: 'Segoe UI';color:#666666;font-size:14px;font-weight: normal; padding:7px 15px;}


///========================= WOOCOMMERCE ADD FILTER CODE


-------Add In function file

// Add Woocommerce Customization
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
function my_theme_wrapper_start() {
  echo '<section class="wooContent"><div class="wrapper">';
    if (!is_product()) {
    get_sidebar('woobar'); 
  } 
}
function my_theme_wrapper_end() {

  echo '</div></section>';
}

---------------- add in function file (register_sidebar postion)

register_sidebar( array(
    'name' => __( 'Woocommerce Sidebar', 'squared' ),
    'id' => 'sidebar-2',
    'description' => __( 'Appears in woocommerce', 'squared' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

  --------------- add file in root theme folder 

  sidebar-woobar.php

  //////--- SLIDER BULLWTS


  .slider-area  .tp-bullets.simplebullets.round .bullet { background-image:none; border:2px solid #fff; border-radius:50%; width:12px; height:12px; margin:0 3px; }
.slider-area  .tp-bullets.simplebullets.round .bullet.selected { background:#0e509a !important; border-color:#fff; }


          <?php echo do_shortcode( '[contact-form-7 id="129" title="contact form"]' ); ?>
         <?php  echo do_shortcode('[rev_slider home_slider]'); ?>
               header nav li.current-menu-item a {color: #ff6600;}

$image = get_field('image');

if( !empty($image) ): ?>

  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>
              


///========================= GET CATEGORY CUSTOM TYPE POST

      <?php
$categories = get_categories(array('post_type' => $post, 'order' => 'ASC' , 'posts_per_page' => -1));
$x=1;

foreach ( $categories as $category ) {
  $img_url = z_taxonomy_image_url($category->term_id);
  ?>

      <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="h-order-info wow rollIn">
          <img src="<?php echo $img_url;  ?>">

          <?php if($category->description != ''){ ?>
          <div class="c-s-order"><?php echo $category->description; ?></div>
           <?php }  ?>
          <h3><?php echo $category->name; ?></h3>
        </div>
      </div>

<?php $x++; } ?>

///========================= CUSTOM TAB SELECTION JQUERY FUNCTION

$(".categories-content-main > div:not(:first)").hide();
$(".categories-tab > ul li").click(function () {
var $index = $(this).index();
$(".categories-content-main > div").eq($index).fadeIn('fast').siblings("div").hide();
$(this).addClass("activetab").siblings().removeClass("activetab");
});

<section class="categories-main">
<div class="section-wrapper">
<div class="categories-tab">
<ul>

<?php $count=0; $index_query = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' => '7' , 'order'=>'desc')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); 
    if($count==0){ $class="activetab"; }else{ $class=""; } ?>
    <li class="<?php echo $class; ?>"><a href="#tab-<?php echo get_the_id(); ?>" > <?php the_title(); ?></a>
        <a href="<?php echo get_site_url(). '/portfolio/'; ?>" class="view-all">View All</a></li>
    <?php $count++; endwhile; wp_reset_query(); ?>

</ul>
</div>
<div class="categories-content-main">

 <?php $count=0; $index_query = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' => '7', 'order'=>'desc')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>

<div class="categories-content" id="tabs-<?php echo get_the_id(); ?>">

<div class="col-6 category-image-big">
<?php the_post_thumbnail(); ?>
</div>
<div class="col-6 category-image-small">
<ul class="thumbnails">


<?php $attachments = new Attachments( 'my_attachments' ,  get_the_id() ); ?>
              <?php if( $attachments->exist() ) : ?>
          <?php while( $attachments->get() ) : ?>

<li><?php echo $attachments->image( 'full' ); ?></li>

          <?php endwhile; ?>
          <?php endif; ?>
</ul>
<?php the_content(); ?>
</div>
</div>

    <?php endwhile; wp_reset_query(); ?> 

</div>
</div>
</section>


///========================= GET ATYTACHMENTS
<?php $count=0; $index_query = new WP_Query(array( 'post_type' => 'portfolio',  'posts_per_page' => '-1')); ?>
    <?php  while ($index_query->have_posts()) : $index_query->the_post(); ?>

      <?php $attachments = new Attachments( 'my_attachments',  get_the_id()  ); ?>
          <?php if( $attachments->exist() ) : ?>
          <?php while( $attachments->get() ) : ?>
            <li><a class="gallery-lida-box" rel="prettyPhoto[1]"   href="<?php echo $attachments->url(); ?>" > <?php echo $attachments->image( 'full' ); ?> </a></li>
          <?php endwhile; ?>
          <?php endif; ?>

    <?php  endwhile; wp_reset_query(); ?>


    //WOOCOMMERCE PRODUCT GALLERY

    add_theme_support('wc-product-gallery-slider');


    //WOOCOMMERCE CHECK PRODUCT IS FEATURE OR NOT

    function wc_add_featured_product_flash() {
  global $product;

  if ( $product->is_featured() ) {
    echo '<img class="star" src="http://webserver-03:901/wp-content/uploads/2017/09/star-1.png">';
  }else{
    echo '<img class="star" src="http://webserver-03:901/wp-content/uploads/2017/09/star2.png">';
  }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'wc_add_featured_product_flash' );
add_action( 'woocommerce_before_single_product_summary', 'wc_add_featured_product_flash' );

///========================= RESPONSIVE

@media only screen and (max-width: 768px) and (orientation: portrait) {
@media only screen and (max-width: 768px) and (orientation: landscape) {
@media ( min-width: 1020px )and ( max-width: 1030px) {


//======== RESPONSIVE MENU

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <nav>
    <ul>
      <li><a href="">Home</a></li>
      <li><a href="">Company </a></li>
      <li><a href="">Technology</a></li>
      <li><a href="">Case Studies</a></li>
      <li><a href="">Blog</a></li>
      <li><a href="">Connect With US</a></li>
    </ul>
  </nav>
</div>

<nav class="home-menu-bar">
  <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Company </a></li>
    <li><a href="">Technology</a></li>
    <li><a href="">Case Studies</a></li>
    <li><a href="">Blog</a></li>
    <li><a href="">Connect With US</a></li>
  </ul>
</nav>

//CSS FOR RESPONSIVE MENU

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#mySidenav nav ul {width: 100%; display: inline-block; padding-left: 8%; padding-right: 8%;}
#mySidenav nav ul li{list-style: none; width:100%; border-bottom: 1px solid #7d7d7d; padding-bottom: 4%; padding-top: 8%; }
#open {color:#fff; display: none;}
.sidenav {  height: 100%;  width: 0;  position: fixed; z-index: 1; top: 0;left: 0; background-color: #111; overflow-x: hidden;  transition: 0.5s;  padding-top: 60px;}
.sidenav a {  font-weight: 400;   color: #ffffff;   font-size: 16px;   text-decoration: none;  text-transform: uppercase;  display: block;transition: 0.3s;}
.sidenav a:hover { color: #f1f1f1;}
.sidenav .closebtn { position: absolute; top: 0; right: 25px; font-size: 36px; margin-left: 50px;}

@media only screen and (max-width: 768px) {
    #open {display: block; float: right;}
    .home-menu-bar {display: none;}

    }

//FUNCTION FOR RESPONSIVE MENU

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


///========================= Load More

.gallery-div {display: none;}

<section class="home-gallery gallery-main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
 <?php $index_query = new WP_Query(array( 'post_type' => 'our_gallery', 'posts_per_page' => '1', 'order'=>'desc')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>

      <?php $attachments = new Attachments( 'my_attachments' ,  get_the_id() ); ?>
              <?php if( $attachments->exist() ) : ?>
          <?php while( $attachments->get() ) : ?>

            <div class="col-md-3 gallery-div"><a href="<?php echo $attachments->url(); ?>" rel="prettyPhoto[1]"><?php echo $attachments->image( 'full' ); ?> </a></div> 


                <?php endwhile; ?>
          <?php endif; ?>

<?php endwhile; wp_reset_query(); ?>   
      
      </div>

      <div class="load-more">
        <a href="#" id="load">Load More</a>
      </div>
    </div>
  </div>
</section>

    $(".gallery-div").slice(0, 8).show(); // select the first ten
    $("#load").click(function(e){ // click event for load more
        e.preventDefault();
        $(".gallery-div:hidden").slice(0, 8).show(); // select next 10 hidden divs and show them
        if($(".gallery-div:hidden").length == 0){ // check if any hidden divs still exist
            //alert("No more divs"); // alert if there are none left

            $(this).hide();
        }
      })

//ON SCROLL

       $(".gallery-div").slice(0, 9).show(); // select the first ten

 $(window).scroll(function() {


    if($(window).scrollTop() == $(document).height() - $(window).height()) {

        $(".gallery-div:hidden").slice(0, 3).fadeIn(400); 

        if($(".gallery-div:hidden").length == 0){ 
          return false;
        }

    }
});

/////----------END LOAD MORe






///------------ GET PARTICULAR POST CATEGORIES

 $categories = get_the_category(get_the_id());

$cat=''; foreach ( $categories as $category ) {
   $cat .= $category->name. ', ';
}
 echo substr($cat, 0, -2);






//-------- GET POSt  Arcieve 
 $args = array(
    'post_type'    => 'blog',
    'type'         => 'monthly',
    'echo'         => 0
);
echo '<ul>'.wp_get_archives($args).'</ul>';

///-----------LIKE TITLE QUERY


add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

    $index_query = new WP_Query(array( 'post_type' => 'blog' , 'posts_per_page' => '1', "cat" => $_POST["category"] , 'post_title_like' => $_POST["title"] , 'paged'=> $paged ));


//ADD CUSTOM SHARING LINK WORDPRESS

https://www.doitwithwp.com/add-sharing-buttons-to-wordpress-no-plugins-or-external-references/


///DEACTIVE PLUGIN CODE (add in functions file)

# Disable WP>3.0 core updates
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

# Disable WP>3.0 plugin updates
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

# Disable WP>3.0 theme updates
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );

# disable core updates:
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );


///SLIDER 


<section class="SliderArea"> 
  
  <div class="slide-item" style="background:url('http://marietta.customaffordabledesign.com/wp-content/uploads/2017/09/slider1.jpg') no-repeat center top; "> 
    <div class="Slider-content-main"> 
      <div class="wrapper"> 
        <div class="Slider-content"> 
          <h2>Indira Devu M.D. <span> Internal Medicine </span></h2>
          <a href="http://marietta.customaffordabledesign.com/services/" class="learn-more-btn">LEARN MORE</a> 
        </div> 
      </div> 
    </div> 
  </div> 

</section>



/*  SLIDER AREA
------------------------------------*/
.SliderArea {width: 100%;}
.SliderArea .slide-item  {}
.Slider-content-main {width: 100%; }
.Slider-content-main .wrapper{ display:table; }
.Slider-content-main .Slider-content {display:table-cell;vertical-align: middle;text-align:start;position: relative;} 



$('.SliderArea').slick({
  dots:true,
  arrows:false,
  speed: 300,
  autoplay:false 
});




<?php $index_query = new WP_Query(array( 'post_type' => 'fishing_spot' , 'posts_per_page' => '-1')); ?>

      <?php $i = 0; while ($index_query->have_posts()) : $index_query->the_post(); ?>

      <?php if (0 == $i % 2) { ?>

       

    <?php } else { ?>

    <?php } ?>

      <?php  $i++; endwhile; wp_reset_query(); ?>




</section>

<?php endwhile; wp_reset_query(); ?>


//-----ONE PAGE SCROLL

$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 100
            }, 1000);
            return false;
        }
    });
});



//CUSTOM CATEGOYR


          <?php
          $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => '4',
            'tax_query'             => array(
              array(
                'taxonomy'      => 'product_cat',
            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
            'terms'         => 15,
            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            )
              )
            );

            ?>
 



Search Results for:
Woommerce Update Support Hooks
To fix this, add the snippet below to functions.php (replace the aventurine prefix in the function with your theme’s or child theme’s prefix):

function aventurine_child_wc_support() {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'aventurine_child_wc_support' );
How To Display Best Selling Product In WooCommerce
On many eCommerce web site home page, we can see the block to display the best selling products. Here in this article I am going to explain you how to get and display the best buying product in WooCommerce.
For retrieving the best buying products in WooCommerce we are using wp_query manipulation with meta_key as “total_sales” and orderby “meta_value_num”. In short we are displaying products as per the total sales number.Here is the code for this

'meta_key' => 'total_sales',
'orderby' => 'meta_value_num',
'posts_per_page' => 1,
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
global $product; ?>
 
echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
else echo ' '; ?>
 

How Change Woocommerce Product Show In Row
Woocommerce Product show per Row
// Override theme default specification for product # per row
function loop_columns() {
return 4; // 5 products per row
}
Product Grid And Listing
//With the help of this code you can toggle your grid view to list view of Product Archive
 
$('a.list-sys').click(function(event) {
 $('div.col-md-3.woocommerce').addClass('list-view');
 $('a.list-sys').addClass('active');
  
$('a.gird-sys').removeClass('active');
 });
 $('a.gird-sys').click(function(event) {
 $('div.col-md-3.woocommerce').removeClass('list-view');
 $('a.gird-sys').addClass('active');
 $('a.list-sys').removeClass('active');
 });
// This code is for  Product Archive  
<div class="tool-bar-op">
<div class="positions"><a href="#" class="gird-sys" ><i class="fa fa-th"aria-hidden="true"></i></a><a href="#" class="list-sys" ><i class="fa fa-list" aria-hidden="true"></i></a></div>
            <?php
                /**
                 * woocommerce_before_shop_loop hook.
                 *
                 * @hooked wc_print_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );
            ?>
</div>
Force HTTPS Redirect
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]
</IfModule>
Social Post Share
Share link for Facebook
<a class="share" href="https://www.facebook.com/sharer/sharer.php?u=<?phpthe_permalink(); ?>&redirect_uri=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
Share link for Twitter
<a class="share" href="https://twitter.com/intent/tweet?text=<?phpthe_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
Share link for Pinterest
<a href="https://www.pinterest.com/pin/create/button/?url=<?phpthe_permalink(); ?>&media=<?php the_post_thumbnail(); ?>&description=<?phpthe_title(); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
Share link for Google Plus
<a class="share nofancybox nolightbox" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
 
Woocommerce Column
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
function loop_columns() {
return 3; // 3 products per row
}
}
Make Photo Gallery Of Current Page Through Add Media
<?php
$images =& get_children( array (
'post_parent' => $post->ID,
'post_type' => 'attachment',
'post_mime_type' => 'image'
));
 
if ( empty($images) ) {
// no attachments here
} else {
foreach ( $images as $attachment_id => $attachment ) {
 
$url= wp_get_attachment_image_src( $attachment->ID, 'fullsize' );
$url = $url[0];
echo "<div class='single-gallery-item'><a href='" .$url. "'>";
echo wp_get_attachment_image( $attachment_id, 'fullsize' );
echo "<a href='" .$url. "' class='enlarge'>Click Here To Enlarge</a></div>"; }
}
?>
Div Height Equal To Screen
$(window).resize(function() {
   $('.fix-height-box').css('height', window.innerHeight+'px');
});
Post Types By Categories
<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
  
foreach( $categories as $category )
{
        $category_link = sprintf(
        '%3$s',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name ) );
        $catids=$category->term_id;
?>
 
                 
                 
<!-----------------------------Taxonomy Title-------------------------------->
    <div class="taxonomytitle"> <?php echo  sprintf( esc_html__( '%s', 'textdomain' ), $category_link ); ?> </div>
 <!-----------------------------Taxonomy Title-------------------------------->
 
  
 <!-----------------------------Taxonomy post-------------------------------->
    
          
    
  <?php
                $args = array( 'posts_per_page' =>-1, 'category' => $catids);
                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    
                    
                         <?php the_title(); ?>
                        <?php $content = get_the_content(); echosubstr($content,0,40); ?>
              
    <?php endforeach;
   wp_reset_postdata(); ?>
    
    <!-----------------------------Taxonomy post-------------------------------->
    
<?php
        }
 
?>
Sticky Header
var stickyOffset = $('.home-content').offset().top;
$(window).scroll(function(){
  var sticky = $('.top-bar'),
      scroll = $(window).scrollTop();
 
  if (scroll >= stickyOffset) sticky.addClass('fixed_header');
  else sticky.removeClass('fixed_header');
});
Image Uploading Error Remove
Media image upload issuse 404 so kindly add below code on function file
add_filter( 'wp_image_editors', 'change_graphic_lib' );
 
function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
Email Title Change Form Wp Email
// Email Address change
 
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
function new_mail_from($old) {
return 'info@startyouressay.com';
}
function new_mail_from_name($old) {
return 'Start Your Essay';
}
Woocommerce Related Products
function woo_related_products_limit() {
  global $product;
     
    $args['posts_per_page'] = 3;
    return $args;
}
 
Or
 
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 3; // 4 related products
    $args['columns'] = 1; // arranged in 2 columns
    return $args;
}
Display Custom Post Type By Taxonomy Name
<?php $index_query = new WP_Query(array( 'post_type' => 'profiles','belongs'=> 'administration', 'posts_per_page' => -1,'orderby' => 'menu_order',
    'order'=>'ASC' )); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
            <?php the_title(); ?>
    <?php endwhile; wp_reset_postdata(); ?>
Get Limit Words In A String
function limit_text($text, $limit) {
  if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos = array_keys($words);
      $text = substr($text, 0, $pos[$limit]) . '...';
  }
  return $text;
}
WP-Ecommerce Content Limit..
First, add the function to your functions.php file:
 
function string_limit_words($string, $word_limit){   $words = explode(' ', $string, ($word_limit + 1));   if(count($words) > $word_limit)   array_pop($words);   return implode(' ', $words);}<u> </u>
 
Then you can use the function “string_limit_words” to echo the text which you save as a variable $excerpt (or anything else):
 
<?php$excerpt =  wpsc_the_product_description(); //Text you want to shorten goes hereecho string_limit_words($excerpt,50);?>
Fetch Youtube Video ID From URL
function youtube_id_from_url($url) {
$pattern =
'%^# Match any youtube URL
(?:https?://)? # Optional scheme. Either http or https
(?:www\.)? # Optional www subdomain
(?: # Group host alternatives
youtu\.be/ # Either youtu.be,
| youtube\.com # or youtube.com
(?: # Group path alternatives
/embed/ # Either /embed/
| /v/ # or /v/
| /watch\?v= # or /watch\?v=
) # End path alternatives.
) # End host alternatives.
([\w-]{10,12}) # Allow 10-12 for 11 char youtube id.
$%x'
;
$result = preg_match($pattern, $url, $matches);
if ($result) {
return $matches[1];
}
return false;
}
echo youtube_id_from_url('http://youtu.be/NLqAF9hrVbY'); # NLqAF9hrVbY
Image Uploading Error Remove
add_filter( 'wp_image_editors', 'change_graphic_lib' );
 
function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
Smooth Scrolling Using JQuery
<script>
$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});
<script>
 
 
 
<div id="top">
    <a href="#section1">Go Section 1</a>
    <a href="#section2">Go Section 2</a>
</div>
<div id="section1">
    <!-- Content goes here -->
</div>
<div id="section2">
    <a href="#top">BackToTop</a>
    <!-- Content goes here -->
</div>
WordPress Default Pagination
<?php
  // set up or arguments for our custom query
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $query_args = array(
    'post_type' => 'post',
    'category_name' => 'tutorials',
    'posts_per_page' => 5,
    'paged' => $paged
  );
  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
?>
 
<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
  <article>
    <h1><?php echo the_title(); ?></h1>
    <div class="excerpt">
      <?php the_excerpt(); ?>
    </div>
  </article>
<?php endwhile; ?>
 
<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
    </div>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
    </div>
  </nav>
<?php } ?>
 
<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>
<?php endif; ?>
Remove Jquery And Css Version From Links
// Remove WP Version From Styles   
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
 
// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
Taxanomy And Category Name With Slug
$categories = get_the_terms( $post->ID, 'taxonomy' );
// now you can view your category in array:
// using var_dump( $categories );
// or you can take all with foreach:
foreach( $categories as $category ) {
    echo $category->term_id . ', ' . $category->slug . ', ' . $category->name . '<br />';
}
 
$categories = get_the_category( $post->ID );
// now you can view your category in array:
// using var_dump( $categories );
// or you can take all with foreach:
foreach( $categories as $category ) {
    echo $category->term_id . ', ' . $category->slug . ', ' . $category->name . '<br />';
}
Gallery Images
global $post;
 
$thumbnail_ID = get_post_thumbnail_id();
 
$images = get_children( array('post_parent' => 11, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order'=> 'ASC', 'orderby' => 'menu_order ID') );
 
if ($images) :
    echo '<div class="gallery">';
 
    foreach ($images as $attachment_id => $image) :
 
    if ( $image->ID != $thumbnail_ID ) :
 
        $img_title = $image->post_title;   // title.
        $img_caption = $image->post_excerpt; // caption.
        $img_description = $image->post_content; // description.
 
        $img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt
        if ($img_alt == '') : $img_alt = $img_title; endif;
 
        $big_array = image_downsize( $image->ID, 'large' );
        $img_url = $big_array[0];
 
        ?>
 
        <div class="slide">
            <div  class="description">
                <p class="title"><strong><?php echo $img_title; ?></strong></p>
                <?php if ($img_caption) : echo wpautop($img_caption, 'caption'); endif; ?>
                <?php if ($img_description) : echo wpautop($img_description); endif; ?>
            </div>
            <div class="image">
                <p><img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>" /></p>
            </div>
        </div>
 
    <?php endif; ?>
    <?php endforeach; ?>
    </div><!-- End gallery -->
<?php endif;
How To Disallow Enter Key On A Form Using JavaScript
You may have come across situations where you don’t want the HTML form to submit on pressing Enter key. The reason could be that you may have a long form which the user needs to fill and most users may have the habit of pressing Enter key when trying to move to the next field.
We will use JavaScript for this purpose. There is an onkeypress event we will use for this purpose. We can setup a callback function against this event and check for the Enter key ASCII code and return false so that the action does not take place.
<script type="text/javascript">
function keypressAction(evt) {
var evt = (evt) ? evt : ((event) ? event : null);
if (evt.keyCode == 13) { return false; }
}
document.onkeypress = keypressAction;
</script>
Hope the above helped.
How To Detect Broken Image Url In PHP
Below Code will help you to detect, if image url is broken, I used this code in WordPress with in foreach loop. I hope this will help you out according to your need.
$file = $img_list_item; // raw image Url
if (@GetImageSize($file)) {
echo 'Image Exist';
 <a href="'.get_permalink($postID).'"><img style="width: 160px; height: 154px;" src="http://ronaldwebdeveloper.com/wp-content/uploads/2016/09/download.jpeg" /></a>

   
//IF IMAGE DOSE NOT EXISTS
} else {
echo  "image does not exist ";
<b>If Image Does not Exist this temporary Image will be appear</b>
<a href="'.get_permalink($postID).'"> <img style="width: 160px; height: 154px;" src="http://placehold.it/160x154" />;

}
</a>

SHORT SAMPLE CODE BELOW
<span style="color: #339966;"><strong>$file = $img_list_item; // raw image Url
if (@GetImageSize($file)) {
echo 'Image Exist';
}
else {
echo "image does not exist ";
}</strong></span>
Sticky Sliding Sidebar
It will help you to achieve sticky sidebar on scroll, with fixed css positions
$(function() {
var offset = $("#sidebar").offset(); // Sidebar ID
var mbOffset = $(".columns-content7").offset(); // On the div which you have to stop the sliding Div
var mbPos = mbOffset.top - $("#sidebar").outerHeight() - 30;  /*30px extra space*/
var topPadding = 15;
$(window).scroll(function() {
if ($(window).scrollTop() &gt; offset.top ) {
if( $(window).scrollTop() &lt; mbPos ) {
$("#sidebar").stop().animate({
marginTop: $(window).scrollTop() - offset.top + topPadding
});
}
} else {
$("#sidebar").stop().animate({
marginTop: 0
});
};
});
});
Detail Explained

QTranslate-X – Get Current Language Code
You can use the function to run particular code for different languages:
if (qtranxf_getLanguage() == 'en') {
// run code here if the current language is English
} elseif (qtranxf_getLanguage() == 'ar') {
// run code here if the current language is arabic
}
Breadcrumbs
Function Call the_breadcrumb();
Add this function on function file …
// breadcrumbs
function the_breadcrumb() {
    if (!is_home()) {
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo "Home</a> / ";
        if (is_category() || is_single()) {
            foreach((get_the_category()) as $category) {
            echo $category->cat_name . ' ';
            }
            if ($category->cat_name == "") {
                $post_type = get_post_type_object( get_post_type($post) );
                echo $post_type->labels->name ;
                }
            if (is_single()) {
                echo " / ";
                the_title();
            }
        }
        elseif (is_page()) {
            echo the_title();
        }
        elseif (is_tag()) {
            echo single_tag_title();
        }
        elseif (is_day()) {
            echo "Archive for ";
            the_time('F jS, Y');
        }
        elseif (is_month()) {
            echo "Archive for ";
            the_time('F, Y');
        }
        elseif (is_year()) {
            echo "Archive for ";
            the_time('Y');
        }
        elseif (is_author()) {
            echo "Author Archive";
        }
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        echo "Blog Archives";
        }
        elseif (is_search()) {
        echo "Search Results";
        }
    }
}
WordPress Top Level Parent Page Display
<?php if ( 0 == $post->post_parent ) {
    the_title();
} else {
    $parents = get_post_ancestors( $post->ID );
    echo apply_filters( "the_title", get_the_title( end ( $parents ) ) );
} ?>
WordPress Parent Page Display
<?php
echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
?>
Swift Colours Literal
Colors Literal – using swift
#imageLiterals, #colorLiterals
Thanks to Erica Sadun, we have a rejuvenated way of working with UIColors & UIImages (and also resource files !). With the release of Swift 3, one can simply use literals for colors and images also, instead of instantiating them with the regular initializers.
Php Date Format
<?php
$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
?>
Dummy
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
<?php $index_query = new WP_Query(array( 'post_type' => 'post', 'p' => '12' , 'posts_per_page' => '1')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
    
    <?php endwhile; wp_reset_query(); ?>
old
<?php $index_query = new WP_Query(array( 'post_type' => 'post', 'p' => '12' , 'posts_per_page' => '1')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
    
    <?php endwhile; wp_reset_query(); ?>
Category Post Call
<?php $latestArticles = new WP_Query( 'category_name=latest-guest-post&posts_per_page=1' ); ?>   
          <?php while( $latestArticles->have_posts() ) : $latestArticles->the_post();  ?>
     
    <?php endwhile; wp_reset_query(); ?>
Change WordPress Post Date Format
Change WordPress post date format to time ago using custom template function
Facebook style like posted “10 minutes ago”, “1 hour ago”, “3 hours ago”,
<?php   
 // add function file
function meks_time_ago() {
    return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}
// Call where u want
echo meks_time_ago(); /* post date in time ago format */ ?>
Get Server Url
<?php
$array = $_SERVER['REQUEST_URI'];
//echo $array;
 
$parts = explode("/", $array);
$cat_name = $parts[3];
 
?>
If Custom Field Is Exist
<?php
$key = 'field_name';
$themeta = get_post_meta($post->ID, $key, TRUE);
if($themeta != '') {
echo 'your text';
}
?>
User Login Status
<?php
    $current_user = wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
?>
Remove Css From Woo Commerce
<?php
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );     // Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
    return $enqueue_styles;
}
 
// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
 
?>
Woo Commerce Product Short Description
<?php echo get_post_meta(get_the_ID(), 'title-description', true); ?>
Woo Commerce Featured Product
<?php
$args = array( 'post_type' => 'product', 'meta_key' => '_featured', 'meta_value' => 'yes', 'posts_per_page' => -1 );
$index_query = new WP_Query($args);
 
while ($index_query->have_posts()) : $index_query->the_post(); ?>
<h3><?php the_title(); ?></h3>
<p><?php echo $product->get_price_html(); ?></p>
<?php the_post_thumbnail('full' , array( 'class' => 'product-img-right1' ) ); ?>
 
<?php endwhile; wp_reset_query(); ?>
Woo Commerce Top Sales
<?php
$args = array( 'post_type' => 'product', 'meta_key' => 'total_sales', 'orderby' => 'meta_value_num', 'posts_per_page' => '-1' );
$index_query = new WP_Query($args);
 
while ($index_query->have_posts()) : $index_query->the_post(); ?>
<h3><?php the_title(); ?></h3>
<p><?php echo $product->get_price_html();  ?></p>
<?php  the_post_thumbnail('full' , array( 'class' => 'product-img-right1' ) ); ?>
 
<?php endwhile; wp_reset_query(); ?>
            
WordPress & Woo Commerce Thumbnail
            //Default WordPress
the_post_thumbnail( 'thumbnail' );     // Thumbnail (150 x 150 hard cropped)
the_post_thumbnail( 'medium' );        // Medium resolution (300 x 300 max height 300px)
the_post_thumbnail( 'medium_large' );  // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
the_post_thumbnail( 'large' );         // Large resolution (1024 x 1024 max height 1024px)
the_post_thumbnail( 'full' );          // Full resolution (original size uploaded)
  
//With WooCommerce
the_post_thumbnail( 'shop_thumbnail' ); // Shop thumbnail (180 x 180 hard cropped)
the_post_thumbnail( 'shop_catalog' );   // Shop catalog (300 x 300 hard cropped)
the_post_thumbnail( 'shop_single' );    // Shop single (600 x 600 hard cropped)
Email Address Change
// Change default WordPress email address
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
function new_mail_from($old) {
return 'info@codelibray.com';
}
function new_mail_from_name($old) {
return 'Code Libray ';
}
Media Image Is Not Upload Issues
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '64MB');
set_time_limit(90);
/* That's all, stop editing! Happy blogging. */
 
/// add in function file
 
add_filter( 'wp_image_editors', 'change_graphic_lib' );
 
function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
Home
Hello World!
Welcome to WordPress. This is your first post. Edit or delete it, then start writing!
Redirect To Paypall With Attributes
<a href= "https://www.paypal.com/cgi-bin/webscr?business=cmstestchecker@yahoo.com&cmd=_xclick&currency_code=GBP&amount=<?php echo $finalprice; ?>&item_name=Max Van&quantity=1"><img src="<?php bloginfo('template_directory'); ?>/images/submitorange.png" /></a>
 
OR
 
<?php $fixed = 30; ?><form method="post" action="https://www.paypal.com/cgi-bin/webscr"><input type="hidden" name="cmd" value="_xclick"><inputtype="hidden" name="business" value="ponkaamera2@gmail.com"><inputtype="hidden" name="item_name" value="Max Van"><input type="hidden"name="item_number" value="123"><input type="hidden" name="amount" value="<?php echo $fixed; ?>"><input type="hidden" name="shipping" value="1.00"><inputtype="hidden" name="shipping2" value="0.50"><input type="hidden"name="handling" value="2.00"><input type="hidden" name="currency_code"value="USD"><input type="hidden" name="return"value="http://xcmsnew:1248/booking-email/"><input type="hidden"name="undefined_quantity" value="1"><input type="image"src="http://www.paypalobjects.com/en_US/i/btn/x-click-but23.gif" border="0"name="submit" width="68" height="23" alt="Make payments with PayPal - it's fast, free and secure!"></form>
Post Call
<?php $index_query = new WP_Query(array( 'post_type' => 'post', 'p' => '12' , 'posts_per_page' => '1')); ?>
    <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
    
    <?php endwhile; wp_reset_query(); ?>

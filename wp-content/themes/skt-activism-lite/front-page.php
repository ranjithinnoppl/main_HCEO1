<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Activism Lite
 */
get_header(); 

$hideslide = get_theme_mod('hide_slides', 1);
$secwithcontent = get_theme_mod('hide_sectionone', 1);
$hide_sectiontwo = get_theme_mod('hide_home_2_content', 1);
$hide_sectionthree = get_theme_mod('hide_home_3_content', 1);

if (!is_home() && is_front_page()) { 
if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$slidepages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $slidepages[] = $mod;
    }	
} 
if( !empty($slidepages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $slidepages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
    <div class="slider-shadow"></div>	
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">      	
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $skt_activism_lite_slideno[] = $i;
          $skt_activism_lite_slidetitle[] = get_the_title();
		  $skt_activism_lite_slidedesc[] = get_the_excerpt();
          $skt_activism_lite_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $skt_activism_lite_slideno as $skt_activism_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $skt_activism_lite_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($skt_activism_lite_slidetitle[$k] ); ?></h2>
        <p><?php echo esc_html($skt_activism_lite_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide_more" href="<?php echo esc_url($skt_activism_lite_slidelink[$k] ); ?>">
          <?php esc_html_e('Become Activist', 'skt-activism-lite');?>
        </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } endif; endif; ?>
  </div>
</section>
<?php } } 
	if(!is_home() && is_front_page()){ 
	if( $secwithcontent == '') {
?>
<section id="sectionone">
	<div class="center">
         <div class="home_section1_content">
            <div class="row_area">
    		<?php 
                for($l=1; $l<5; $l++) { 
                if( get_theme_mod('page-column-left'.$l,false)) {
                $section1block = new WP_query('page_id='.get_theme_mod('page-column-left'.$l,true)); 
                while( $section1block->have_posts() ) : $section1block->the_post(); 
            ?> 
             <a href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="servicebox boxpattern-1 <?php echo esc_attr('hmsb-'.$l);?>">
           		<?php  if( has_post_thumbnail() ) { ?> 
                <div class="hm-serv-icon"><?php the_post_thumbnail('full'); ?></div>
                <?php } ?>
                <div class="hm-serv-title"><h4><?php the_title(); ?></h4></div>
            </div>
            </a>
					<?php endwhile; wp_reset_postdata(); 
               }} 
            ?>		
<div class="clear"></div>
</div>  
         </div>
    </div>
</section>
<?php }}  
if (!is_home() && is_front_page()) { 
if( $hide_sectiontwo == '') { ?>
<section class="hometwo_section_area">
<div class="center">
<?php 
	if( get_theme_mod('page-sectwo-1',false)) {
	$section2block = new WP_query('page_id='.get_theme_mod('page-sectwo-1',true)); 
	while( $section2block->have_posts() ) : $section2block->the_post(); 
?> 
	<?php  if( has_post_thumbnail() ) { ?> 
	<div class="hometwo-leftar"><?php the_post_thumbnail('full'); ?></div>
    <?php } ?>
    <div class="<?php  if( has_post_thumbnail() ) { ?>hometwo-rightar<?php }else{?>hometwo-rightarfull<?php } ?>">
    	<h2><?php the_title(); ?></h2>
        <div class="hometwo-cntnt"><?php the_content(); ?></div>
    </div>
    <div class="clear"></div>
 
<?php endwhile; wp_reset_postdata(); 
   } 
?>

</div>    	 
</section>
<?php } } ?>

<?php
if (!is_home() && is_front_page()) { 
if( $hide_sectionthree == '') { ?>
<section class="homethree_section_area">
<div class="center">
<?php
	$section3_title = get_theme_mod('section3_title');
	if(!empty($section3_title)){?>
		<h2><?php echo esc_html($section3_title);?></h2>
<?php } ?>  
<div class="row_area">
<?php 
	for($z=1; $z<4; $z++) { 
	if( get_theme_mod('page-secthree-'.$z,false)) {
	$section3block = new WP_query('page_id='.get_theme_mod('page-secthree-'.$z,true)); 
	while( $section3block->have_posts() ) : $section3block->the_post(); 
?> 
	<a href="<?php echo esc_url( get_permalink() ); ?>">
    <div class="hm3cols">
    	<?php  if( has_post_thumbnail() ) { ?>
    	<div class="hm3icon"><?php the_post_thumbnail('full'); ?></div>
        <?php } ?>
        <div class="hm3title"><?php the_title(); ?></div>
        <div class="hm3content"><?php the_excerpt(); ?></div>
    </div>
    </a>
 
<?php endwhile; wp_reset_postdata(); 
	}} 
?>
<div class="clear"></div>
</div>
</div>    	 
</section>
<?php } } ?>


<div class="clear"></div>
<div class="container">
<div id="content_navigator">
     <div class="page_content">
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-activism-lite' ),
							'next_text' => esc_html__( 'Next', 'skt-activism-lite' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                             <?php
                            the_content();
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-activism-lite' ),
							'next_text' => esc_html__( 'Next', 'skt-activism-lite' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
  </div>
</div><!-- content -->
<?php get_footer(); ?>
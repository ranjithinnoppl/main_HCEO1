<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_solar_energy_before_slider' ); ?>

  <?php if(get_theme_mod('vw_solar_energy_slider_hide_show')==1){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'vw_solar_energy_slider_speed',3000)) ?>"> 
        <?php $vw_solar_energy_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_solar_energy_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_solar_energy_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_solar_energy_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_solar_energy_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_solar_energy_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_solar_energy_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_solar_energy_slider_button_text','DISCOVER MORE') != ''){ ?>
                    <div class="more-btn">
                      <a class="animated-button victoria-one" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_solar_energy_slider_button_text',__('DISCOVER MORE','vw-solar-energy')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_solar_energy_slider_button_text',__('DISCOVER MORE','vw-solar-energy')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-solar-energy' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-solar-energy' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_solar_energy_after_slider' ); ?>

  <section id="main_part">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <section id="about">
            <?php $vw_solar_energy_about_pages = array();
              $mod = absint( get_theme_mod( 'vw_solar_energy_about_page' ));
              if ( 'page-none-selected' != $mod ) {
                $vw_solar_energy_about_pages[] = $mod;
              }
            if( !empty($vw_solar_energy_about_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_solar_energy_about_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <h2><?php the_title(); ?></h2>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_solar_energy_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_solar_energy_about_excerpt_number','30')))); ?></p>
                  <div class="sec-image">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <?php if( get_theme_mod('vw_solar_energy_about_button_text','READ MORE') != ''){ ?>
                    <div class="about-btn">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_solar_energy_about_button_text',__('READ MORE','vw-solar-energy')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_solar_energy_about_button_text',__('READ MORE','vw-solar-energy')));?></span></a>
                    </div>
                  <?php } ?>
                <?php endwhile; ?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php endif;
            endif;
            wp_reset_postdata()?>
            <div class="clearfix"></div> 
          </section>
        </div>
        <div class="col-lg-6 col-md-6">
          <section id="our_services">
            <?php
              $vw_solar_energy_catData =  get_theme_mod('vw_solar_energy_services');
                if($vw_solar_energy_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html($vw_solar_energy_catData,'vw-solar-energy'))); ?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="col-lg-8 col-md-8">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_solar_energy_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_solar_energy_about_excerpt_number','30')))); ?></p>
                  </div>          
                </div>
              <?php endwhile;
              wp_reset_postdata();
            } ?>
          </section>
        </div>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_solar_energy_after_about' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
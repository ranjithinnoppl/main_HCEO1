<?php
//about theme info
add_action( 'admin_menu', 'skt_activism_lite_abouttheme' );
function skt_activism_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-activism-lite'), esc_html__('About Theme', 'skt-activism-lite'), 'edit_theme_options', 'skt_activism_lite_guide', 'skt_activism_lite_mostrar_guide');   
} 
//guidline for about theme
function skt_activism_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-activism-lite'); ?>
		   </div>
          <p><?php esc_html_e('SKT Activism Lite is a multipurpose template and comes packed with (60+ ready to import elementor templates along with it). Use it to create any type of business, personal, blog and eCommerce website. It is fast, flexible, simple and fully customizable. Free social activist template for change, protest, injustice, NGO, non profit, donation, fundraiser, campaign, social work, government and international, law and public policy, environmental, human rights, veteran rights, wildlife prevention, community organization, agenda to bring change in society and culture. Works with WooCommerce, SKT Donation plugin, SEO plugins.','skt-activism-lite'); ?></p>
		  <a href="<?php echo esc_url(SKT_ACTIVISM_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_ACTIVISM_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-activism-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_ACTIVISM_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-activism-lite'); ?></a> | 
				<a href="<?php echo esc_url(SKT_ACTIVISM_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-activism-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_ACTIVISM_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>
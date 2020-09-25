<?php
/**
 * The template part for topbar
 *
 * @package VW Solar Energy 
 * @subpackage vw_solar_energy
 * @since VW Solar Energy 1.0
 */
?>
<?php if( get_theme_mod('vw_solar_energy_topbar_hide_show') != ''){ ?>
	<div id="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="row">
			        	<div class="col-lg-3 col-md-3">
			        		<?php if(get_theme_mod('vw_solar_energy_phone') != ''){ ?>
								<i class="<?php echo esc_attr(get_theme_mod('vw_solar_energy_phone_number_icon','fas fa-phone')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_solar_energy_phone',''));?></span>
							<?php }?>
						</div>
			        	<div class="col-lg-4 col-md-4">
			        		<?php if(get_theme_mod('vw_solar_energy_email_address') != ''){ ?>
			        			<i class="<?php echo esc_attr(get_theme_mod('vw_solar_energy_email_address_icon','fas fa-envelope-open')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_solar_energy_email_address',''));?></span>
			        		<?php }?>
			        	</div>
			        	<div class="col-lg-5 col-md-5">
			        		<?php if(get_theme_mod('vw_solar_energy_timming') != ''){ ?>
			        			<i class="<?php echo esc_attr(get_theme_mod('vw_solar_energy_timing_icon','far fa-clock')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_solar_energy_timming',''));?></span>
			        		<?php }?>
			        	</div>
			        </div>
		        </div>
	        	<div class="col-lg-4 col-md-12">
	        		<?php dynamic_sidebar('social-widget'); ?>
	        	</div>
	        </div>
		</div>
	</div>
<?php } ?>
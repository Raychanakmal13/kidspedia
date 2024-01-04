<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Toocheke
 */

if (!is_active_sidebar('right-sidebar')) {
    return;
}
?>
    <!--START SIDEBAR-->
 <div class="col-lg-4">
                  <div id="side-bar" class="secondary">
	<?php dynamic_sidebar('right-sidebar');?>
    </div>
               </div>
               <!--END SIDEBAR-->

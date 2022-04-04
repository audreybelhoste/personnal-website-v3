<?php
/*
* Theme Name: © Portfolio Audrey Belhoste
* Author: Audrey Belhoste
* Version: 0.0.1
* Text Domain: portfolio
* Description: Front page template
*			   Portfolio website for Audrey Belhoste
*/

get_header(); ?>


<?php //------------MAIN CONTENT-----------------------
?>
<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

	<div class="container">

		<?php get_template_part("partials/front-page/presentation"); ?>

		<?php get_template_part("partials/front-page/projects"); ?>

		<?php get_template_part("partials/front-page/contact"); ?>
      
    </div>

</main>
<?php //------------END MAIN CONTENT-------------------
?>

<?php get_footer();

<?php
/*
* Theme Name: © Portfolio Audrey Belhoste
* Author: Audrey Belhoste
* Version: 0.0.1
* Text Domain: portfolio
* Description: Page template
*              Portfolio website for Audrey Belhoste
*/

get_header(); ?>

<?php //------------MAIN CONTENT-----------------------?>
<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------TITLE-----------------------?>
    <div class="main-page-title">
        <?php get_template_part('partials/sub-header'); ?>
    </div>

    <?php //------------CONTENT-----------------------?>
    <section class="error404">
        <div class="container">
        	<div class="wysiwyg">
        		<p>
        			<?=__('Oups, la page que vous cherchez n\'existe pas ou n\'existe plus.', 'portfolio')?>
        		</p>
        	</div>
        </div>
    </section>
</main>
<?php //------------END MAIN CONTENT-------------------?>

<?php get_footer();

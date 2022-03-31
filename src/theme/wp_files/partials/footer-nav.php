<footer class="mainFooter">

    <?php //Liens d'évitements 
    ?>
    <ul class="skip-links">
        <li>
            <?php $label = __('Passer le pied de page et revenir en début de page', '@@themeName'); ?>
            <a accesskey="0" title="<?= $label ?>" href="#body">
                <?= $label ?>
            </a>
        </li>
    </ul>

    <div class="mainFooter__wrapper">

        <div class="mainFooter__content">

            <figure class="mainFooter__content__logo">
                <?php $logo = get_field('logo_light', 'options'); ?>
                <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
            </figure>

            <nav class="mainFooter__content__nav">
                <ul>
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'footer-main-nav',
                        'depth'             => 1,
                        'container'         => '',
                        'items_wrap'        => '%3$s',
                        'container_class'   => 'menu',
                    ));
                    ?>
                </ul>
            </nav>

            <?php if (have_rows('social', 'options')) : ?>
                <nav class="mainFooter__content__social">
                    <ul>
                        <?php while (have_rows('social', 'options')) : the_row(); ?>

                            <li>
                                <a href="<?php the_sub_field('social_link', 'options'); ?>">
                                    <?php $icon = get_sub_field('social_icon', 'options'); ?>
                                    <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                </a>
                            </li>

                        <?php endwhile; ?>
                    </ul>
                </nav>
            <?php endif; ?>


        </div>

        <div class="mainFooter__sub">

            <nav class="mainFooter__sub__nav">
                <ul>
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'footer-secondary-nav',
                        'depth'             => 1,
                        'container'         => '',
                        'items_wrap'        => '%3$s',
                        'container_class'   => 'menu',
                    ));
                    ?>
                </ul>
            </nav>

            <p class="mainFooter__sub__info">© Objectware-Training - Réalisation <a href="https://concept-image.fr/">Concept Image</a></p>

        </div>

    </div>

</footer>
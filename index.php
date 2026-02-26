<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="masthead">
    <?php forge_ui_get_header(); ?>
</header>

<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<footer id="colophon">
    <?php forge_ui_get_footer(); ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
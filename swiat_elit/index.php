<?php get_header(); ?>
    <div class="container general px-0">


        <h1><?php echo get_the_title(); ?></h1>
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php
                if(function_exists('bcn_display')) {
                    bcn_display();
                }
            ?>
        </div>

        <div class="flex-container">
            <main class="main">
                <?php get_template_part('loop'); ?>

            	<?php get_template_part('pagination'); ?>
            </main>
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
<?php get_footer(); ?>

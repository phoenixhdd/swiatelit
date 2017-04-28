<?php get_header(); ?>
    <div class="container general px-0">


        <h1><?php echo get_the_title(); ?></h1>
        <?php the_breadcrumb(); ?>

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

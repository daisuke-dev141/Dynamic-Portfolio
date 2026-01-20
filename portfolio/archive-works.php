<?php get_header(); ?>

<main>
    <section class="works">
        <div class="section-header">
            <h2>Works</h2>
            <p class="section-sub">制作実績</p>
        </div>
        <div class="works-grid" role="list">

            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <?php get_template_part("template-parts/loop", "work"); ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>

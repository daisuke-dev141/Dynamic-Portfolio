<?php get_header(); ?>

<main>
    <section class="kv">
        <div class="hero-bg">
            <div class="string"><span>H</span></div>
            <div class="string"><span>E</span></div>
            <div class="string"><span>L</span></div>
            <div class="string"><span>L</span></div>
            <div class="string"><span>O</span></div>
        </div>

        <div class="hero-text">
            <h1>Daisuke Taketomi<br>Portfolio</h1>
            <p>web programmer</p>
        </div>
    </section>



    <?php
    $works_query = new WP_Query([
        'post_type'      => 'works',
        'posts_per_page' => 6, // 表示件数
    ]);
    ?>
    <?php if ($works_query->have_posts()): ?>

        <section class="works">
            <div class="section-header">
                <h2>Works</h2>
                <p class="section-sub">制作実績</p>
            </div>

            <div class="works-grid">
                <!-- Work Item 1 -->
                <?php while ($works_query->have_posts()): $works_query->the_post(); ?>
                    <?php get_template_part("template-parts/loop", "work"); ?>
                <?php endwhile; ?>
            </div>
            <div class="button">
                <a href="<?php echo home_url("/works/"); ?>" class="button-link arrow-extend">
                    <span class="button-text">Read more</span>
                </a>
            </div>
        </section>
    <?php endif; ?>

    <section class="about">
        <div class="about-box">
            <div class="section-header">
                <h2 class="about-heading">About</h2>
                <p class="section-sub">私について</p>
            </div>
            <div class="about-content">
                <div class="about-image fade-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/about-img.jpg" alt="武富大輔のプロフィール写真">
                </div>
                <div class="about-text fade-left">
                    <h3>Daisuke Taketomi</h3>
                    <p class="jp-name">武富 大輔</p>
                    <div class="bio">
                        <p>大学では6年間化学を専攻し、研究活動に取り組んでいました。卒業後はゴムメーカーで材料設計・評価、試作対応、量産工程の改善などに携わり、その後はPCR検査業務にも従事しました。
                        </p>
                        <p>ものづくりや分析の仕事をする中で、「仕組みで課題を解決する」Web分野に興味を持ち、Webプログラマー養成科で6か月間学習。</p>
                        <p>現在は、Web制作やプログラミングの基礎を実践的に学習しています。</p>
                    </div>
                </div>
            </div>
            <div class="button">
                <a href="<?php echo home_url("/about/"); ?>" class="button-link arrow-extend">
                    <span class="button-text">Read more</span>
                </a>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>

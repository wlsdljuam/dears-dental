<?php
if (!defined('_GNUBOARD_')) exit;

// 카테고리 매핑
$category_map = array(
    '임플란트' => 'implant',
    '심미 치료' => 'aesthetic',
    '치아 교정' => 'orthodontic',
    '성장기 교정' => 'growth'
);

// 게시판 URL
$board_link = G5_BBS_URL . '/board.php?bo_table=' . $bo_table;
?>

<!-- 진료 칼럼 최신글 -->
<div class="column_head b28r">
    <div class="column_category">
        <span data-category="all" class="active">전체</span>
        <span data-category="implant">임플란트</span>
        <span data-category="aesthetic">심미 치료</span>
        <span data-category="orthodontic">치아 교정</span>
        <span data-category="growth">성장기 교정</span>
    </div>
    <a href="<?php echo $board_link; ?>" class="column_btn pc_con">진료 칼럼 전체 보기<img src="<?php echo G5_THEME_URL; ?>/img/arrow02.svg" alt="칼럼 이동" /></a>
</div>
<div class="m_column_wrap">
    <div class="column_body column_swiper">
        <div class="swiper-wrapper">
            <?php for ($i = 0; $i < count($list); $i++) {
                // 카테고리 값
                $data_category = '';
                if (!empty($list[$i]['ca_name'])) {
                    $cat_name = $list[$i]['ca_name'];
                    $data_category = isset($category_map[$cat_name]) ? $category_map[$cat_name] : '';
                }

                // 썸네일
                $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 600, 400, false, true);
                $thumb_url = $thumb['src'] ? $thumb['src'] : G5_THEME_URL . '/img/column_body.jpg';
            ?>
            <a href="<?php echo $list[$i]['href']; ?>" class="swiper-slide" data-category="<?php echo $data_category; ?>">
                <img src="<?php echo $thumb_url; ?>" alt="<?php echo strip_tags($list[$i]['wr_subject']); ?>" />
                <h4 class="b28r">
                    <?php echo $list[$i]['wr_subject']; ?>
                    <div class="column_nav m_con">
                        <div class="column_prev"><img src="<?php echo G5_THEME_URL; ?>/img/m/column_prev.svg" alt="이전" /></div>
                        <div class="column_next"><img src="<?php echo G5_THEME_URL; ?>/img/m/column_next.svg" alt="다음" /></div>
                    </div>
                </h4>
                <span class="b28r">자세히 보기<img src="<?php echo G5_THEME_URL; ?>/img/arrow02.svg" alt="칼럼 이동" /></span>
            </a>
            <?php } ?>
        </div>
    </div>
    <a href="<?php echo $board_link; ?>" class="column_btn m_con">진료 칼럼 전체 보기<img src="<?php echo G5_THEME_URL; ?>/img/arrow02.svg" alt="칼럼 이동" /></a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var columnCategoryBtns = document.querySelectorAll('.column_category span');
    var columnSlides = document.querySelectorAll('.column_body .swiper-slide');
    var columnSwiper = null;

    // 모바일 Swiper
    function initColumnSwiper() {
        if (window.innerWidth <= 768) {
            if (!columnSwiper) {
                var el = document.querySelector('.column_swiper');
                if (el) {
                    columnSwiper = new Swiper(el, {
                        slidesPerView: 'auto',
                        spaceBetween: 16,
                        navigation: {
                            prevEl: '.column_prev',
                            nextEl: '.column_next'
                        }
                    });
                }
            }
        } else {
            if (columnSwiper) {
                columnSwiper.destroy(true, true);
                columnSwiper = null;
            }
        }
    }

    // 탭 필터링
    columnCategoryBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            columnCategoryBtns.forEach(function(b) { b.classList.remove('active'); });
            this.classList.add('active');

            var category = this.dataset.category;
            columnSlides.forEach(function(slide) {
                slide.style.display = (category === 'all' || slide.dataset.category === category) ? '' : 'none';
            });

            if (columnSwiper) {
                columnSwiper.update();
                columnSwiper.slideTo(0);
            }
        });
    });

    // GSAP 스크롤 애니메이션
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.from('.column_category', {
            scrollTrigger: { trigger: '.column_head', start: 'top 85%', once: true },
            y: 20, opacity: 0, duration: 0.6
        });
        gsap.from('.column_body .swiper-slide', {
            scrollTrigger: { trigger: '.column_body', start: 'top 85%', once: true },
            y: 40, opacity: 0, duration: 0.8, stagger: 0.15
        });
    }

    var resizeTimer;
    initColumnSwiper();
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(initColumnSwiper, 200);
    });
});
</script>

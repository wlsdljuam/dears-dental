<?php
if (!defined('_GNUBOARD_')) exit;

// 카테고리 매핑 (게시판 카테고리 -> data-category 값)
$category_map = array(
    '임플란트' => 'implant',
    '심미 치료' => 'aesthetic',
    '치아 교정' => 'orthodontic',
    '성장기 교정' => 'growth'
);
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
    <a href="<?php echo $board_url; ?>">진료 칼럼 전체 보기<img src="<?php echo G5_THEME_URL; ?>/img/arrow02.svg" alt="칼럼 이동" /></a>
</div>
<div class="column_body column_swiper">
    <div class="swiper-wrapper">
        <?php
        for ($i = 0; $i < count($list); $i++) {
            // 카테고리 값 설정
            $data_category = '';
            if (!empty($list[$i]['ca_name'])) {
                $cat_name = $list[$i]['ca_name'];
                $data_category = isset($category_map[$cat_name]) ? $category_map[$cat_name] : '';
            }

            // 썸네일 이미지
            $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 400, 300, false, true);
            $thumb_url = $thumb['src'] ? $thumb['src'] : G5_THEME_URL . '/img/column_body.jpg';
        ?>
        <a href="<?php echo $list[$i]['href']; ?>" class="swiper-slide" data-category="<?php echo $data_category; ?>">
            <img src="<?php echo $thumb_url; ?>" alt="<?php echo strip_tags($list[$i]['wr_subject']); ?>" />
            <h4 class="b28r"><?php echo $list[$i]['wr_subject']; ?></h4>
            <span class="b28r">자세히 보기<img src="<?php echo G5_THEME_URL; ?>/img/arrow02.svg" alt="칼럼 이동" /></span>
        </a>
        <?php } ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Column 탭 필터링 기능
    const columnCategoryBtns = document.querySelectorAll('.column_category span');
    const columnSlides = document.querySelectorAll('.column_body .swiper-slide');
    let columnSwiper = null;

    // 모바일 Swiper 초기화
    function initColumnSwiper() {
        if (window.innerWidth <= 768) {
            if (!columnSwiper) {
                const columnEl = document.querySelector('.column_swiper');
                if (columnEl) {
                    columnSwiper = new Swiper(columnEl, {
                        slidesPerView: 'auto',
                        spaceBetween: 16,
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

    // 탭 클릭 이벤트
    columnCategoryBtns.forEach((btn) => {
        btn.addEventListener('click', function () {
            columnCategoryBtns.forEach((b) => b.classList.remove('active'));
            this.classList.add('active');

            const category = this.dataset.category;

            columnSlides.forEach((slide) => {
                if (category === 'all' || slide.dataset.category === category) {
                    slide.style.display = '';
                } else {
                    slide.style.display = 'none';
                }
            });

            if (columnSwiper) {
                columnSwiper.update();
                columnSwiper.slideTo(0);
            }
        });
    });

    // 초기화 및 리사이즈 이벤트
    initColumnSwiper();
    window.addEventListener('resize', initColumnSwiper);
});
</script>

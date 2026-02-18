<?php
if (!defined('_GNUBOARD_')) exit;

// 카테고리 매핑
$category_map = array(
    '임플란트' => 'implant',
    '심미 치료' => 'aesthetic',
    '치아 교정' => 'orthodontic',
    '성장기 교정' => 'growth'
);

// 카테고리 목록 가져오기
$categories = array();
if ($board['bo_category_list']) {
    $categories = explode('|', $board['bo_category_list']);
}
?>

<div id="bo_list" class="column-board">

    <!-- 카테고리 탭 -->
    <?php if (count($categories) > 0) { ?>
    <div class="column_head b28r">
        <div class="column_category">
            <span data-category="all" class="<?php echo !$sca ? 'active' : ''; ?>">
                <a href="<?php echo get_pretty_url($bo_table); ?>">전체</a>
            </span>
            <?php foreach ($categories as $cat) {
                $cat = trim($cat);
                $data_cat = isset($category_map[$cat]) ? $category_map[$cat] : strtolower($cat);
            ?>
            <span data-category="<?php echo $data_cat; ?>" class="<?php echo ($sca == $cat) ? 'active' : ''; ?>">
                <a href="<?php echo get_pretty_url($bo_table, '', 0, $cat); ?>"><?php echo $cat; ?></a>
            </span>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

    <!-- 검색 -->
    <div class="column_search">
        <form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>" />
            <input type="hidden" name="sca" value="<?php echo $sca; ?>" />
            <select name="sfl">
                <option value="wr_subject" <?php echo ($sfl == 'wr_subject') ? 'selected' : ''; ?>>제목</option>
                <option value="wr_content" <?php echo ($sfl == 'wr_content') ? 'selected' : ''; ?>>내용</option>
                <option value="wr_subject||wr_content" <?php echo ($sfl == 'wr_subject||wr_content') ? 'selected' : ''; ?>>제목+내용</option>
            </select>
            <input type="text" name="stx" value="<?php echo stripslashes($stx); ?>" placeholder="검색어를 입력하세요" />
            <button type="submit">검색</button>
        </form>
    </div>

    <!-- 카드 리스트 -->
    <div class="column_body column_swiper">
        <div class="swiper-wrapper">
            <?php
            if (count($list) == 0) {
                echo '<div class="column_empty"><p class="t22r">등록된 칼럼이 없습니다.</p></div>';
            }

            for ($i = 0; $i < count($list); $i++) {
                // 카테고리 data 속성
                $data_category = '';
                if (!empty($list[$i]['ca_name'])) {
                    $cat_name = $list[$i]['ca_name'];
                    $data_category = isset($category_map[$cat_name]) ? $category_map[$cat_name] : '';
                }

                // 썸네일
                $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 600, 400, false, true);
                $thumb_url = $thumb['src'] ? $thumb['src'] : G5_THEME_URL . '/img/column_body.jpg';

                // 날짜 포맷
                $date = date('Y.m.d', strtotime($list[$i]['wr_datetime']));

                // 카테고리 라벨
                $cat_label = !empty($list[$i]['ca_name']) ? $list[$i]['ca_name'] : '';
            ?>
            <a href="<?php echo $list[$i]['href']; ?>" class="swiper-slide column_card" data-category="<?php echo $data_category; ?>">
                <div class="column_card_img">
                    <img src="<?php echo $thumb_url; ?>" alt="<?php echo strip_tags($list[$i]['wr_subject']); ?>" />
                </div>
                <?php if ($cat_label) { ?>
                <span class="column_card_category c16r"><?php echo $cat_label; ?></span>
                <?php } ?>
                <h4 class="b28r"><?php echo $list[$i]['wr_subject']; ?></h4>
                <div class="column_card_meta">
                    <span class="column_card_date c16r"><?php echo $date; ?></span>
                </div>
                <span class="column_card_more b18r">자세히 보기<img src="<?php echo G5_THEME_URL; ?>/img/arrow02.svg" alt="칼럼 이동" /></span>
            </a>
            <?php } ?>
        </div>
    </div>

    <!-- 페이지네이션 -->
    <?php if ($total_page > 1) { ?>
    <div class="column_pagination">
        <?php echo $write_pages; ?>
    </div>
    <?php } ?>

    <!-- 글쓰기 버튼 -->
    <?php if ($write_href) { ?>
    <div class="column_write_btn">
        <a href="<?php echo $write_href; ?>" class="btn_write b18r">글쓰기</a>
    </div>
    <?php } ?>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var columnSwiper = null;

    // 모바일 Swiper 초기화
    function initColumnSwiper() {
        if (window.innerWidth <= 768) {
            if (!columnSwiper) {
                var el = document.querySelector('.column_body.column_swiper');
                if (el) {
                    columnSwiper = new Swiper(el, {
                        slidesPerView: 'auto',
                        spaceBetween: 16,
                        freeMode: true
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

    // 카드 GSAP 스크롤 애니메이션
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        gsap.from('.column_category', {
            scrollTrigger: { trigger: '.column_head', start: 'top 85%', once: true },
            y: 20, opacity: 0, duration: 0.6
        });

        gsap.from('.column_card', {
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

<?php
if (!defined('_GNUBOARD_')) exit;

// 카테고리 매핑
$category_map = array(
    '임플란트' => 'implant',
    '심미 치료' => 'aesthetic',
    '치아 교정' => 'orthodontic',
    '성장기 교정' => 'growth'
);

$cat_label = !empty($view['ca_name']) ? $view['ca_name'] : '';
$data_category = isset($category_map[$cat_label]) ? $category_map[$cat_label] : '';
$date = date('Y.m.d', strtotime($view['wr_datetime']));

// 대표 이미지
$thumb = get_list_thumbnail($bo_table, $view['wr_id'], 1200, 600, false, true);
$thumb_url = $thumb['src'] ? $thumb['src'] : '';
?>

<div id="bo_view" class="column-view">

    <!-- 상단 네비게이션 -->
    <div class="view_top_nav">
        <a href="<?php echo $list_href; ?>" class="btn_back b18r">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M12.5 15L7.5 10L12.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            목록으로
        </a>
    </div>

    <!-- 글 헤더 -->
    <div class="view_header">
        <?php if ($cat_label) { ?>
        <span class="view_category c16r" data-category="<?php echo $data_category; ?>"><?php echo $cat_label; ?></span>
        <?php } ?>
        <h2 class="t40r"><?php echo $view['wr_subject']; ?></h2>
        <div class="view_meta b18r">
            <span class="view_date"><?php echo $date; ?></span>
            <?php if ($view['wr_name']) { ?>
            <span class="view_author"><?php echo $view['wr_name']; ?></span>
            <?php } ?>
        </div>
    </div>

    <!-- 대표 이미지 -->
    <?php if ($thumb_url) { ?>
    <div class="view_thumbnail">
        <img src="<?php echo $thumb_url; ?>" alt="<?php echo strip_tags($view['wr_subject']); ?>" />
    </div>
    <?php } ?>

    <!-- 본문 -->
    <div class="view_content t22r">
        <?php echo $view['wr_content']; ?>
    </div>

    <!-- 첨부파일 -->
    <?php if ($view['file']['count'] > 0) { ?>
    <div class="view_file">
        <h5 class="b18r">첨부파일</h5>
        <ul>
            <?php for ($i = 0; $i <= $view['file']['count']; $i++) {
                if (!$view['file'][$i]) continue;
            ?>
            <li>
                <a href="<?php echo $view['file'][$i]['href']; ?>" class="b16r">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M14 10V12.667C14 13.0203 13.8595 13.3594 13.6095 13.6095C13.3594 13.8595 13.0203 14 12.667 14H3.333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.667V10" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="5,7 8,10 11,7" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><line x1="8" y1="2" x2="8" y2="10" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>
                    <?php echo $view['file'][$i]['source']; ?>
                    <span class="file_size">(<?php echo $view['file'][$i]['size']; ?>)</span>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <!-- 이전글/다음글 -->
    <div class="view_nav">
        <?php if ($prev['href']) { ?>
        <a href="<?php echo $prev['href']; ?>" class="view_nav_item view_prev">
            <span class="view_nav_label c16r">이전글</span>
            <span class="view_nav_subject b18r"><?php echo $prev['wr_subject']; ?></span>
        </a>
        <?php } ?>
        <?php if ($next['href']) { ?>
        <a href="<?php echo $next['href']; ?>" class="view_nav_item view_next">
            <span class="view_nav_label c16r">다음글</span>
            <span class="view_nav_subject b18r"><?php echo $next['wr_subject']; ?></span>
        </a>
        <?php } ?>
    </div>

    <!-- 하단 버튼 -->
    <div class="view_bottom_nav">
        <a href="<?php echo $list_href; ?>" class="btn_list b18r">목록</a>
        <?php if ($update_href) { ?>
        <a href="<?php echo $update_href; ?>" class="btn_edit b18r">수정</a>
        <?php } ?>
        <?php if ($delete_href) { ?>
        <a href="<?php echo $delete_href; ?>" class="btn_delete b18r" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
        <?php } ?>
    </div>

    <!-- 댓글 -->
    <?php if ($board['bo_comment_min']) { ?>
    <div class="view_comment">
        <?php echo $comment_href; ?>
    </div>
    <?php } ?>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // 헤더 애니메이션
        gsap.from('.view_header', {
            y: 30, opacity: 0, duration: 0.8, ease: 'power2.out'
        });

        // 대표 이미지
        if (document.querySelector('.view_thumbnail')) {
            gsap.from('.view_thumbnail', {
                y: 40, opacity: 0, duration: 0.8, delay: 0.2, ease: 'power2.out'
            });
        }

        // 본문
        gsap.from('.view_content', {
            scrollTrigger: { trigger: '.view_content', start: 'top 90%', once: true },
            y: 30, opacity: 0, duration: 0.8
        });

        // 이전/다음글
        gsap.from('.view_nav_item', {
            scrollTrigger: { trigger: '.view_nav', start: 'top 90%', once: true },
            y: 20, opacity: 0, duration: 0.6, stagger: 0.1
        });
    }
});
</script>

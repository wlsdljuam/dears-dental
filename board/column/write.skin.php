<?php
if (!defined('_GNUBOARD_')) exit;

// 카테고리 목록
$categories = array();
if ($board['bo_category_list']) {
    $categories = explode('|', $board['bo_category_list']);
}
?>

<div id="bo_write" class="column-write">

    <h2 class="t40r write_title"><?php echo $board['bo_subject']; ?> <?php echo $w == 'u' ? '수정' : '작성'; ?></h2>

    <form name="fwrite" id="fwrite" action="<?php echo $action_url; ?>" method="post" enctype="multipart/form-data" onsubmit="return fwrite_submit(this);" autocomplete="off">
        <input type="hidden" name="w" value="<?php echo $w; ?>" />
        <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>" />
        <input type="hidden" name="wr_id" value="<?php echo $wr_id; ?>" />
        <input type="hidden" name="sfl" value="<?php echo $sfl; ?>" />
        <input type="hidden" name="stx" value="<?php echo $stx; ?>" />
        <input type="hidden" name="spt" value="<?php echo $spt; ?>" />
        <input type="hidden" name="sst" value="<?php echo $sst; ?>" />
        <input type="hidden" name="sod" value="<?php echo $sod; ?>" />
        <input type="hidden" name="page" value="<?php echo $page; ?>" />
        <?php echo $token_input; ?>

        <div class="write_form">

            <!-- 이름 (비회원) -->
            <?php if (!$is_member) { ?>
            <div class="form_row">
                <label class="b18r">이름</label>
                <input type="text" name="wr_name" value="<?php echo $write['wr_name'] ? $write['wr_name'] : $member['mb_nick']; ?>" required class="frm_input" />
            </div>
            <div class="form_row">
                <label class="b18r">비밀번호</label>
                <input type="password" name="wr_password" required class="frm_input" />
            </div>
            <?php } ?>

            <!-- 카테고리 -->
            <?php if (count($categories) > 0) { ?>
            <div class="form_row">
                <label class="b18r">카테고리</label>
                <select name="ca_name" class="frm_select">
                    <option value="">선택</option>
                    <?php foreach ($categories as $cat) {
                        $cat = trim($cat);
                    ?>
                    <option value="<?php echo $cat; ?>" <?php echo ($write['ca_name'] == $cat) ? 'selected' : ''; ?>><?php echo $cat; ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php } ?>

            <!-- 제목 -->
            <div class="form_row">
                <label class="b18r">제목</label>
                <input type="text" name="wr_subject" value="<?php echo $write['wr_subject']; ?>" required class="frm_input" placeholder="제목을 입력하세요" />
            </div>

            <!-- 본문 에디터 -->
            <div class="form_row form_content">
                <label class="b18r">내용</label>
                <?php echo $editor; ?>
            </div>

            <!-- 파일 첨부 -->
            <?php if ($board['bo_upload_count'] > 0) { ?>
            <div class="form_row">
                <label class="b18r">파일첨부</label>
                <div class="form_file_wrap">
                    <?php for ($i = 0; $i < $board['bo_upload_count']; $i++) { ?>
                    <div class="form_file_item">
                        <input type="file" name="bf_file[]" class="frm_file" />
                        <?php if ($w == 'u' && $file[$i]['source']) { ?>
                        <span class="file_exist b16r"><?php echo $file[$i]['source']; ?> (<?php echo $file[$i]['size']; ?>)
                            <label><input type="checkbox" name="bf_file_del[<?php echo $i; ?>]" value="1" /> 삭제</label>
                        </span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

        </div>

        <!-- 제출 버튼 -->
        <div class="write_actions">
            <a href="<?php echo $list_href; ?>" class="btn_cancel b18r">취소</a>
            <button type="submit" class="btn_submit b18r">작성완료</button>
        </div>

    </form>

</div>

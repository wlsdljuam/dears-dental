<?php
if (!defined('_GNUBOARD_')) exit;
?>
<link rel="stylesheet" href="<?php echo $board_skin_url; ?>/style.css">
<?php
// 카테고리 목록
$categories = array();
if ($board['bo_category_list']) {
    $categories = explode('|', $board['bo_category_list']);
}

// 에디터 콘텐츠
$content = isset($content) ? $content : (isset($write['wr_content']) ? $write['wr_content'] : '');
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
                <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
                    <?php if ($write_min || $write_max) { ?>
                        <!-- 최소/최대 글자 수 사용 시 -->
                        <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                    <?php } ?>
                    <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 
                    ?>
                    <?php if ($write_min || $write_max) { ?>
                        <!-- 최소/최대 글자 수 사용 시 -->
                        <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                    <?php } ?>
                </div>
            </div>

            <!-- 파일 0~2는 본문에 자동 삽입하지 않음 -->
            <input type="hidden" name="bf_content[0]" value="0" />
            <input type="hidden" name="bf_content[1]" value="0" />
            <input type="hidden" name="bf_content[2]" value="0" />

            <!-- 파일 첨부: 썸네일 -->
            <div class="form_row">
                <label class="b18r">썸네일 이미지</label>
                <p class="form_file_desc b14r">목록에 표시되는 대표 이미지입니다. (권장 사이즈: 576x328)</p>
                <div class="form_file_wrap">
                    <div class="form_file_item">
                        <input type="file" name="bf_file[0]" class="frm_file" accept="image/*" />
                        <?php if ($w == 'u' && $file[0]['source']) { ?>
                            <span class="file_exist b16r"><?php echo $file[0]['source']; ?> (<?php echo $file[0]['size']; ?>)
                                <label><input type="checkbox" name="bf_file_del[0]" value="1" /> 삭제</label>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- 파일 첨부: Before -->
            <div class="form_row">
                <label class="b18r">Before 이미지</label>
                <p class="form_file_desc b14r">치료 전 이미지입니다. (권장 사이즈: 576x328)</p>
                <div class="form_file_wrap">
                    <div class="form_file_item">
                        <input type="file" name="bf_file[1]" class="frm_file" accept="image/*" />
                        <?php if ($w == 'u' && $file[1]['source']) { ?>
                            <span class="file_exist b16r"><?php echo $file[1]['source']; ?> (<?php echo $file[1]['size']; ?>)
                                <label><input type="checkbox" name="bf_file_del[1]" value="1" /> 삭제</label>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- 파일 첨부: After -->
            <div class="form_row">
                <label class="b18r">After 이미지</label>
                <p class="form_file_desc b14r">치료 후 이미지입니다. (권장 사이즈: 576x328)</p>
                <div class="form_file_wrap">
                    <div class="form_file_item">
                        <input type="file" name="bf_file[2]" class="frm_file" accept="image/*" />
                        <?php if ($w == 'u' && $file[2]['source']) { ?>
                            <span class="file_exist b16r"><?php echo $file[2]['source']; ?> (<?php echo $file[2]['size']; ?>)
                                <label><input type="checkbox" name="bf_file_del[2]" value="1" /> 삭제</label>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- 제출 버튼 -->
        <div class="write_actions">
            <a href="<?php echo $list_href; ?>" class="btn_cancel b18r">취소</a>
            <button type="submit" class="btn_submit b18r">작성완료</button>
        </div>

    </form>

</div>

<script>
document.getElementById('fwrite').addEventListener('submit', function() {
    // CKEditor 4
    if (typeof CKEDITOR !== 'undefined') {
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].updateElement();
        }
    }
    // smarteditor2
    if (typeof oEditors !== 'undefined') {
        try { oEditors.getById['wr_content'].exec('UPDATE_CONTENTS_FIELD', []); } catch(e) {}
    }
    // cheditor5
    if (typeof che_submit === 'function') {
        che_submit('wr_content');
    }
}, true);
</script>
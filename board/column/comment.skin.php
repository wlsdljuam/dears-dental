<?php
if (!defined('_GNUBOARD_')) exit;
?>
<link rel="stylesheet" href="<?php echo $board_skin_url; ?>/style.css">

<div id="bo_comment" class="column-comment">

    <!-- 댓글 목록 -->
    <?php
    for ($i = 0; $i < count($comment_list); $i++) {
        $comment = $comment_list[$i];
        $is_reply = $comment['wr_comment_reply'] ? true : false;
    ?>
    <div class="cmt_item <?php echo $is_reply ? 'cmt_reply' : ''; ?>" id="c_<?php echo $comment['wr_id']; ?>">
        <div class="cmt_header">
            <span class="cmt_name b18r"><?php echo $comment['wr_name']; ?></span>
            <span class="cmt_date c16r"><?php echo $comment['wr_datetime']; ?></span>
        </div>
        <div class="cmt_content b16r">
            <?php echo $comment['wr_content']; ?>
        </div>
        <div class="cmt_actions c16r">
            <?php if ($comment['reply_href']) { ?>
            <a href="<?php echo $comment['reply_href']; ?>" class="cmt_btn_reply">답글</a>
            <?php } ?>
            <?php if ($comment['update_href']) { ?>
            <a href="<?php echo $comment['update_href']; ?>" class="cmt_btn_edit">수정</a>
            <?php } ?>
            <?php if ($comment['delete_href']) { ?>
            <a href="<?php echo $comment['delete_href']; ?>" class="cmt_btn_delete" onclick="return confirm('댓글을 삭제하시겠습니까?');">삭제</a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

    <!-- 댓글 작성 -->
    <?php if ($comment_min <= $is_member || !$is_member) { ?>
    <form name="fcomment" id="fcomment" action="<?php echo $comment_action_url; ?>" method="post" onsubmit="return fcomment_submit(this);">
        <input type="hidden" name="w" value="" />
        <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>" />
        <input type="hidden" name="wr_id" value="<?php echo $wr_id; ?>" />
        <input type="hidden" name="comment_id" value="" />
        <?php echo $token_input; ?>

        <div class="cmt_write">
            <?php if (!$is_member) { ?>
            <div class="cmt_write_info">
                <input type="text" name="wr_name" placeholder="이름" class="frm_input" required />
                <input type="password" name="wr_password" placeholder="비밀번호" class="frm_input" required />
            </div>
            <?php } ?>
            <div class="cmt_write_content">
                <textarea name="wr_content" placeholder="댓글을 입력하세요" class="frm_textarea" required></textarea>
                <button type="submit" class="btn_cmt_submit b16r">등록</button>
            </div>
        </div>
    </form>
    <?php } ?>

</div>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="comment mb-3 mb-sm-4">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()) : ?>
        <h4 class="fw-bold text-info-emphasis mb-3"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
        <div class="mb-4">
            <?php $comments->listComments(); ?>
        </div>
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')) : ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <h4 id="response" class="my-3"><?php _e('添加新评论'); ?></h4>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()) : ?>
                    <p><?php _e('登录身份：'); ?><a class="me-3" href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a><a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else : ?>
                    <div class="mb-3">
                        <label for="author" class="required form-label"><?php _e('称呼'); ?></label>
                        <input type="text" name="author" id="author" class="text form-control" value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="<?php if ($this->options->commentsRequireMail) : ?>required <?php endif; ?>form-label"><?php _e('Email'); ?></label>
                        <input type="email" name="mail" id="mail" class="text form-control" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                    </div>
                    <div class="mb-3">
                        <label for="url" class="<?php if ($this->options->commentsRequireURL) : ?>required <?php endif; ?>form-label"><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" class="text form-control" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="textarea" class="required form-label">内容</label>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea form-control" required><?php $this->remember('text'); ?></textarea>
                </div>
                <button type="submit" class="btn btn-success">提交评论</button>
            </form>
        </div>
    <?php else : ?>
        <h3>评论已关闭</h3>
    <?php endif; ?>

</div>
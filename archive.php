<?php $this->need('header.php'); ?>
    <div id="main">
        <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
        <div class="post"> 
            <div class="post_header">
                <div class="post_date">
                    <div style="width:42px;height:42px;">
                        <?php $this->date('<p>M</p><p>j</p>');?>
                    </div>
                </div>
                <h2 class="post_title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
                <h4 class="author"> Posted by <a href="<?php $this->author(); ?>"></a></h4>
            </div>
            <div class="post_content">
                <p class="article">
                <?php $this->content('Read More'); ?>
                </p>
            </div>
            <div class="post_item">
                <p><?php _e('Category')?></p>
                <?php $this->category(','); ?>
            </div>
            <div class="post_cut"></div>
        </div><!-- end of post -->

        <?php endwhile; ?>  
        <?php else: ?>
            <div class="post">
                <h2 class="entry_title"><?php _e('没有找到内容'); ?></h2>
            </div>
        <?php endif; ?>

        <?php $this->pageNav("NEWER POSTS", "OLDER POSTS", "0", ""); ?>
    </div><!-- end of main -->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>

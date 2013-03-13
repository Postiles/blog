<?php $this->need('header.php'); ?>
    <div id="main">
        <?php if ($this->have()): ?>
            <div class = "search_title">
                <p> List of Reseults </p>
                <div class="post_cut"></div>
            </div>
            <?php while($this->next()): ?>
            <div class="post"> 
                <div class="post_header">
                    <div class="post_date">
                        <div style="width:42px;height:42px;">
                            <?php $this->date('<p>M</p><p>j</p>');?>
                        </div>
                    </div>
                    <h2 class="post_title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
                    <h4 class="author"> Posted by <?php $this->author(); ?>"></h4>
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
                <div class = "not_found">
                    <h2><?php _e('Content Not Found'); ?></h2>
                    <p> Try to search for another key word or you can find the article though archive or date on the side bar. </p>
                </div>
                <div class="bt_back clear">
                    <a href="javascript:history.back()" class="back">Back</a>
                </div>
        <?php endif; ?>

        <?php $this->pageNav("NEWER POSTS", "OLDER POSTS", "0", ""); ?>
    </div><!-- end of main -->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>

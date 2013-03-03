<?php $this->need('header.php'); ?>

    <div id="main">
        <div class="post"> 
            <div class="post_header">
                <div class="post_date">
                    <div style="width:42px;height:42px;">
                        <?php $this->date('<p>M</p><p>j</p>');?>
                    </div>
                </div>
                <h2 class="post_title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
                <h4 class="author"> Posted by <?php $this->author(); ?></h4>
            </div>
            <div class="post_content">
            <?php $this->content(); ?>
            </div>
            <div class="post_item">
                <p><?php _e('Category')?></p>
                <?php $this->category(','); ?>
            </div>
            <div class="bt_back clear">
                <a href="javascript:history.back()">Back</a>
            </div>
        </div><!-- end of post -->
    </div><!-- end of main -->


<?php $this->need('sidebar.php'); ?>
</div><!-- end of div id="body" -->
<?php $this->need('footer.php');

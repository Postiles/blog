<?php
/* customized theme for postile
 */


$this->need('header.php');

if($this->is('index')){
    $this->need('featured.php');
}
?>

    <div id="main">
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

        <?php $this->pageNav("NEWER POSTS", "OLDER POSTS", "0", ""); ?>
    </div><!-- end of main -->


<?php $this->need('sidebar.php'); ?>
</div><!-- end of body -->
<?php $this->need('footer.php');

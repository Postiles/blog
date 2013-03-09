<?php

    $sticky_cid = Typecho_Widget::widget('Widget_Options')->plugin('Sticky')->sticky_cid;
    $sticky_db = Typecho_Db::get();
    $result = $sticky_db->fetchRow($sticky_db->select()->from('table.contents')->where('table.contents.cid = ?', $sticky_cid));

    $sticky_picture_link = Typecho_Widget::widget('Widget_Options')->plugin('Sticky')->sticky_picture_link;

    $value = Typecho_Widget::widget('Widget_Abstract_Contents')->push($result);
    $text = trim($value["text"]);
    $text = Typecho_Common_Paragraph::process($text);
    $featured_content = implode(' ', array_slice(explode(' ', $text), 0, 40));

    //var_dump($text);
    //var_dump($featured_content);

?>
    <div id="featured" class="clear">
        <h4> FEATURED </h4>     
        <a href="index.php/feed" id = "rssLink" ></a>
        <div class="cut_line"></div>

        <div class="post">
            <div class="f_image">
                <img src="<?php echo $sticky_picture_link;?>" alt="demo_picture" />
            </div>
            <div class="content">
                <div class="featured_title" >
					<h3><a href="<?php echo $value["permalink"]; ?>"><?php echo $value["title"];?></a></h3> 
					<p class="date"><?php echo date("F j, Y",$value["date"]->timeStamp);?></p>
				</div>
                <br />
                <div class = "article">
                    <?php 
                    echo $featured_content . "<div class=\"bt_more clear\"><a href=\"".$value["permalink"]."\"title=\"".$value["title"]."\">Read More</a></div>" ?>
                </div>
            </div>
        </div><!-- end of post -->
    </div><!-- end of featured -->
    <div class="cut_line"></div>

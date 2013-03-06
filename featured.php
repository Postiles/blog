<?php

    $sticky_cid = Typecho_Widget::widget('Widget_Options')->plugin('Sticky')->sticky_cid;
    $sticky_db = Typecho_Db::get();
    $result = $sticky_db->fetchRow($sticky_db->select()->from('table.contents')->where('table.contents.cid = ?', $sticky_cid));

    $sticky_picture_link = Typecho_Widget::widget('Widget_Options')->plugin('Sticky')->sticky_picture_link;

    $value = Typecho_Widget::widget('Widget_Abstract_Contents')->push($result);
    $text = $value["text"];
    $text = Typecho_Common_Paragraph::process($text);

    if( strlen($text) > 100 ) {

    }

    //var_dump($text);

?>
    <div id="featured" class="clear">
        <h4> Featured </h4>     
        <a href="index.php/feed" id = "rssLink" ></a>
        <div class="cut_line"></div>
        <div class="post">
            <div class="content">
                <div class="featured_title" >
					<h3><a href="<?php echo $value["permalink"]; ?>"><?php echo $value["title"];?></a></h3> 
					<p class="date"><?php echo date("F j, Y",$value["date"]->timeStamp);?></p>
				</div>
                <br />
                <div class = "article">
                    <?php 
                    $featured_content = explode('<!--more-->', $text);
                    echo false !== strpos($text, '<!--more-->') ? $featured_content[0] . "<div class=\"bt_more clear\"><a href=\"".$value["permalink"]."\"title=\"".$value["title"]."\">Read More</a></div>" : $text; ?>
                </div>
            </div>
            <div class="f_image">
            <img src="<?php echo $sticky_picture_link;?>" alt="demo_picture" border="7" />
            </div>
        </div><!-- end of post -->
    </div><!-- end of featured -->
    <div class="cut_line"></div>

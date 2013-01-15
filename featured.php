<?php

    $sticky_cid = Typecho_Widget::widget('Widget_Options')->plugin('Sticky')->sticky_cid;
    $sticky_db = Typecho_Db::get();
    $result = $sticky_db->fetchRow($sticky_db->select()->from('table.contents')->where('table.contents.cid = ?', $sticky_cid));

    $value = Typecho_Widget::widget('Widget_Abstract_Contents')->push($result);

    //var_dump($value);

?>
    <div id="featured" class="clear">
        <h4> Featured </h4>     
        <div class="cut_line"></div>
        <div class="post">
            <div class="content">
                <h3><a href="<?php echo $value["permalink"]; ?>"><?php echo $value["title"];?></a></h3> 
                <p class="date"><?php echo date("F j, Y",$value["date"]->timeStamp);?></p>
                <br />
                <p class="article"> 
                <?php 
                $featured_content = explode('<!--more-->', $value["text"]);
                echo false !== strpos($value["text"], '<!--more-->') ? $featured_content[0] . "<div class=\"bt_more clear\"><a href=\"".$value["permalink"]."\"title=\"".$value["title"]."\">Read More</a></div>" : $value["text"]; ?>
                </p>
            </div>
            <div class="f_image">
                <img src="http://143.89.45.82/typecho/usr/themes/postile/featured_demo.jpg" alt="demo_picture" border="7" />
            </div>
        </div><!-- end of post -->
    </div><!-- end of featured -->
    <div class="cut_line"></div>

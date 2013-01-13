    
    <div id="sidebar">
        <form id="search_bar" method="post" action="/">
            <div>
                <input type="text" name="s" class="text" size="20" />
                <input type="submit" class="submit" value="<?php _e('search'); ?>" />
            </div>
        </form>
        <div id="widget1" class="widget">
            <div class="wgbg"></div>
            <div class="widget_content">
            <div class="widget_title"><?php _e('Recent Updates'); ?></div>
                <ul>
                    <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?> 
                </ul>
            </div>
        </div>
        <div id="widget2" class="widget">
            <div class="wgbg"></div>
            <div class="widget_content">
            <div class="widget_title"><?php _e('Catergories');?></div>
                <ul>
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
                </ul>
            </div>
        </div>
        <div id="widget3" class="widget">
            <div class="wgbg"></div>
            <div class="widget_content">
                <div class="widget_title"><?php _e('Archives');?></div>
                <ul>
                    <?php $this->widget('Widget_Contents_Post_Date','type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                </ul>
            </div>
        </div>
        <div id="end_of_widgets">
            <div class="wgbg"></div>
        </div>
    </div>
    <div class="clear"></div>
</div><!-- end of sidebar -->

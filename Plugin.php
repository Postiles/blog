<?php
/**
 * Feature选取
 * 
 * @package Sticky
 */
class Sticky_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){}

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $sticky_cid = new Typecho_Widget_Helper_Form_Element_Text(
          'sticky_cid', NULL, '',
          '置顶文章的 cid');
        $sticky_picture_link = new Typecho_Widget_Helper_Form_Element_Text(
          'sticky_picture_link', NULL, '',
          '置顶文章的附图');
        $form->addInput($sticky_cid);
        $form->addInput($sticky_picture_link);
    }

    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
}
/*
class Featured_Post_As_Sticky extends Widget_Abstract_Contents
{
   /**
     * 执行函数
     *
     * @access public
     * @return void
    public function execute()
    {
        $cid = Typecho_Widget::widget('Widget_Options')->plugin('Sticky')->sticky_cid;
        
        $this->db->fetchAll($this->select()->where('table.contents.cid = ?', $cid));
    }
}
 
     */
/*

$this->widget('Featured_Post_As_Sticky')->parse('<h2><a href="{permalink}">{title}</a></h2><div class="content">{excerpt}{content}</div>');

*/

<?php /* Smarty version Smarty-3.1.15, created on 2014-03-27 10:10:22
         compiled from "smarty/templates/anime.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12514973725331175dc97dc5-57630399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2337be3b374e9991635b41b26d866635dc4ba63' => 
    array (
      0 => 'smarty/templates/anime.tpl',
      1 => 1395842971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12514973725331175dc97dc5-57630399',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5331175dd5bb52_38394477',
  'variables' => 
  array (
    'packer' => 0,
    'pack' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5331175dd5bb52_38394477')) {function content_5331175dd5bb52_38394477($_smarty_tpl) {?><?php echo '<?xml';?> version="1.0"<?php echo '?>';?>

<DOCUMENT>
    <?php if (!isset($_smarty_tpl->tpl_vars['pack'])) $_smarty_tpl->tpl_vars['pack'] = new Smarty_Variable(null);while ($_smarty_tpl->tpl_vars['pack']->value = $_smarty_tpl->tpl_vars['packer']->value->get_one_pack()) {?>
    <item>
        <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['key'];?>
]]></key>		
        <display>
            <url><![CDATA[http://www.baidu.com]]></url>
            <?php if (array_key_exists('Manga.title',$_smarty_tpl->tpl_vars['pack']->value)) {?>
            <list>
                <title><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.title'];?>
]]></title>
                <?php if ($_smarty_tpl->tpl_vars['pack']->value['properties']['Manga.text']=='PROPERPTY_TYPE_SCALAR') {?>
                <item>
                   <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.text'];?>
]]></text> 
                   <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.keyword'];?>
]]></keyword>
                   <pic>
                       <src><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.pic.src'];?>
]]></src>
                       <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.pic.keyword'];?>
]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Published'];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Published.year'];?>
]]></text> 
                       </value>
                   </kvpair>
                    <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Origin run'];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Origin run.year'];?>
]]></text> 
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.update to'];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.update to.Chapter'];?>
]]></text> 
                           <?php if ((array_key_exists('Manga.update to.keyword',$_smarty_tpl->tpl_vars['pack']->value)&&!strpos($_smarty_tpl->tpl_vars['pack']->value['Manga.update to.Chapter'],'Completo'))) {?>
                           <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.update to.keyword'];?>
]]></keyword> 
                           <?php }?>
                       </value>
                   </kvpair>
                </item>
                <?php } else { ?>
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pack']->value['Manga.text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <item>
                   <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.text'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                   <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword>
                   <pic>
                       <src><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.pic.src'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></src>
                       <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.pic.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Published'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Published.year'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                       </value>
                   </kvpair>
                    <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Origin run'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.Origin run.year'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.update to'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.update to.Chapter'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                           <?php if ((array_key_exists('Manga.update to.keyword',$_smarty_tpl->tpl_vars['pack']->value)&&!strpos($_smarty_tpl->tpl_vars['pack']->value['Manga.update to.Chapter'][$_smarty_tpl->tpl_vars['index']->value],'Completo'))) {?>
                           <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Manga.update to.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword> 
                           <?php }?>
                       </value>
                   </kvpair>
                </item>
                <?php } ?>
                <?php }?>
            </list>
            <?php }?>
            <?php if (array_key_exists('Anime.title',$_smarty_tpl->tpl_vars['pack']->value)) {?>
            <list>
                <title><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.title'];?>
]]></title>
                <?php if ($_smarty_tpl->tpl_vars['pack']->value['properties']['Anime.text']=='PROPERPTY_TYPE_SCALAR') {?>
                <item>
                   <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.text'];?>
]]></text> 
                   <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.keyword'];?>
]]></keyword>
                   <pic>
                       <src><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.pic.src'];?>
]]></src>
                       <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.pic.keyword'];?>
]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Origin run'];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Origin run.year'];?>
]]></text> 
                       </value>
                   </kvpair> 
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.update to'];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.update to.Episode'];?>
]]></text> 
                           <?php if ((array_key_exists('Anime.update to.keyword',$_smarty_tpl->tpl_vars['pack']->value)&&!strpos($_smarty_tpl->tpl_vars['pack']->value['Anime.update to.Episode'],'Completo'))) {?>
                           <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.update to.keyword'];?>
]]></keyword> 
                           <?php }?>
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Directed by'];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Directed by.people'];?>
]]></text> 
                           <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Directed by.keyword'];?>
]]></keyword> 
                       </value>
                   </kvpair>
                </item>
                <?php } else { ?>
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pack']->value['Anime.text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <item>
                   <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.text'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                   <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword>
                   <pic>
                       <src><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.pic.src'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></src>
                       <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.pic.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Origin run'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Origin run.year'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                       </value>
                   </kvpair> 
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.update to'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.update to.Episode'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                           <?php if ((array_key_exists('Anime.update to.keyword',$_smarty_tpl->tpl_vars['pack']->value)&&!strpos($_smarty_tpl->tpl_vars['pack']->value['Anime.update to.Episode'][$_smarty_tpl->tpl_vars['index']->value],'Completo'))) {?>
                           <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.update to.keyword'];?>
]]></keyword> 
                           <?php }?>
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Directed by'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></key>
                       <value>
                           <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Directed by.people'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                           <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Anime.Directed by.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword> 
                       </value>
                   </kvpair>
                </item>
                <?php } ?>
                <?php }?>
            </list>
            <?php }?>
            <?php if (array_key_exists('Filmes.title',$_smarty_tpl->tpl_vars['pack']->value)) {?>
            <list>
                <title><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Filmes.title'];?>
]]></title>
                <?php if ($_smarty_tpl->tpl_vars['pack']->value['properties']['Filmes.text']=='PROPERPTY_TYPE_SCALAR') {?>
                <item>
                   <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Filmes.text'];?>
]]></text> 
                   <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Filmes.keyword'];?>
]]></keyword>
                </item>
                <?php } else { ?>
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pack']->value['Filmes.text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <item>
                   <text><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Filmes.text'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></text> 
                   <keyword><![CDATA[<?php echo $_smarty_tpl->tpl_vars['pack']->value['Filmes.keyword'][$_smarty_tpl->tpl_vars['index']->value];?>
]]></keyword>
                </item>
                <?php } ?>
                <?php }?>
            </list>
            <?php }?>
        </display>
    </item>
    <?php }?>	
</DOCUMENT>
<?php }} ?>

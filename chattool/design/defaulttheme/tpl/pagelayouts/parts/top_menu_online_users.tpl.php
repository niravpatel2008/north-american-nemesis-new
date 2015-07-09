<?php include(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu_online_users_pre.tpl.php'));?>
<?php if ($parts_top_menu_online_users_enabled == true && $currentUser->hasAccessTo('lhchat','use_onlineusers')) : ?>
<li><a href="<?php echo erLhcoreClassDesign::baseurl('chat/onlineusers')?>" class='icon-users' title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Online visitors');?>"></a></li>
<?php endif;?>	
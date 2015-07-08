<!DOCTYPE html><html lang="en" dir="ltr" ng-app="lhcApp"><head><title><?php  if (isset($Result['path'])) : ?><?php $ReverseOrder = $Result['path']; krsort($ReverseOrder); foreach ($ReverseOrder as $pathItem) : ?><?php  echo htmlspecialchars($pathItem['title']).' '?>&laquo;<?php  echo ' ';endforeach;?><?php  endif; ?><?php  echo htmlspecialchars('Live Helper Chat - live support')?></title><meta http-equiv="content-type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"><link rel="icon" type="image/png" href="/north-american-nemesis-new/chattool/design/defaulttheme/images/favicon.ico" /><link rel="shortcut icon" type="image/x-icon" href="/north-american-nemesis-new/chattool/design/defaulttheme/images/favicon.ico"><meta name="Keywords" content="" /><meta name="Description" content="" /><meta name="robots" content="noindex, nofollow"><meta name="copyright" content="Remigijus Kiminas, livehelperchat.com"><?php  if ('ltr' == 'ltr' || 'ltr' == '') : ?><link rel="stylesheet" type="text/css" href="/north-american-nemesis-new/chattool/cache/compiledtemplates/0fda01e0f74dc5810eb6c2017471e2f4.css" /><?php  else : ?><link rel="stylesheet" type="text/css" href="/north-american-nemesis-new/chattool/cache/compiledtemplates/31daacc990c519514f30b5e36c079e41.css" /><?php  endif;?><?php  echo isset($Result['additional_header_css']) ? $Result['additional_header_css'] : ''?><?php   ?><script type="text/javascript">var WWW_DIR_JAVASCRIPT = '/north-american-nemesis-new/chattool/index.php/site_admin/';var WWW_DIR_JAVASCRIPT_FILES = '/north-american-nemesis-new/chattool/design/defaulttheme/sound';var WWW_DIR_LHC_WEBPACK = '/north-american-nemesis-new/chattool/design/defaulttheme/js/lh/dist/';var WWW_DIR_JAVASCRIPT_FILES_NOTIFICATION = '/north-american-nemesis-new/chattool/design/defaulttheme/images/notification';var confLH = {};<?php  $soundData = array (0 => false,'repeat_sound' => 1,'repeat_sound_delay' => 5,'show_alert' => false,'new_chat_sound_enabled' => true,'new_message_sound_admin_enabled' => true,'new_message_sound_user_enabled' => true,'online_timeout' => 300,'check_for_operator_msg' => 10,'back_office_sinterval' => 10,'chat_message_sinterval' => 3.5,'long_polling_enabled' => false,'polling_chat_message_sinterval' => 1.5,'polling_back_office_sinterval' => 5,'connection_timeout' => 30,'browser_notification_message' => false,); ?>confLH.back_office_sinterval = <?php  echo (int)($soundData['back_office_sinterval']*1000) ?>;confLH.chat_message_sinterval = <?php  echo (int)($soundData['chat_message_sinterval']*1000) ?>;confLH.new_chat_sound_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('new_chat_sound',(int)($soundData['new_chat_sound_enabled'])) ?>;confLH.new_message_sound_admin_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_admin_enabled'])) ?>;confLH.new_message_sound_user_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_user_enabled'])) ?>;confLH.new_message_browser_notification = <?php  echo isset($soundData['browser_notification_message']) ? (int)($soundData['browser_notification_message']) : 0 ?>;confLH.transLation = {'new_chat':'New chat request'};confLH.csrf_token = '<?php  echo erLhcoreClassUser::instance()->getCSFRToken()?>';confLH.repeat_sound = <?php  echo (int)$soundData['repeat_sound']?>;confLH.repeat_sound_delay = <?php  echo (int)$soundData['repeat_sound_delay']?>;confLH.show_alert = <?php  echo (int)$soundData['show_alert']?>;</script><script type="text/javascript" src="/north-american-nemesis-new/chattool/cache/compiledtemplates/4079b29f9b336083f1a058bab4e0ccbb.js"></script><?php  echo isset($Result['additional_header_js']) ? $Result['additional_header_js'] : ''?><?php   ?></head><body ng-controller="LiveHelperChatCtrl as lhc"><?php  $currentUser = erLhcoreClassUser::instance(); ?><nav class="navbar navbar-default navbar-lhc"><div class="container-fluid"><!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="/north-american-nemesis-new/chattool/index.php/site_admin/" title="<?php  echo htmlspecialchars('Live Helper Chat')?>"><img class="img-responsive" src="/north-american-nemesis-new/chattool/design/defaulttheme/images/general/logo.png" alt="<?php  echo htmlspecialchars('Live Helper Chat')?>" title="<?php  echo htmlspecialchars('Live Helper Chat')?>"></a></div><ul class="nav collapse navbar-collapse navbar-nav navbar-right" id="bs-example-navbar-collapse-1"><?php  if ($currentUser->hasAccessTo('lhchat','use')) : ?><?php  $parts_top_menu_chat_actions_enabled = true;?><?php  if ($parts_top_menu_chat_actions_enabled == true) : ?><?php  if ($currentUser->hasAccessTo('lhchat','allowchattabs')) : ?><li class="li-icon"><a href="javascript:void(0)" onclick="javascript:lhinst.chatTabsOpen()"><i class="icon-chat"></i></a></li><?php  endif;?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chat/lists" >Chats list</a></li><?php  endif;?><?php  $parts_top_menu_online_users_enabled = true?><?php  if ($parts_top_menu_online_users_enabled == true && $currentUser->hasAccessTo('lhchat','use_onlineusers')) : ?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chat/onlineusers">Online visitors</a></li><?php  endif;?><?php  endif;?><?php   $useQuestionary = $currentUser->hasAccessTo('lhquestionary','manage_questionary'); $useFaq = $currentUser->hasAccessTo('lhfaq','manage_faq'); $useChatbox = $currentUser->hasAccessTo('lhchatbox','manage_chatbox'); $useBo = $currentUser->hasAccessTo('lhbrowseoffer','manage_bo'); $useFm = $currentUser->hasAccessTo('lhform','manage_fm'); ?><?php  $hasExtensionModule = isset($hasExtensionModule) ? $hasExtensionModule : false;?><?php  if ($useFm || $useBo || $useChatbox || $useFaq || $useQuestionary || $hasExtensionModule) : ?><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Extra modules <span class="caret"></span></a><ul class="dropdown-menu" role="menu"><?php  $pagelayouts_parts_modules_menu_questionary_enabled = true?><?php  if ($pagelayouts_parts_modules_menu_questionary_enabled == true && $useQuestionary) : ?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/questionary/list">Questionary</a></li><?php  endif;?><?php  $pagelayouts_parts_modules_menu_faq_enabled = true?><?php  if ($pagelayouts_parts_modules_menu_faq_enabled == true && $useFaq) : ?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/faq/list">FAQ</a></li><?php  endif;?><?php  $pagelayouts_parts_modules_menu_chatbox_enabled = true?><?php  if ($pagelayouts_parts_modules_menu_chatbox_enabled == true && $useChatbox) : ?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chatbox/configuration">Chatbox</a></li><?php  endif; ?><?php  $pagelayouts_parts_modules_menu_browseoffer_enabled = true?><?php  if ($pagelayouts_parts_modules_menu_browseoffer_enabled == true && $useBo) : ?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/browseoffer/index">Browse offers</a></li><?php  endif; ?><?php  $pagelayouts_parts_modules_menu_form_enabled = true?><?php  if ($pagelayouts_parts_modules_menu_form_enabled == true && $useFm) : ?><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/form/index">Forms</a></li><?php  endif;?></ul></li><?php  endif; ?><?php  if ($currentUser->hasAccessTo('lhsystem','use')) : ?><li class="li-icon"><a href="/north-american-nemesis-new/chattool/index.php/site_admin/system/configuration"><i class="icon-tools"></i></a></li><?php  endif; ?><?php  $hideULSetting = true;?><?php $soundData = erLhcoreClassModelChatConfig::fetch('sync_sound_settings')->data; $soundMessageEnabled = erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_admin_enabled'])); $soundNewChatEnabled = erLhcoreClassModelUserSetting::getSetting('new_chat_sound',(int)($soundData['new_chat_sound_enabled'])); $canChangeOnlineStatus = false; $currentUser = erLhcoreClassUser::instance(); if ( $currentUser->hasAccessTo('lhuser','changeonlinestatus') ) { $canChangeOnlineStatus = true; if ( !isset($UserData) ) { $UserData = $currentUser->getUserData(true); } } $canChangeVisibilityMode = false; if ( $currentUser->hasAccessTo('lhuser','changevisibility') ) { $canChangeVisibilityMode = true; if ( !isset($UserData) ) { $UserData = $currentUser->getUserData(true); } } ?><?php  if ($currentUser->hasAccessTo('lhchat','use') ) : ?><?php  if (!isset($hideULSetting)) : ?><ul class="list-inline user-settings-list pull-right"><?php  endif;?><li class="li-icon"><a href="#"><i class="icon-sound<?php  $soundMessageEnabled == 0 ? print ' icon-mute' : ''?>" onclick="return lhinst.disableChatSoundAdmin($(this))" title="Enable/Disable sound about new messages from users"></i></a></li><li class="li-icon"><a href="#"><i class="icon-sound<?php  $soundNewChatEnabled == 0 ? print ' icon-mute' : ''?>" onclick="return lhinst.disableNewChatSoundAdmin($(this))" title="Enable/Disable sound about new pending chats"></i></a></li><?php  if ($canChangeVisibilityMode == true) : ?><li class="li-icon"><a href="#"><i class="icon-cloud<?php  $UserData->invisible_mode == 1 ? print ' user-online-disabled' : ''?>" title="Change my visibility to visible/invisible" onclick="return lhinst.changeVisibility($(this))"></i></a></li><?php  endif;?><?php  if ($canChangeOnlineStatus == true) : ?><li class="li-icon"><a href="#"><i class="icon-user<?php  $UserData->hide_online == 1 ? print ' user-online-disabled' : ''?>" title="Change my status to online/offline" onclick="return lhinst.disableUserAsOnline($(this))"></i></a></li><?php  endif;?><?php  if (!isset($hideULSetting)) : ?></ul><?php  endif;?><?php  endif;?><?php $currentUser = erLhcoreClassUser::instance(); $UserData = $currentUser->getUserData(true); ?><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php  echo htmlspecialchars($UserData->name),' ',htmlspecialchars($UserData->surname)?><span class="caret"></span></a><ul class="dropdown-menu" role="menu"><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/user/account" title="Account"><i class="glyphicon glyphicon-user"></i> Account</a></li><li><a href="/north-american-nemesis-new/chattool/index.php/site_admin/user/logout" title="Logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li></ul></li><?php  unset($currentUser);unset($UserData);?></ul></div></nav><div class="container-fluid"><?php  if (isset($Result['path'])) : $pathElementCount = count($Result['path'])-1; if ($pathElementCount >= 0): ?><ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<li><a rel="home" itemprop="url" href="/north-american-nemesis-new/chattool/index.php/site_admin/"><span itemprop="title">Home</span></a></li><?php  foreach ($Result['path'] as $key => $pathItem) : if (isset($pathItem['url']) && $pathElementCount != $key) { ?><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php  echo $pathItem['url']?>" itemprop="url"><span itemprop="title"><?php  echo htmlspecialchars($pathItem['title'])?></span></a></li><?php  } else { ?><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php  echo htmlspecialchars($pathItem['title'])?></span></li><?php  }; ?><?php  endforeach; ?>
</ul><?php  endif; ?><?php  endif;?><?php  $canUseChat = erLhcoreClassUser::instance()->hasAccessTo('lhchat','use'); ?><div class="row"><div class="col-sm-<?php  $canUseChat == true && (!isset($Result['hide_right_column']) || $Result['hide_right_column'] == false) ? print '8' : print '12'; ?> col-md-<?php  $canUseChat == true && (!isset($Result['hide_right_column']) || $Result['hide_right_column'] == false) ? print '9' : print '12'; ?>"><?php  echo $Result['content']; ?></div><?php  if ($canUseChat == true && (!isset($Result['hide_right_column']) || $Result['hide_right_column'] == false)) : $pendingTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_pending_list',1); $activeTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_active_list',1); $closedTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_close_list',0); $unreadTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_unread_list',1); ?><div class="columns col-sm-4 col-md-3" id="right-column-page" ng-cloak><?php  $transfer_panel_container_pre_enabled = erLhcoreClassUser::instance()->hasAccessTo('lhchat','use');?><?php  if ($transfer_panel_container_pre_enabled == true) : ?><div role="tabpanel" ng-show="transfer_dep_chats.list.length > 0 || transfer_chats.list.length > 0"><!-- Nav tabs -->
<ul class="nav nav-pills" role="tablist"><li role="presentation" class="active"><a title="Chats transferred to you directly" href="#transferedperson" aria-controls="transferedperson" role="tab" data-toggle="tab"><i class="icon-user"></i><span class="tru-cnt"></span></a></li><li role="presentation"><a title="Transferred to your department" href="#transfereddep" aria-controls="transfereddep" role="tab" data-toggle="tab"><i class="icon-users"></i><span class="trd-cnt"></span></a></li></ul><!-- Tab panes -->
<div class="tab-content"><div role="tabpanel" class="tab-pane active" id="transferedperson"><div id="right-transfer-chats"><ul class="no-bullet small-list"><li ng-repeat="chat in transfer_chats.list"><img class="action-image right-action-hide" align="absmiddle" ng-click="lhc.startChatTransfer(chat.id,chat.nick,chat.transfer_id)" src="/north-american-nemesis-new/chattool/design/defaulttheme/images/icons/accept.png" alt="Accept chat" title="Accept chat"><img class="action-image" align="absmiddle" ng-click="lhc.startChatNewWindowTransfer(chat.id,chat.nick,chat.transfer_id)" src="/north-american-nemesis-new/chattool/design/defaulttheme/images/icons/application_add.png" alt="Open in a new window" title="Open in a new window"> {{chat.id}}. {{chat.nick}} ({{chat.time_front}})</li></ul><p ng-show="transfer_chats.list.length == 0">Empty...</p></div></div><div role="tabpanel" class="tab-pane" id="transfereddep"><div id="right-transfer-departments"><ul class="no-bullet small-list"><li ng-repeat="chat in transfer_dep_chats.list"><img class="action-image right-action-hide" align="absmiddle" ng-click="lhc.startChatTransfer(chat.id,chat.nick,chat.transfer_id)" src="/north-american-nemesis-new/chattool/design/defaulttheme/images/icons/accept.png" alt="Accept chat" title="Accept chat"><img class="action-image" align="absmiddle" ng-click="lhc.startChatNewWindowTransfer(chat.id,chat.nick,chat.transfer_id)" src="/north-american-nemesis-new/chattool/design/defaulttheme/images/icons/application_add.png" alt="Open in a new window" title="Open in a new window"> {{chat.id}}. {{chat.nick}} ({{chat.time_front}})</li></ul><p ng-show="transfer_dep_chats.list.length == 0">Empty...</p></div></div></div></div><?php  endif;?><div class="panel panel-default panel-lhc" ng-show="pending_chats.list.length > 0 || active_chats.list.length > 0 || unread_chats.list.length > 0 || closed_chats.list.length > 0<?php   ?>"><?php  $basicChatEnabled = erLhcoreClassUser::instance()->hasAccessTo('lhchat','use');?><?php  if ($basicChatEnabled == true) : ?><?php  if ($pendingTabEnabled == true) : ?><div class="panel-heading" ng-if="pending_chats.list.length > 0"><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chat/pendingchats"><i class="icon-chat chat-pending"></i> Pending chats ({{pending_chats.list.length}}{{pending_chats.list.length == 10 ? '+' : ''}})</a><a title="collapse/expand" ng-click="lhc.toggleList('pending_chats_expanded')" ng-class="pending_chats_expanded == true ? 'icon-minus' : 'icon-plus'" class="fs18 pull-right"></a></div><div class="panel-body" id="right-pending-chats" ng-if="pending_chats.list.length > 0 && pending_chats_expanded == true"><ul class="list-unstyled"><li ng-repeat="chat in pending_chats.list track by chat.id"><span ng-if="chat.country_code != undefined"><img ng-src="/north-american-nemesis-new/chattool/design/defaulttheme/images/flags/{{chat.country_code}}.png" alt="{{chat.country_name}}" title="{{chat.country_name}}" /></span><i class="icon-user icon-user-assigned" ng-show="chat.user_name" title="Assigned operator - {{chat.user_name}}"></i><a class="icon-info" title="ID - {{chat.id}}" ng-click="lhc.previewChat(chat.id)"></a><a class="icon-reply" title="Redirect user to contact form." ng-click="lhc.redirectContact(chat.id,'Are you sure?')" ></a><a class="right-action-hide icon-chat" ng-click="lhc.startChat(chat.id,chat.nick)" title="Accept chat"></a><a title="Open in a new window" class="icon-popup" ng-click="lhc.startChatNewWindow(chat.id,chat.nick)"></a>{{chat.nick}}, <small><i>{{chat.wait_time_pending}},</i></small> {{chat.department_name}}</li></ul><p ng-show="pending_chats.list.length == 0">Empty...</p></div><?php  endif;?><?php  endif;?><?php   ?><?php  if ($basicChatEnabled == true) : ?><?php  if ($activeTabEnabled == true) : ?><div class="panel-heading" ng-if="active_chats.list.length > 0"><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chat/activechats"><i class="icon-chat chat-active"></i> Active chats ({{active_chats.list.length}}{{active_chats.list.length == 10 ? '+' : ''}})</a><a title="collapse/expand" ng-click="lhc.toggleList('active_chats_expanded')" ng-class="active_chats_expanded == true ? 'icon-minus' : 'icon-plus'" class="fs18 pull-right"></a></div><div class="panel-body"  id="right-active-chats" ng-show="active_chats.list.length > 0 && active_chats_expanded == true"><ul class="list-unstyled"><li ng-repeat="chat in active_chats.list track by chat.id" ><span ng-if="chat.country_code != undefined"><img ng-src="/north-american-nemesis-new/chattool/design/defaulttheme/images/flags/{{chat.country_code}}.png" alt="{{chat.country_name}}" title="{{chat.country_name}}" /></span><a class="icon-info" title="ID - {{chat.id}}, {{chat.user_name}}" ng-click="lhc.previewChat(chat.id)" ></a><a class="right-action-hide icon-chat" ng-click="lhc.startChat(chat.id,chat.nick)" title="Add chat"></a><a class="icon-popup" ng-click="lhc.startChatNewWindow(chat.id,chat.nick)" title="Open in a new window"></a> {{chat.nick}}, <small><i>{{chat.time_created_front}},</i></small> {{chat.department_name}}</li></ul><p ng-show="active_chats.list.length == 0">Empty...</p></div><?php  endif;?><?php  if ($unreadTabEnabled == true) : ?><div class="panel-heading" ng-if="unread_chats.list.length > 0"><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chat/unreadchats"><i class="icon-comment chat-unread"></i> Unread messages ({{unread_chats.list.length}}{{unread_chats.list.length == 10 ? '+' : ''}})</a><a title="collapse/expand" ng-click="lhc.toggleList('unread_chats_expanded')" ng-class="unread_chats_expanded == true ? 'icon-minus' : 'icon-plus'" class="fs18 pull-right"></a></div><div class="panel-body" ng-if="unread_chats.list.length > 0 && unread_chats_expanded == true" id="right-unread-chats"><ul class="list-unstyled"><li ng-repeat="chat in unread_chats.list track by chat.id"  ><span ng-if="chat.country_code != undefined"><img ng-src="/north-american-nemesis-new/chattool/design/defaulttheme/images/flags/{{chat.country_code}}.png" alt="{{chat.country_name}}" title="{{chat.country_name}}" /></span><a class="icon-info" title="ID - {{chat.id}}" ng-click="lhc.previewChat(chat.id)" ></a><a class="right-action-hide icon-chat" ng-click="lhc.startChat(chat.id,chat.nick)" title="Add chat"></a><a class="icon-popup" ng-click="lhc.startChatNewWindow(chat.id,chat.nick)" title="Open in a new window"></a> {{chat.nick}}, {{chat.time_created_front}}, {{chat.department_name}} | <b>{{chat.unread_time.hours}} h. {{chat.unread_time.minits}} m. {{chat.unread_time.seconds}} s. ago.</b></li></ul><p ng-show="unread_chats.list.length == 0">Empty...</p></div><?php  endif;?><?php  if ($closedTabEnabled == true) : ?><div class="panel-heading" ng-if="closed_chats.list.length > 0"><a href="/north-american-nemesis-new/chattool/index.php/site_admin/chat/closedchats"><i class="icon-cancel-circled chat-closed"></i> Closed chats ({{closed_chats.list.length}}{{closed_chats.list.length == 10 ? '+' : ''}})</a><a title="collapse/expand" ng-click="lhc.toggleList('closed_chats_expanded')" ng-class="closed_chats_expanded == true ? 'icon-minus' : 'icon-plus'" class="fs18 pull-right"></a></div><div class="panel-body" id="right-closed-chats" ng-if="closed_chats.list.length > 0 && closed_chats_expanded == true"><ul class="list-unstyled"><li ng-repeat="chat in closed_chats.list track by chat.id" ><span ng-if="chat.country_code != undefined"><img ng-src="/north-american-nemesis-new/chattool/design/defaulttheme/images/flags/{{chat.country_code}}.png" alt="{{chat.country_name}}" title="{{chat.country_name}}" /></span><a class="icon-info" title="ID - {{chat.id}}" ng-click="lhc.previewChat(chat.id)" ></a><a class="right-action-hide icon-chat" ng-click="lhc.startChat(chat.id,chat.nick)" title="Add chat"></a><a class="icon-popup" ng-click="lhc.startChatNewWindow(chat.id,chat.nick)" title="Open in a new window"></a> {{chat.nick}}, <small><i>{{chat.time_created_front}},</i></small> {{chat.department_name}}</li></ul><p ng-show="closed_chats.list.length == 0">Empty...</p></div><?php  endif;?><?php  endif;?></div></div><?php  endif; ?></div><div class="mt10"><div class="row mt10 footer-row"><div class="columns col-xs-12"><p class="pull-right"><a target="_blank" href="http://livehelperchat.com">Live Helper Chat &copy; <?php  echo date('Y')?></a></p>
<p><a href="http://livehelperchat.com"><?php  echo htmlspecialchars('Live Helper Chat')?></a></p>
</div></div></div><script type="text/javascript" language="javascript" src="/north-american-nemesis-new/chattool/cache/compiledtemplates/2188a4b29717a5469f2f9973f8ed4417.js"></script><?php  echo isset($Result['additional_footer_js']) ? $Result['additional_footer_js'] : ''?><?php   ?></div><?php  if (false == true) { $debug = ezcDebug::getInstance(); echo $debug->generateOutput(); } ?></body></html>
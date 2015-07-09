<?php include(erLhcoreClassDesign::designtpl('lhchat/part/canned_messages_action_pre.tpl.php')); ?>
<?php if ($chat_part_canned_messages_action_enabled == true) : ?>
<a href="#" class="btn btn-default icon-mail" onclick="return lhinst.sendCannedMessage('<?php echo $chat->id?>',$(this))"></a>
<?php endif;?>
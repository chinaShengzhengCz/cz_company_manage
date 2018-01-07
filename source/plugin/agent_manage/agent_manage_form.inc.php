<?php


if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if (empty($_G['uid'])) {
    exit('ำรปงฮดตวยผ');
}
include template('agent_manage:agent_form');

?>
<?php


$status = Utils::getUrlParam('status');
TodoValidator::validateStatus($status);

$dao = new TodoDao();
$search = new TodoSearchCriteria();
$search->setStatus($status);

// data for template
$title = Utils::capitalize($status) . ' TODOs';
$todos = $dao->find($search);

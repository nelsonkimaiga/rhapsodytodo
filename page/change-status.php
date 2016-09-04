<?php

$todo = Utils::getTodoByGetId();
$todo->setStatus(Utils::getUrlParam('status'));
if (array_key_exists('comment', $_POST)) {
    $todo->setComment($_POST['comment']);
}

$dao = new TodoDao();
$dao->save($todo);
Flash::addFlash('TODO status changed successfully.');

Utils::redirect('detail', array('id' => $todo->getId()));

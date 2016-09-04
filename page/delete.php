<?php

$todo = Utils::getTodoByGetId();

$dao = new TodoDao();
$dao->delete($todo->getId());
Flash::addFlash('TODO deleted successfully.');

Utils::redirect('list', array('status' => $todo->getStatus()));

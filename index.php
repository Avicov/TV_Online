<?php

require_once('controller/controller.php');
require_once('model/PDORepository.php');
require_once('model/canal.php');
require_once('model/canalRepository.php');
require_once('view/TwigView.php');
require_once('view/View.php');

Controller::getInstance()->index();
<?php
require_once 'common.php';
$noteRepo = new \App\Repository\NoteRepository($db);
$noteService = new \App\Service\NoteService($noteRepo);
$noteHttpHand = new \App\HTTP\NoteHttpHandler($template);
$_POST['id'] = $_GET['id'];
$noteHttpHand->delete($noteService,$_POST);
<?php
require_once 'common.php';
$noteRepo = new \App\Repository\NoteRepository($db);
$noteService = new \App\Service\NoteService($noteRepo);
$noteHttpHand = new \App\HTTP\NoteHttpHandler($template);
$noteHttpHand->create($noteService,$_POST);
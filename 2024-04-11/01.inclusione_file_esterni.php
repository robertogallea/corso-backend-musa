<?php

// INCLUSIONE DA FILE ESTERNI

// include
include('01.file_incluso.php');
// include '01.file_incluso.php'; // è uguale

// require
// require('01.file_incluso_con_require.php');
// require '01.file_incluso_con_require.php';

/*
include genera solo un warning nel caso in cui il file da includere non esista
require genera un warning ma anche un errore fatale e l'esecuzione del programma viene interrotta
*/


//include('functions.php');

include_once('functions.php');

// require_once('functions.php')


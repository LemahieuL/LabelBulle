<?php

/*Route de Base*/
$router->get('/404', 'Index#NotFound', 'default');//page erreur 404.
$router->get('/', 'Index#getHome', 'index');//page au lancement du site.

/* route GET */

$router->get('/user/register', 'Profil#getRegister', 'register');
$router->get('/user/connection', 'Profil#getConnect', 'connection');
$router->get('/user/profil', 'Profil#profil', 'profil');
$router->get('/user/edit','Profil#getEditUser','getEditUser');
$router->get('/manga/addManga', 'Manga#getAddManga', 'addManga');
$router->get('/manga/addCollection', 'Manga#getAddCollection', 'addCollection');
$router->get('/manga/shonen', 'Manga#showShonen', 'showShonen');
$router->get('/manga/shojo', 'Manga#showShojo', 'showShojo');
$router->get('/manga/seinen', 'Manga#showSeinen', 'showSeinen');

/* route POST*/

$router->post('/user/register', 'Profil#createUser', 'createUser');
$router->post('/user/connection', 'Profil#login', 'pLogin');
$router->post('/user/profil','Profil#editUser','editUser');
$router->post('/manga/addCollection','Manga#addCollection','createCollection');
$router->post('/manga/addManga','Manga#addManga','createManga');


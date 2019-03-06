<?php

/*Route de Base*/
$router->get('/404', 'Index#NotFound', 'default');//page erreur 404.
$router->get('/', 'Index#getHome', 'index');//page au lancement du site.
$router->get('/term/privaty-polity','Index#privaty-polity','privaty-polity');
$router->get('/term/terms-of-use','Index#terms-of-use','terms-of-use');

/* route GET */

$router->get('/user/register', 'Profil#getRegister', 'register');
$router->get('/user/connection', 'Profil#getConnect', 'connection');
$router->get('/user/disconect', 'Profil#getDisconect', 'disconect');
$router->get('/user/profil', 'Profil#profil', 'profil');
$router->get('user/management', 'Profil#management', 'management');

/* route pour la gestion dans le profil */

$router->get('/user/edit','Profil#getEditUser','getEditUser');
$router->get('/manga/addManga', 'Manga#getAddManga', 'addManga');
$router->get('/manga/addCollection', 'Manga#getAddCollection', 'addCollection');

/* route pour afficher les differents mangas */ 

$router->get('/manga/shonen', 'Manga#showShonen', 'showShonen');
$router->get('/manga/shojo', 'Manga#showShojo', 'showShojo');
$router->get('/manga/seinen', 'Manga#showSeinen', 'showSeinen');
$router->get('/manga/mangaCollection', 'Manga#showManga', 'showMangaShonen');

/* route pour la mise à jours des collections */

$router->get('/user/updateCollection', 'Profil#updateCollection', 'updateCollection');

/* route POST*/

$router->post('/user/register', 'Profil#createUser', 'createUser');
$router->post('/user/connection', 'Profil#login', 'pLogin');
$router->post('/user/profil', 'Profil#editUser', 'editUser');
$router->post('/manga/addCollection', 'Manga#addCollection', 'createCollection');
$router->post('/manga/addManga', 'Manga#addManga', 'createManga');
$router->post('/user/updateCollection', 'Manga#editCollection', 'editCollection');
$router->post('/user/deleteCollection', 'Profil#deleteCollection', 'deleteCollection');


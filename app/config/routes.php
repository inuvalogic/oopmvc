<?php

$routes = [

	// website.com/page/about page/halaman-lain
	'page/(.*)' => 'page:cms',

	// website.com/berita/12/harga-bbm-naik

	'berita' => 'berita:index',
	'berita/add' => 'berita:add',
	'berita/edit/([0-9]+)' => 'berita:edit',
	'berita/delete/([0-9]+)' => 'berita:delete',
	'berita/([0-9]+)/(.*)' => 'berita:detail',
	'(.*)' => 'page:notfound',
];
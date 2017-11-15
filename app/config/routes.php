<?php

$routes = [

	// website.com/page/about page/halaman-lain
	'page/(.*)' => 'page:cms',

	// website.com/berita/12/harga-bbm-naik
	'berita/([0-9]+)/(.*)' => 'berita:detail',
];
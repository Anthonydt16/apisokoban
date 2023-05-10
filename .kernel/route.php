<?php
use Kernel\Url\Router as r;
use Controller as c;
use Api as a;



/*
// Route vers les composants.
r::notfound('/');
r::default('/');
r::add('/', c\::class);
*/



// Route vers les API.
r::add('/api/map', a\Map::class, [
    r::METHOD_GET,
    r::METHOD_POST
]);

r::add('/api/map/{id}', a\Map::class, [
    r::METHOD_GET,
    r::METHOD_PUT,
    r::METHOD_DELETE,
    r::METHOD_PATCH

]);


?>
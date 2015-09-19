<?php
/**
 * Configuracion de la base de datos
 */
 //*/
R::setup('mysql:host=localhost;dbname=template', // host|ip; nombre de la base de datos
         'template', //user
         'password'); //password
         //mysql
//*/

/*/ PostgreSQL
R::setup( 'pgsql:host=localhost;dbname=mydatabase',
        'user', 'password' );
//*/

/*/ SQLite3
R::setup( 'sqlite:/tmp/dbfile.db' );
//*/

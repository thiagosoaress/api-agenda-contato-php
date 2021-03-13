<?php

putenv('DISPLAY_ERROR='.true);
putenv('AMBIENTE=development');

/**
 *  Ambiente de desenvolvimento
 */
if (getenv('AMBIENTE') == 'development') {

    putenv('MYSQL_HOST=localhost');
    putenv('MYSQL_PORT=3306');
    putenv('MYSQL_USER=root');
    putenv('MYSQL_PASS=');
    putenv('MYSQL_BASE=agenda_contato');
}

/**
 * Ambiente de produção
 */
if (getenv('AMBIENTE') == 'production') {

    putenv('MYSQL_HOST=localhost');
    putenv('MYSQL_PORT=3306');
    putenv('MYSQL_USER=root');
    putenv('MYSQL_PASS=123456');
    putenv('MYSQL_BASE=agenda_contato');

}

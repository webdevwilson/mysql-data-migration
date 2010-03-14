<?php

/**
 * Object contains methods callable via AJAX endpoint
 */
class AjaxMethods {

    /**
     * Test the connection info
     * @param String $server
     * @param String $username
     * @param String $password
     * @return Array success => (true|false)
     */
    function testConnection($args) {
        return array( 'success' => mysql_pconnect($args['server'], $args['username'], $args['password']) != false );
    }

    /**
     * Retrieve a list of catalogs
     * @param String $server
     * @param String $username
     * @param String $password
     * @return Array catalogs => [catalog_names]
     */
    function listCatalogs($args) {

        $conn = mysql_pconnect($args['server'], $args['username'], $args['password']);
        if($conn === false) {
            throw 'Connection failed.';
        }

        $results = mysql_list_dbs($conn);
        $catalogs = array();
        while( $row = mysql_fetch_assoc($results) ) {
            $catalogs[] = $row;
        }

        return array( 'catalogs' => $catalogs );
    }

    /**
     * Retrieve a list of tables
     * @param String $server
     * @param String $username
     * @param String $password
     * @param String $catalog
     */
    function listTables($args) {

        $conn = mysql_pconnect($args['server'], $args['username'], $args['password']);
        if($conn === false) {
            throw 'Connection failed.';
        }

        $results = mysql_list_tables($args['database'], $conn);
        $tables = array();
        while( $row = mysql_fetch_assoc($results) ) {
            $tables[] = $row;
        }

        return array( 'tables' => $tables );
    }

    /**
     * List columns of a table
     * @param <type> $server
     * @param <type> $username
     * @param <type> $password
     * @param <type> $database
     */
    function listColumns($args) {

        $conn = mysql_pconnect($args['server'], $args['username'], $args['password']);
        if($conn === false) {
            throw 'Connection failed.';
        }

        $results = mysql_list_fields($args['database'], $args['table'], $conn);
        $columns = array();
        while( $row = mysql_fetch_assoc($results) ) {
            $columns[] = $row;
        }

        return array( 'columns' => $columns );
    }


}
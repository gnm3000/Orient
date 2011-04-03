<?php

/**
 * OrientDB_REST interface
 *
 * This interfaces is implemented in order to be compliant with the interface
 * Orient exposes through quite RESTful "services".
 * See: http://code.google.com/p/orient/wiki/OrientDB_REST
 *
 * @package    Orient
 * @subpackage Contract
 * @author     Alessandro Nadalin <alessandro.nadalin@gmail.com>
 */
namespace Orient\Contract;

interface OrientDB_REST
{
  function __construct(HttpDriver $driver, $hostname, $port, $username, $password);

  function connect($database);

  function getHttpDriver();

  function setHttpDriver(HttpDriver $driver);

//  function deleteClass();
//  function postClass();
//  function getClass();
//  function cluster($cluster, $database = false, $limit = null);
//  function getServer();
  //  function command();
  //  function getDatabase();
  //  function query();
  //  function getDocument();
  //  function deleteDocument();
  //  function postDocument();
  //  function putDocument();
}
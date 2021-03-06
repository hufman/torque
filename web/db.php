<?php

// load database credentials
require_once ('creds.php');

// Connect to Database
$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name, $con) or die(mysql_error());

// helper function to quote a single identifier
// suitable for a single column name or table name
// the name will have quotes around it
function quote_name($name) {
  return "`" . str_replace("`", "``", $name) . "`";
}

// helper function to quote column names
// when constructing a query, give a list of column names, and
// it will return a properly-quoted string to put in the query
function quote_names($column_names) {
  $quoted_names = array();
  foreach ($column_names as $name) {
    $quoted_names[] = quote_name($name);
  }
  return implode(", ", $quoted_names);
}

// helper function to quote a single value
// suitable for a single value
// the value will have quotes around it
function quote_value($value) {
  return "'" . mysql_real_escape_string($value) . "'";
}

// helper function to quote multiple values
// when constructing a query, give a list of values, and
// it will return a properly-quoted string to put in the query
function quote_values($values) {
  $quoted_values = array();
  foreach ($values as $value) {
    $quoted_values[] = quote_value($value);
  }
  return implode(", ", $quoted_values);
}

?>

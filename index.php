<?php
require_once "./QueryBuilder/ConcreteBuilder/CustomerBuilder.php";
require_once "./QueryBuilder/Product/Model.php";
$client = (new CustomerBuilder());
$client->table('customers');
$client->select('*');
$client->where('user_id','>','0');
$customers = $client->get();
var_dump($customers);
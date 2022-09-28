<?php
abstract class Model
{
    private $connect;
    private $table;
    private $select;
    private $attribute;
    private $operator;
    private $value;
    private $fillable;
    
}

class Customer extends Model
{
}
class Product extends Model
{
}

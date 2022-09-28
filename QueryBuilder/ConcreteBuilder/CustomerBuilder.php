<?php
require_once('./QueryBuilder/Builder/Builder.php');
require_once('./QueryBuilder/Product/Model.php');
class CustomerBuilder implements Builder
{
    private $connect;
    private $model;
    public function __construct()
    {
        $this->connect = new PDO("mysql:host=localhost;dbname=2app_shipping;charset=utf8", "root", "");
        $this->model = new Customer();
    }

    public function table($table)
    {
        $this->model->table = $table;
    }
    public function select($select)
    {
        $this->model->select = $select;
    }
    public function where($attribute,$operator,$value)
    {
        $this->model->attribute = $attribute;
        $this->model->operator = $operator;
        $this->model->value = $value;
    }
    public function get()
    {
        $select = isset($this->model->select) ? $this->model->select : '*';
        $table = $this->model->table;
        $attribute = $this->model->attribute;
        $value = $this->model->value;
        $operator = $this->model->operator;
        $query = 'select ' . $select . ' from ' . $table.' where '.$table.'.'.$attribute.' '.$operator.' '. '"'.$value.'"';
        $stmt = $this->connect->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //Gán giá trị và thực thi
        $stmt->execute();
        //Gán giá trị và thực thi
        return $stmt->fetchAll();
    }
}

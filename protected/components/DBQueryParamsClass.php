<?php
/**
 * User: Игорь
 * Date: 27.09.12
 * Тип данных - параметры для SQL запросса
 */
class DBQueryParamsClass
{
    private $conditions;
    private $fields = "*";
    private $params = array();
    private $orderBy = 'id';
    private $orderType = 'ASC';
    private $page = null;
    private $cache = 1000; //
    private $limit = 10;  // Если надо будет вывести все записи то необходимо выставить -1

    static function CreateParams()
    {
        $obj = new DBQueryParamsClass();
        return $obj;
    }

    public function __construct()
    {
        return $this;
    }

    public function setConditions( $value )
    {
        $this->conditions = $value;
        return $this;
    }

    public function getConditions( )
    {
        return $this->conditions;
    }

    public function setCache( $value )
    {
        $this->cache = $value;
        return $this;
    }

    public function getCache( )
    {
        return $this->cache;
    }

    public function setFields( $value )
    {
        $value = trim( $value );
        if( empty( $value ) )$value="*";
        $this->fields = $value;
        return $this;
    }

    public function getFields( )
    {
        return $this->fields;
    }

    public function setParams( $value )
    {
        $this->params = $value;
        return $this;
    }

    public function getParams( )
    {
        return $this->params;
    }

    public function setOrderBy( $value )
    {
        $this->orderBy = $value;
        return $this;
    }

    public function getOrderBy( )
    {
        return $this->orderBy;
    }
    public function setOrderType( $value )
    {
        $this->orderType = $value;
        return $this;
    }

    public function getOrderType( )
    {
        return $this->orderType;
    }
    public function setPage( $value )
    {
        $this->page = $value;
        return $this;
    }

    public function getPage( )
    {
        return $this->page;
    }
    public function setLimit( $value )
    {
        $this->limit = $value;
        //echo "set:".$value." - ".$this->limit."<br/>";
        return $this;
    }

    public function getLimit( )
    {
        //echo "get:".$this->limit."<br/>";
        return $this->limit;
    }
}

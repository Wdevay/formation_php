<?php

namespace App\Models;

abstract class AbstractManager
{
    protected static $db;
    protected static $tableName;
    protected static $obj;

    public function getAll($nb=null,$query=null): array|false
    {
        $limit = !is_null($nb)? " LIMIT ".$nb : "";
        $results=[];
        $default_query = "SELECT * FROM ".self::$tableName." ORDER BY id DESC";
        $sql_query= $query===null ? $default_query : $query;
        $results=self::$db->selectAll($sql_query.$limit);
        return $results;
    }


    public function getOnebyParam($param = null)
    {
        $where = !is_null($param)? " WHERE ".array_key_first($param)."='".$param[array_key_first($param)]."'": "";
        $query = "SELECT * FROM ".self::$tableName;
        $result = self::$db->select($query.$where);
        return $result;
    }

    public function insert($data=[])
    {
        $fields = self::$obj->getAttributes();
        foreach($fields as $v){
            $values[]= "?";
        }
        $str_fields = implode(",",$fields); //email,password,roles
        $str_values = implode(",",$values); // ?,?,?  -> Qui vont être remplacé par $data avec execute($data)
        $insert = self::$db->query("INSERT INTO ".self::$tableName." (".$str_fields.") VALUES (".$str_values.")",$data);

        return $insert;
    }

    public function update($id=null,$data=[])
    {
        $fields = self::$obj->getAttributes();
        foreach($fields as $k => $v){ // title=?,description=?,...
            $values[]= $v."=?";
        }
        
        $str_values = implode(",",$values); // ?,?,?  -> Qui vont être remplacé par $data avec execute($data)
        $update = self::$db->query("UPDATE ".self::$tableName." SET ".$str_values." WHERE id='".$id."'",$data);

        return $update;

    }

    public function delete($param)
    {
        if (!is_null($param)){
        $where = " WHERE ".array_key_first($param)."='".$param[array_key_first($param)]."'";
        $query = "DELETE FROM ".self::$tableName;
        $result = self::$db->query($query.$where);
        return $result;
        }
    }

}
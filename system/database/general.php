<?php
class general extends database
{
    function add($post)
    {
        $colum = $ask = '';
        $value = [];

        foreach ($post as $k => $v) {
            $colum .= '`' . $k . '`,'; // key,key
            $ask .= '?,';
            $value[] = trim($v); // value không cần mà vì là thêm
        }

        $colum = rtrim($colum, ',');
        $ask = rtrim($ask, ',');
        return $this->setquery('insert into `' . $this->table . '` (' . $colum . ') VALUES (' . $ask . ')')->save($value);
    }

    function repair($post, $ma)
    {
        $change = '';
        $value = [];

        foreach ($post as $k => $v) {
            $change .= '`' . $k . '`=?,'; // key =?,key =?
            $value[] = trim($v); // value cộng mã vì là sửa
        }
        $change = rtrim($change, ',');
        $value[] = $ma;
        // return $this->setquery('update `' . $this->table . '` SET ' . $change . 'WHERE `' . $this->table . '`.`ma` =?')->save($value); // trên ko dc
        return $this->setquery('update `' . $this->table . '` SET ' . $change . ' WHERE `' . $this->table . '`.`ma` =?')->save($value);  // dưới dc
    }
}
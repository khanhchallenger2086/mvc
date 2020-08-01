<?php
    class general extends database {
        function add($post) {
            $colum = $ask = '';
            $value = [];

            foreach ($post as $k => $v) {
                $colum .= '`'.$k.'`,';
                $ask .= '?,';
                $value[] = trim($v);
            }
            
            $colum = rtrim($colum,',');
            $ask = rtrim($ask,',');
            return $this->setquery('insert into `'.$this->table.'` ('.$colum.') VALUES ('.$ask.')')->save($value);
        }

        function repair($post,$ma) {
            $change = '';
            $value = [];

            foreach ($post as $k => $v) {
                $change .= '`'.$k.'`=?,'; 
                $value[] = trim($v);
            }
            $change = rtrim($change,',');
            $value[] = $ma;
            return $this->setquery('update `'.$this->table.'` SET '.$change.'WHERE `'.$this->table.'`.`ma` =?')->save($value);
        }
    }
    ?>
<?php

class Table{
    private $rows = [];
    private $max = 10;
    private $page = 1;
    private $totalData = 0;
    private $datas;
    private $params;
    private $sql = '';
    private $table = '';
    private $search = [];

    function __construct($config)
    {
        $this->max = isset($config['max']) ? $config['max'] : $this->max;
        $this->page = Input::get('page') === null ? 1 : Input::get('page');
        $this->sql = $config['query']['sql'];

        $this->params = isset($config['query']['params']) ? $config['query']['params'] : [];
    }

    function addRow($str, $index){
        array_push($this->rows, [$str, $index]);
        return $this;
    }

    function runQuery(){
        try {
            if(count($this->search) > 0) {
                foreach ($this->search as $item){
                    array_push($this->params, '%'.Input::get('search').'%');
                }
            }

            // mencari total data
            $prep = DB::connection()->prepare($this->sql);
            $prep->execute($this->params);

            $this->totalData = $prep->rowCount();

            // mencari data setelah dilimit
            $prep = DB::connection()->prepare($this->sql.' LIMIT '.(($this->page-1) * $this->max).','.$this->max);

            $prep->execute($this->params);

            $this->datas = $prep->fetchAll(PDO::FETCH_ASSOC);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function pagination(){
        $start = '<ul class="pagination pagination-sm no-margin pull-right">';
        $mid = '';
        $total = ceil($this->totalData/$this->max);

        if($total == 1){
            return null;
        }
        if($this->page > 1){
            $mid .= '<li><a href="?page='.($this->page-1).'"><<</a></li>';
        }

        $potong = 1;

        $startnum = ($this->page - $potong > 0) ? ($this->page - $potong) : 1;
        $endnum = ($this->page + $potong < $total) ? ($this->page + $potong) : $total;
        if ( $startnum > 1 ) {
            $mid .= '<li><a href="?page=1">1</a></li>';
            $mid .= '<li class="disabled"><span>...</span></li>';
        }
        for ($i=$startnum; $i <= $endnum; $i++) {
            if($this->page == $i ){
                $class = 'class="active"';
            }else{
                $class = '';
            }

            $mid .= '<li '.$class.'><a href="?page='.$i.'">'.$i.'</a></li>';
        }
        if ( $endnum < $total ) {
            $mid .= '<li class="disabled"><span>...</span></li>';
            $mid .= '<li><a href="?page='.$total.'">'.$total.'</a></li>';
        }

        if($this->page < $total){
            $mid .= '<li><a href="?page='.($this->page+1).'">>></a></li>';
        }
        $end   = '</ul>';


        return $start.$mid.$end;

    }

    function search($params){
        $this->search = $params;

//        print_r($this->search);

        if(count($this->search) > 0) {
            if (!strpos(strtolower($this->sql), 'where')) {
                $this->sql .= ' WHERE ';
                foreach ($this->search as $key => $item){
                    if($key === 0){
                        $this->sql .= $item.' LIKE ?';
                    } else {
                        $this->sql .= ' OR '.$item.' LIKE ?';
                    }
                }
            } else {
                foreach ($this->search as $key => $item){
                    $this->sql .= ' OR '.$item.' LIKE ?';
                }
            }
        }

//        echo $this->sql;

    }

    function run(){
        $res = $this->runQuery();
        if($res){
            if(count($this->search) > 0) {
                $this->table .= '<div class="input-group input-group-sm" style="width: 150px;margin-bottom: 15px;"><form method="get" style="display: inline-block"><input type="text" name="search" class="form-control pull-right" placeholder="Search"><div class="input-group-btn" style="position: absolute;right:36px;top: 1px;font-size: 0;white-space: nowrap;"><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></div></form></div>';
            }
            $this->table .= '<table class="table">';
            $this->table .= '<thead>';
            $this->table .= '<tr>';
            foreach ($this->rows as $row) {
                $this->table .= '<th>';
                $this->table .= $row[0];
                $this->table .= '</th>';
            }
            $this->table .= '</tr>';
            $this->table .= '</thead>';

            $this->table .= '<tbody>';
            if($this->totalData > 0) {
                foreach ($this->datas as $index => $data) {
                    $this->table .= '<tr>';
                    foreach ($this->rows as $key => $row) {
                        $this->table .= '<td>';
                        if (is_string($row[1])) {
                            $this->table .= $data[$row[1]];
                        } else {
                            $this->table .= call_user_func_array($row[1], [$data, $index]);
                        }
                        $this->table .= '</td>';
                    }
                    $this->table .= '</tr>';
                }
            }else{
                $this->table .= '<tr><td colspan="'.count($this->rows).'">Tidak ada data</td></tr>';
            }
            $this->table .= '</tbody>';
            $this->table .= '</table>';
            $this->table .= $this->pagination();

            return $this->table;
        }else{
            return $res;
        }
    }


}
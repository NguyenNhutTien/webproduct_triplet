<?php

class My_Model
{
    protected $table = '';
    /**
     * Hàm lấy tất cả các record trong bảng $table thỏa mãn điều kiện $options;
     */
    public  function get_all_from($options = array())
    {                  
        // Xử lý $options
        $select = isset($options['select']) ? $options['select'] : '*';    
        $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
        $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] . ' DESC' : '';
        $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
        
        // Truy vấn
        $query = 'SELECT '.$select.' FROM '.$this->table. ' '. $where .' '.$order_by.' '.$limit. '';
        
        $results = mysqli_query(Database::$dbc, $query);
        if (! $results) {
            return die("Query {$query}\n<br/> MYSQL Error:" . mysqli_error(Database::$dbc));
        } else {
            
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $rows[] = $data;
            }
            if (! empty($rows)) {
                return $rows;
            }
            else return array();  // khong co ket qua , return ve mang rong
        }
    }

    /**
     * Lấy 1 record trong bảng table thoả id
     */
    public  function get_a_record_by_id($id, $select = '*')
    {
        intval($id);
        $query = "SELECT $select FROM $this->table WHERE id = $id";
        $results = mysqli_query(Database::$dbc, $query);
        if (! $results) {
            return die("Query {$query}\n<br/> MYSQL Error:" . mysqli_error(Database::$dbc));
        } else {
            
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $row = $data;
            }
            if (! empty($row)) {
                return $row;
            }
            else return array();
        }
    }
    
    /**
     * Hàm insert
     */
    public function insert($data = array())
    {             
        //Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
        
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".$value."'";
        }
        
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $query = 'INSERT INTO '.$this->table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
        
        $results = mysqli_query( Database::$dbc, $query );
        if(!$results){
            return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        }
        else{
            if(mysqli_affected_rows(Database::$dbc) == 0)  // trả về số dòng chịu tác động
                return false;  //insert thất bại
            return true;
        }
    }
    
    /**
     *  Hàm insert, trả về id của dòng vừa mới insert
     */   
    public function insert_id($data = array())
    {
        //Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
        
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".$value."'";
        }
        
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $query = 'INSERT INTO '.$this->table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
        
        $results = mysqli_query( Database::$dbc, $query );
        if(!$results){
            return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        }
        else{
            if(mysqli_affected_rows(Database::$dbc) == 0)  // trả về số dòng chịu tác động
                return false;  //insert thất bại
            return mysqli_insert_id(Database::$dbc);  // Trả về id của dòng mới insert
        }
    }
   
    /**
     * Hàm update
     */
    function update($data = array(), $where='')
    {
        $update_list = '';            
        // Lặp qua data
        foreach ($data as $key => $value){
            $update_list .= "$key = '".$value."',";
        }
  
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $query = 'UPDATE '.$this->table. ' SET '.trim($update_list, ',').' WHERE '. $where;
        
        $results = mysqli_query( Database::$dbc, $query );
        
        if(!$results){
            return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        }
        else{
            if(mysqli_affected_rows(Database::$dbc) == 0)  // trả về số dòng chịu tác động
                return false;  //update thất bại
            return true;
        }      
    }
    
    /**
     * Hàm delete
     */
    function delete($where = array()){
        
        $where_list = '';
        foreach ($where as $key => $value) {
            $where_list .= "AND ".$key." = '" .$value."' ";
        }
        // Delete
        $query = "DELETE FROM $this->table WHERE ".trim($where_list, "AND");
        
        $results = mysqli_query( Database::$dbc, $query );
        
        if(!$results){
            return die("Query {$query}\n<br/> MYSQL Error:".mysqli_error(Database::$dbc));
        }
        else{
            if(mysqli_affected_rows(Database::$dbc) == 0)  // trả về số dòng chịu tác động
                return false;  //delete thất bại
            return true;
        }
    }

}
<?php
class Product_model extends My_Model {
   protected $table = 'product';
   
   function __construct(){
       
   }

   function update_raty($score, $id_product)
   {          
       $query = 'UPDATE '.$this->table. ' SET rate_total = rate_total + '. $score . ' , rate_count = rate_count + 1 WHERE id =  ' . $id_product;
       
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
}
<?php
class Comment_model extends MY_Model
{
    protected $table = 'comment';

    function __construct()
    { }

    function getList($product_id)
    {
        $query = "SELECT * FROM comment WHERE product_id = ".$product_id." ORDER BY parent_comment_id ASC, id ASC ";
        $results = mysqli_query(Database::$dbc, $query);
        if (!$results) {
            return die("Query {$query}\n<br/> MYSQL Error:" . mysqli_error(Database::$dbc));
        } else {
            while ($data = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $rows[] = $data;
            }
            return $rows;
        }
    }
}

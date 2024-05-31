<?php
class CommentModel extends BaseModel
{
    const TableName = 'comments';

    public function createComment($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function getComments()
    {
        return $this->getAll(self::TableName);
    }

    public function getCommentById($id)
    {
        $sql = "SELECT * FROM comments WHERE status = 1 and status_comment = 1 AND product_id = '${id}' order by id desc limit 10";
        $result =  $this->querySql($sql);
        return $result;
    }

    public function averageCommentById($id)
    {
        $sql = "SELECT ROUND(AVG(rate),0) as star FROM comments WHERE status = 1 AND product_id = ${id}";
        $result =  $this->querySql($sql);
        return $result;
    }
}

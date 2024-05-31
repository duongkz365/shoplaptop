<?php
class CommentModel extends BaseModel
{
    const TableName = 'comments';

    public function getComments()
    {
        return $this->getAll(self::TableName);
    }

    public function findEmail($email)
    {
        $sql = "SELECT * FROM comments WHERE email like '%${email}%'";
        $result =  $this->querySql($sql);
        return $result;
    }

    public function getComment($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function updateComment($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deleteComment($id)
    {
        return $this->destroy(self::TableName, $id);
    }
}

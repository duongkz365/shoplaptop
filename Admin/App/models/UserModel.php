<?php
class UserModel extends BaseModel
{
    const TableName = 'users';

    public function findEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '${email}'";
        $result =  $this->querySql($sql);
        return mysqli_fetch_array($result);
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM users where status = 1 AND id <> 1";
        $query = $this->querySql($sql);
        $data = [];
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
        }
        return $data;
    }

    public function getUser($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function searchUsers($name)
    {
        return $this->searchName(self::TableName, $name);
    }

    public function createUser($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function updateUser($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deleteUser($id)
    {
        return $this->destroy(self::TableName, $id);
    }
}

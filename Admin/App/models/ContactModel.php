<?php
class ContactModel extends BaseModel
{
    const TableName = 'contacts';

    public function getContacts()
    {
        return $this->getAll(self::TableName);
    }

    public function getContact($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function searchContacts($name)
    {
        return $this->searchName(self::TableName, $name);
    }

    public function createContact($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function updateContact($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deleteContact($id)
    {
        return $this->destroy(self::TableName, $id);
    }
}

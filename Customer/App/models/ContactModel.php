<?php
class ContactModel extends BaseModel
{
    const TableName = 'contacts';

    public function createContact($data)
    {
        return $this->create(self::TableName, $data);
    }
}

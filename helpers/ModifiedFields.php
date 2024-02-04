<?php
class ModifiedFields {
    private $fields = [];

    public function addField($field, $value) {
        $this->fields[$field] = $value;
    }

    public function getFields() {
        return $this->fields;
    }

    public function buildUpdateQuery($baseQuery) {
        $setParts = [];
        foreach (array_keys($this->fields) as $field) {
            $setParts[] = "$field = :$field";
        }
        $setQuery = implode(', ', $setParts);
        return $baseQuery . ' SET ' . $setQuery . ' WHERE id = :id';
    }

    public function bindValues($statement) {
        foreach ($this->fields as $field => $value) {
            $statement->bindValue(":$field", $value);
        }
    }
}

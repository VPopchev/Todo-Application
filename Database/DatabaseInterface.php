<?php
namespace Database;

interface DatabaseInterface {
    public function query(string $query) : PreparedStatementInterface;

    public function getLastError(): array;

    public function getLastId();
}
<?php
namespace App\Repository;

use App\Data\NoteDTO;
use Database\DatabaseInterface;

class NoteRepository implements NoteRepositoryInterface {

    /**
     * @var DatabaseInterface
     */
    private $db;


    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function create(NoteDTO $note): bool
    {
        $this->db->query('INSERT INTO notes
                                (comment, status)
                                VALUES (?,?)')
            ->execute([$note->getComment(),$note->getStatus()]);
        return true;
    }

    public function edit(int $id, NoteDTO $note): bool
    {
        $this->db->query('UPDATE notes SET comment = ?,status = ?
                                WHERE id = ?')
            ->execute([$note->getComment(),$note->getStatus(),$id]);
        return true;
    }

    public function delete(int $id): bool
    {
        $this->db->query('DELETE FROM notes WHERE id = ?')
            ->execute([$id]);
        return true;
    }

    public function find(int $id): ?NoteDTO
    {
        return $this->db->query('SELECT id,comment,status FROM notes
                                WHERE id = ?')
            ->execute([$id])
            ->fetch(NoteDTO::class)
            ->current();
    }

    /**
     * @return \Generator|NoteDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query('SELECT id,comment,status FROM notes')
            ->execute()->fetch(NoteDTO::class);
    }
}
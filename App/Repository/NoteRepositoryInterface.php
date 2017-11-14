<?php
namespace App\Repository;


use App\Data\NoteDTO;
use App\HTTP\NoteHttpHandler;

interface NoteRepositoryInterface
{
    public function create(NoteDTO $note):bool;

    public function edit(int $id, NoteDTO $note):bool;

    public function delete(int $id):bool;

    public function find(int $id): ?NoteDTO;

    /**
     * @return \Generator|NoteDTO[]
     */
    public function findAll(): \Generator;
}
<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 7.11.2017 г.
 * Time: 23:23 ч.
 */

namespace App\Service;


use App\Data\NoteDTO;

interface NoteServiceInterface
{
    public function find(int $id): ?NoteDTO;

    public function create(NoteDTO $note):bool;

    public function edit(int $id,NoteDTO $note):bool;

    /**
     * @return \Generator|NoteDTO[]
     */
    public function viewAll(): \Generator;

    public function delete($id):bool;
}
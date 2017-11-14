<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 7.11.2017 г.
 * Time: 23:27 ч.
 */

namespace App\Service;


use App\Data\NoteDTO;
use App\Repository\NoteRepositoryInterface;

class NoteService implements NoteServiceInterface
{
    /**
     * @var NoteRepositoryInterface
     */
    private $noteRepository;

    private $definitions;


    public function __construct(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }


    public function create(NoteDTO $note): bool
    {


        $invalidComment = (strlen($note->getComment()) == 0) ||
            ($note->getComment() != strip_tags($note->getComment()));

        $invalidStatus = $note->getStatus() != 'open' &&
                            $note->getStatus() != 'inProgress' &&
                                $note->getStatus() != 'finished';
        if ($invalidComment || $invalidStatus) {
            return false;
        }

        return $this->noteRepository->create($note);
    }

    public function edit(int $id, NoteDTO $note): bool
    {
        $invalidComment = (strlen($note->getComment()) == 0) ||
            ($note->getComment() != strip_tags($note->getComment()));

        $invalidStatus = $note->getStatus() != 'open' &&
            $note->getStatus() != 'inProgress' &&
            $note->getStatus() != 'finished';
        if ($invalidComment || $invalidStatus) {
            return false;
        }
        return $this->noteRepository->edit($id, $note);
    }

    /**
     * @return \Generator|NoteDTO[]
     */
    public function viewAll(): \Generator
    {
        return $this->noteRepository->findAll();
    }

    public function find(int $id): ?NoteDTO
    {
        return $this->noteRepository->find($id);
    }

    public function delete($id): bool
    {
        return $this->noteRepository->delete($id);
    }

    private function validateInput(array $inputData)
    {

        foreach ($inputData as $data) {

        }
    }
}
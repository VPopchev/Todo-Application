<?php

namespace App\HTTP;


use App\Data\ErrorDTO;
use App\Data\NoteDTO;
use App\Service\NoteServiceInterface;

class NoteHttpHandler extends HttpHandlerAbstract
{
    public function index(NoteServiceInterface $noteService, $formData = [])
    {

        $notes = $noteService->viewAll();
        $data['openNotes'] = [];
        $data['inProgressNotes'] = [];
        $data['finishedNotes'] = [];
        foreach ($notes as $note){
            if ($note->getStatus() == 'open'){
                $data['openNotes'][] = $note;
            } else if ($note->getStatus() == 'inProgress'){
                $data['inProgressNotes'][] = $note;
            } else {
                $data['finishedNotes'][] = $note;
            }
        }

        $this->render('home/index', $data);
    }

    public function create(NoteServiceInterface $noteService, $formData = [])
    {
        if (isset($formData['create'])) {
            $this->handleCreateProcess($noteService, $formData);
        } else {
            $this->render('note/create');
        }
    }

    /**
     * @param NoteServiceInterface $noteService
     * @param array $formData
     */
    public function edit(NoteServiceInterface $noteService, array $formData = [])
    {
        $noteToEdit = $noteService->find($formData['id']);
        if (isset($formData['edit'])){
            $this->handleEditProcess($formData['id'],$noteService,$formData);
        }
        if (null == $noteToEdit){
            $this->render('app/error',new ErrorDTO('Invalid Note!'));
        }
        else {
            $this->render('note/edit',$noteToEdit);
        }
    }


    public function handleCreateProcess(NoteServiceInterface $noteService, $formData = [])
    {
        $note = NoteDTO::create($formData['comment'], $formData['status']);
        if ($noteService->create($note)) {
            $this->redirect('index.php');
        } else {
            $this->render('app/error',new ErrorDTO('Error Creating Note!'));
        }
    }
    public function delete(NoteServiceInterface $noteService,array $formData = []){
        $note = $noteService->find($formData['id']);
        if (isset($formData['delete'])){
            $this->handleDeleteProcess($noteService,$formData);
        }
        if (null == $note){
            $this->render('app/error',new ErrorDTO('Invalid Note!'));
        } else {
            $this->render('note/delete',$note);
        }
    }

    private function handleEditProcess(int $id,NoteServiceInterface $noteService,array $formData = [])
    {
        $note = NoteDTO::create($formData['comment'],$formData['status']);
        if($noteService->edit($id,$note)){
            $this->redirect('index.php');
        } else {
            $this->render('app/error',new ErrorDTO('Error Editing Note!'));
        }
    }

    private function handleDeleteProcess(NoteServiceInterface $noteService,array $formData = [])
    {
        if ($noteService->delete($formData['id'])){
            $this->redirect('index.php');
        } else {
            $this->render('app/error',new ErrorDTO('Error Deleting Note!'));
        }
    }

}
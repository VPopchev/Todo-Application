<?php
namespace App\Data;


class NoteDTO
{
    private $id;
    private $comment;
    private $status;

    public static function create(string $comment,string $status,int $id = null){
        $note = new NoteDTO();
        $note->setId($id);
        $note->setComment($comment);
        $note->setStatus($status);
        return $note;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}
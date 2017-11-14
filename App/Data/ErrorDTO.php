<?php
namespace App\Data;


class ErrorDTO
{
    private $errorInfo;

    /**
     * ErrorDTO constructor.
     * @param $errorInfo
     */
    public function __construct($errorInfo)
    {
        $this->errorInfo = $errorInfo;
    }

    public function getErrorInfo(){
        return $this->errorInfo;
    }

}
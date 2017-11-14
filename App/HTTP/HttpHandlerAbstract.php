<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 7.11.2017 г.
 * Time: 23:29 ч.
 */

namespace App\HTTP;


use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }


    public function render(string $templateName, $data = null){
            return $this->template->render($templateName,$data);
    }

    public function redirect(string $url){
        header('Location: ' . $url);
        exit();
    }
}
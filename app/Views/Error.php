<?php
namespace Flux\Views;

class Error extends View
{
    private $message;

    public function __construct($message)
    {
        parent::__construct();
        $this->template = 'error';
        $this->message = $message;
    }

    protected function grabInformations()
    {
        $infos = array(
            'message' => $this->message,
        );
        return $infos;
    }
}

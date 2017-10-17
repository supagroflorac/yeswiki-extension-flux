<?php
namespace Flux\Views;

class Loading extends View
{
    private $src;
    private $templateToLoad;
    private $nbItemsToshow;

    public function __construct($src, $templateToLoad, $nbItemsToshow)
    {
        parent::__construct();
        $this->template = 'loading';
        $this->templateToLoad = $templateToLoad;
        $this->nbItemsToshow = $nbItemsToshow;
        $this->src = $src;
    }

    protected function grabInformations()
    {
        $infos = array(
            'src' => urlencode($this->src),
            'template' => $this->templateToLoad,
            'nb' => $this->nbItemsToshow,
            'id' => hash('crc32', $this->src),
        );
        return $infos;
    }
}

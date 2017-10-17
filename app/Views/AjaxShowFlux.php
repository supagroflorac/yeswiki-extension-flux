<?php
namespace Flux\Views;

class AjaxShowFlux extends View
{
    public function __construct($src, $nbItemsToshow, $template, $feed)
    {
        parent::__construct();
        $this->template = $template;
        $this->nbItemsToshow = $nbItemsToshow;
        $this->src = $src;
        $this->feed = clone $feed;
    }

    protected function grabInformations()
    {
        if (!empty($this->feed->items)) {
            $this->feed->items = array_chunk($this->feed->items, $this->nbItemsToshow)[0];
        }

        $infos = array(
            'src' => urlencode($this->src),
            'template' => $this->template,
            'nb' => $this->nbItemsToshow,
            'id' => hash('crc32', $this->src),
            'feed' => $this->feed,
        );
        return $infos;
    }
}

<?php
namespace Flux\Views;

abstract class View
{
    private $twig;

    protected $template = "loading";

    public function __construct()
    {
        $viewsPath = 'presentation/twig/';
        if (is_dir('tools/flux/presentation/twig')) {
            $viewsPath = 'tools/flux/presentation/twig';
        }

        $twigLoader = new \Twig_Loader_Filesystem($viewsPath);
        $this->twig = new \Twig_Environment($twigLoader);
    }

    public function show()
    {
        $infos = $this->grabInformations();
        echo $this->twig->render($this->template . ".twig", $infos);
    }

    abstract protected function grabInformations();
}

<?php
namespace App\Controller\Website;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
{
    /**
     * @Template("website/index.html.twig")
     * @Route("/", name="website_index")
     *
     * @return array
     */
    public function __invoke()
    {
        return [];
    }
}
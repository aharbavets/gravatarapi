<?php

namespace AppBundle\Controller;

use AppBundle\Service\GravatarService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ Rest\Prefix("api/v1/")
 * @ Rest\NamePrefix("")
 */
class GravatarController extends FOSRestController
{

    /**
     * @var GravatarService
     */
    protected $gravatarService;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->gravatarService = $container->get('gravatar_service');
    }

    /**
     * Transforms email addresses into gravatar URIs
     * @param $email string Email for which to create gravatar URI
     * @return string URI of avatar
     * @Rest\Route("/gravatr/{email}")
     * @Rest\View()
     */
    public function generateAction($email)
    {
        $uri = $this->gravatarService->generateURI($email);
        return new Response($uri);
    }
}

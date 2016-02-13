<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @Rest\Prefix("api/v1/")
 * @Rest\NamePrefix("")
 * Following annotation is redundant, since FosRestController implements ClassResourceInterface
 * so the Controller name is used to define the resource. However with this annotation its
 * possible to set the resource to something else unrelated to the Controller name
 * @Rest\RouteResource("Default")
 */
class GravatrController extends FOSRestController
{
    const GRAVATAR_BASE_URL = "http://www.gravatar.com/avatar/";

    /**
     * Transforms email addresses into gravatar URIs
     * @Route("/gravatr/{email}", name="homepage")
     * @param $email string email for which to create an URI
     * @return string URI of avatar
     * @Rest\View()
     * @Rest\QueryParam(name="page", requirements="\d+", default="1", description="Page of the overview.")
     * @ApiDoc()
     */
    public function indexAction($email)
    {
        if (!$email) {
            throw new BadRequestHttpException();
        }
        return self::GRAVATAR_BASE_URL . md5(strtolower(trim($email)));
    }
}

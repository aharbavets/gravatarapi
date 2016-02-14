<?php

namespace AppBundle\Service;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GravatarService
{

    const GRAVATAR_BASE_URL = "http://www.gravatar.com/avatar/";

    /**
     * @param $email string email for which to create an URI
     * @return string URI of avatar
     * @throws BadRequestHttpException
     */
    public function generateURI($email)
    {
        if (!$email) {
            throw new BadRequestHttpException();
        }
        return self::GRAVATAR_BASE_URL . md5(strtolower(trim($email)));
    }

}
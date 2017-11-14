<?php

/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 11:19
 */
namespace AppBundle\Traits;

use Symfony\Component\HttpFoundation\JsonResponse;

trait RestExceptionTrait
{
    /**
     * @param string $message
     * @param int $statusCode
     * @return mixed
     */
    protected function notFoundException($message = 'Item not found', $statusCode = 404)
    {
        return new JsonResponse(array(
            'error' => $message,
            'code' => $statusCode,
        ), $statusCode);
    }
}
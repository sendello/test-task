<?php
/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 15:45
 */

namespace AppBundle\Traits;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

trait RestResponseTrait
{

    public function getFormat(Request $request)
    {
        return $request->query->get($this->container->getParameter('data_type_name'), 'json');
    }

    public function getResponse($data, $format)
    {
        switch ($format) {
            case 'xml':
                $response = $this->getXmlResponse($data);
                break;
            case 'json':
                $response = $this->getJsonResponse($data);
                break;
            default:
                $response = $this->getJsonResponse($data);
        }
        return $response;
    }

    protected function getXmlResponse($xml)
    {
        $response = new Response($xml);
        $response->headers->set('Content-Type', 'xml');
        return $response;
    }

    protected function getJsonResponse($json)
    {
        return JsonResponse::fromJsonString($json);
    }
}
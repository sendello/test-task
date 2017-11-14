<?php
/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 10:26
 */

namespace AppBundle\Serializer\Normalizer;

// ...
use AppBundle\Entity\Article;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Article normalizer
 */
class ArticleNormalizer implements NormalizerInterface
{
    /**
     * @param object $object
     * @param null $format
     * @param array $context
     * @return array
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data['id'] = $object->getId();
        $data['title'] = $object->getTitle();
        $data['content'] = $object->getContent();
        $data['type'] = $object->getType();
        if ($data['type'] == Article::TYPE_REVIEWS) {
            $data['link'] = $object->getLink();
        } elseif ($data['type'] == Article::TYPE_SCIENTIFIC) {
            $data['author'] = $object->getAuthor();
            $data['institution'] = $object->getInstitution();
        }

        return $data;
    }

    /**
     * @param mixed $data
     * @param null $format
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Article;
    }
}
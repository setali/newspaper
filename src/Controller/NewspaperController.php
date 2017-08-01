<?php

namespace Drupal\newspaper\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Created by PhpStorm.
 * User: setali
 * Date: 1/31/17
 * Time: 11:11 AM
 */
class NewspaperController {

    public function index($system) {

        $terms = $this->NewspaperList($system);

        if (empty($terms)) {
            $terms = $this->NewspaperList($system, '-1 day');
        }

        $result = array();
        foreach ($terms as $term) {

            $path = $term->field_newspaper_image->entity->uri->value;
            image_path_flush($path);
            $url = \Drupal\image\Entity\ImageStyle::load('large')->buildUrl($path);

            $result[] = array(
                'name'  => $term->getName(),
                'image' => $url,
            );

        }

        return new JsonResponse($result);
    }

    public function NewspaperList($system, $time_string = null) {

        if ($time_string == null) {
            $time = time();
        }
        else {
            $time = strtotime($time_string);
        }

        $today = \Drupal::service('persian_date.get_jalali')->getJalali('Y-n-j', $time);

        $properties = [
            'vid'                  => 'newspaper',
            'field_newspaper_date' => $today,
        ];

        if ($system == 'tv') {
            $properties['field_show_in_tv'] = 1;
        }
        elseif ($system == 'satrab') {
            $properties['field_show_in_satrab'] = 1;
        }

        $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties($properties);

        return $terms;
    }

}
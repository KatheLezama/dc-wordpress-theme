<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/*
 * Clase encargada del manejo de las peticiones ajax del del tema hijo
 * @version 0.0.1
*/
class ld_child_ajax_handler {

    /**
     * Devuelve una lista de carreras filtradas
     * @return array
     */
    public static function filter_product()
    {
        $data = file_get_contents("php://input");
        $response = [
            'message' => '',
            'errors' => [],
            'status' => 0
        ];
        if (isset($data)) {
            $data = json_decode($data);
            $params = $data->data;
            $args = [
                'post_type' => 'product',
                'order' => 'ASC',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query' => [],
                'tax_query' => [
                    'relation' => 'AND',
                    [
                        'taxonomy' => 'product_category',
                        'terms' => $params->term_id,
                    ],
                ]
            ];
            if (isset($params->brand) && $params->brand != '') {
                $args['meta_query']['brand'] = [
                    'key' => 'brand',
                    'value' => $params->brand
                ];
            }
            if (isset($params->product_status) && $params->product_status != '') {
                $args['meta_query']['product_status'] = [
                    'key' => 'product_status',
                    'value' => $params->product_status
                ];
            }
            if (isset($params->kind_product) && $params->kind_product != '') {
                $args['meta_query']['kind_product'] = [
                    'key' => 'kind_product',
                    'value' => $params->kind_product
                ];
            }

            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                $items = [];
                ob_start();
                while ($loop->have_posts()) : $loop->the_post();
                    $image_id = get_post_thumbnail_id();
                    $image = [
                        'url' => wp_get_attachment_image_src($image_id, 'full')[0],
                        'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
                    ];
                    $brand = get_post( get_field('brand') );
                    $product_status = get_field('product_status');
                    if (!in_array(['title' => $product_status], $product_status_filter)) {
                        array_push($product_status_filter, ['title' => $product_status]);
                    }
                    $kind_product = get_field('kind_product');
                    if (!in_array(['title' => $kind_product], $kind_product_filter)) {
                        array_push($kind_product_filter, ['title' => $kind_product]);
                    }
                    $items[] = [
                        'title' => get_the_title(),
                        'brand' => get_the_title($brand),
                        'product_status' => $product_status,
                        'kind_product' => $kind_product,
                        'price' => get_field('price'),
                        'cta' => get_field('cta'),
                        'items_accordion' => get_field('items_accordion'),
                        'items_document' => get_field('items_document'),
                        'content' => apply_filters('the_content', get_the_content()),
                        'id' => get_the_ID(),
                        'image' => $image,
                        'term_id' => $args[ 'main' ][ 'category' ]
                    ];
                endwhile;
                get_template_part('sections/grids/grid', '9', $args = ['items' => $items]);


                $response['message'] = ob_get_clean();
                $response['status'] = 1;
            } else {
                $response['errors'][] = __('No results were found for your search', 'insomniodev-child');
            }
        }
        echo json_encode($response);
        wp_die();
    }

}

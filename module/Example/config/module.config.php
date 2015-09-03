<?php
return array(
    'router' => array(
        'routes' => array(
            'example.rest.client' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/client',
                    'defaults' => array(
                        'controller' => 'Example\\V1\\Rest\\Client\\Controller'
                    )
                )
            )
        )
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'example.rest.client'
        )
    ),
    'zf-rest' => array(
        'Example\\V1\\Rest\\Client\\Controller' => array(
            'listener' => 'Example\\V1\\Rest\\Client\\ClientResource',
            'route_name' => 'example.rest.client',
            'route_identifier_name' => 'client',
            'collection_name' => 'client',
            'entity_http_methods' => array(
                0 => 'GET'
            ),
            'collection_http_methods' => array(
                0 => 'GET'
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '5',
            'page_size_param' => null,
            'entity_class' => 'Example\\V1\\Rest\\Client\\ClientEntity',
            'collection_class' => 'Example\\V1\\Rest\\Client\\ClientCollection',
            'service_name' => 'Client'
        )
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Example\\V1\\Rest\\Client\\Controller' => 'HalJson'
        ),
        'accept_whitelist' => array(
            'Example\\V1\\Rest\\Client\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json'
            )
        ),
        'content_type_whitelist' => array(
            'Example\\V1\\Rest\\Client\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/json'
            )
        )
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Example\\V1\\Rest\\Client\\ClientEntity' => array(
                'entity_identifier_name' => 'cl_id',
                'route_name' => 'example.rest.client',
                'route_identifier_name' => 'client',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable'
            ),
            'Example\\V1\\Rest\\Client\\ClientCollection' => array(
                'entity_identifier_name' => 'cl_id',
                'route_name' => 'example.rest.client',
                'route_identifier_name' => 'client',
                'is_collection' => true
            )
        )
    )
);
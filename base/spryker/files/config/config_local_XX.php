<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 *
 */
use SprykerFeature\Shared\Application\ApplicationConstants;

$environment = '{{ environment }}';

/** Database credentials */
$config[ApplicationConstants::ZED_DB_USERNAME] =                   '{{ settings.environments[environment].stores[store].zed.database.username }}';
$config[ApplicationConstants::ZED_DB_PASSWORD] =                   '{{ settings.environments[environment].stores[store].zed.database.password }}';
$config[ApplicationConstants::ZED_DB_DATABASE] =                   '{{ settings.environments[environment].stores[store].zed.database.database }}';
$config[ApplicationConstants::ZED_DB_HOST] =                       '{{ settings.environments[environment].stores[store].zed.database.hostname }}';
$config[ApplicationConstants::ZED_DB_PORT] =                       3306;
$config[ApplicationConstants::PROPEL]['database']['connections']['default']['dsn'] = 'mysql:host=' . $config[ApplicationConstants::ZED_DB_HOST]  . ';dbname=' . $config[ApplicationConstants::ZED_DB_DATABASE];


/** Public URL's and domains */
$yvesHost =                                                '{{ settings.environments[environment].stores[store].yves.hostnames[0] }}';
$config[ApplicationConstants::HOST_YVES] =                         'http://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_YVES] =                     'https://' . $yvesHost;
$config[ApplicationConstants::YVES_SSL_ENABLED] =                    true;
$config[ApplicationConstants::YVES_COMPLETE_SSL_ENABLED] =           true;

$config[ApplicationConstants::HOST_STATIC_ASSETS] =
    $config[ApplicationConstants::HOST_STATIC_MEDIA] =             '{{ settings.environments[environment].static.hostname }}';

$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] =
    $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] =         '{{ settings.environments[environment].static.hostname }}';

$zedHost =                                                 '{{ settings.environments[environment].stores[store].zed.hostname }}';
$config[ApplicationConstants::HOST_ZED_GUI] =                      'http://' . $zedHost;
$config[ApplicationConstants::HOST_ZED_API] =                      $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI] =
    $config[ApplicationConstants::HOST_SSL_ZED_API] =              'https://' . $zedHost;
$config[ApplicationConstants::ZED_SSL_ENABLED] =                   true;
$config[ApplicationConstants::ZED_API_SSL_ENABLED] =               true;

$config[ApplicationConstants::YVES_SESSION_COOKIE_DOMAIN] =          $yvesHost;

/** Elasticsearch */
$config[ApplicationConstants::ELASTICA_PARAMETER__HOST] =          '{{ settings.hosts.elasticsearch_data|first }}';
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT] =     'http';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] =          '{{ settings.environments[environment].elasticsearch.http_port }}';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] =    '{{ store|lower }}_{{ environment }}_catalog';
$config[ApplicationConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

/** RabbitMQ */
$config[ApplicationConstants::ZED_RABBITMQ_HOST] =                 '{{ settings.host.queue }}';
$config[ApplicationConstants::ZED_RABBITMQ_PORT] =                 '5672';
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] =             '{{ settings.environments[environment].stores[store].rabbitmq.username }}';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] =             '{{ settings.environments[environment].stores[store].rabbitmq.password }}';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] =                '{{ settings.environments[environment].stores[store].rabbitmq.vhost }}';

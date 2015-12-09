<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 *
 */
use SprykerFeature\Shared\Application\ApplicationConfig;

$environment = '{{ environment }}';

/** Database credentials */
$config[ApplicationConfig::ZED_DB_USERNAME] =                   '{{ settings.environments[environment].stores[store].zed.database.username }}';
$config[ApplicationConfig::ZED_DB_PASSWORD] =                   '{{ settings.environments[environment].stores[store].zed.database.password }}';
$config[ApplicationConfig::ZED_DB_DATABASE] =                   '{{ settings.environments[environment].stores[store].zed.database.database }}';
$config[ApplicationConfig::ZED_DB_HOST] =                       '{{ settings.environments[environment].stores[store].zed.database.hostname }}';
$config[ApplicationConfig::ZED_DB_PORT] =                       3306;
$config[ApplicationConfig::PROPEL]['database']['connections']['default']['dsn'] = 'mysql:host=' . $config[ApplicationConfig::ZED_DB_HOST]  . ';dbname=' . $config[ApplicationConfig::ZED_DB_DATABASE];


/** Public URL's and domains */
$yvesHost =                                                '{{ settings.environments[environment].stores[store].yves.hostnames[0] }}';
$config[ApplicationConfig::HOST_YVES] =                         'http://' . $yvesHost;
$config[ApplicationConfig::HOST_SSL_YVES] =                     'https://' . $yvesHost;
$config[ApplicationConfig::YVES_SSL_ENABLED] =                    true;
$config[ApplicationConfig::YVES_COMPLETE_SSL_ENABLED] =           true;

$config[ApplicationConfig::HOST_STATIC_ASSETS] =
    $config[ApplicationConfig::HOST_STATIC_MEDIA] =             '{{ settings.environments[environment].static.hostname }}';

$config[ApplicationConfig::HOST_SSL_STATIC_ASSETS] =
    $config[ApplicationConfig::HOST_SSL_STATIC_MEDIA] =         '{{ settings.environments[environment].static.hostname }}';

$zedHost =                                                 '{{ settings.environments[environment].stores[store].zed.hostname }}';
$config[ApplicationConfig::HOST_ZED_GUI] =                      'http://' . $zedHost;
$config[ApplicationConfig::HOST_ZED_API] =                      $zedHost;
$config[ApplicationConfig::HOST_SSL_ZED_GUI] =
    $config[ApplicationConfig::HOST_SSL_ZED_API] =              'https://' . $zedHost;
$config[ApplicationConfig::ZED_SSL_ENABLED] =                   true;
$config[ApplicationConfig::ZED_API_SSL_ENABLED] =               true;

$config[ApplicationConfig::YVES_SESSION_COOKIE_DOMAIN] =          $yvesHost;

/** Elasticsearch */
$config[ApplicationConfig::ELASTICA_PARAMETER__HOST] =          '{{ settings.hosts.elasticsearch_data|first }}';
$config[ApplicationConfig::ELASTICA_PARAMETER__TRANSPORT] =     'http';
$config[ApplicationConfig::ELASTICA_PARAMETER__PORT] =          '{{ settings.environments[environment].elasticsearch.http_port }}';
$config[ApplicationConfig::ELASTICA_PARAMETER__INDEX_NAME] =    '{{ store|lower }}_{{ environment }}_catalog';
$config[ApplicationConfig::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

/** RabbitMQ */
$config[ApplicationConfig::ZED_RABBITMQ_HOST] =                 '{{ settings.host.queue }}';
$config[ApplicationConfig::ZED_RABBITMQ_PORT] =                 '5672';
$config[ApplicationConfig::ZED_RABBITMQ_USERNAME] =             '{{ settings.environments[environment].stores[store].rabbitmq.username }}';
$config[ApplicationConfig::ZED_RABBITMQ_PASSWORD] =             '{{ settings.environments[environment].stores[store].rabbitmq.password }}';
$config[ApplicationConfig::ZED_RABBITMQ_VHOST] =                '{{ settings.environments[environment].stores[store].rabbitmq.vhost }}';

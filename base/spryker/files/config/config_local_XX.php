<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 *
 */
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;

$environment = '{{ environment }}';

/** Database credentials */
$config[SystemConfig::ZED_DB_USERNAME] =                   '{{ settings.environments[environment].stores[store].zed.database.username }}';
$config[SystemConfig::ZED_DB_PASSWORD] =                   '{{ settings.environments[environment].stores[store].zed.database.password }}';
$config[SystemConfig::ZED_DB_DATABASE] =                   '{{ settings.environments[environment].stores[store].zed.database.database }}';
$config[SystemConfig::ZED_DB_HOST] =                       '{{ settings.environments[environment].stores[store].zed.database.hostname }}';
$config[SystemConfig::ZED_DB_PORT] =                       3306;
$config[SystemConfig::PROPEL]['database']['connections']['default']['dsn'] = 'mysql:host=' . $config[SystemConfig::ZED_DB_HOST]  . ';dbname=' . $config[SystemConfig::ZED_DB_DATABASE];


/** Public URL's and domains */
$yvesHost =                                                '{{ settings.environments[environment].stores[store].yves.hostnames[0] }}';
$config[SystemConfig::HOST_YVES] =                         'http://' . $yvesHost;
$config[SystemConfig::HOST_SSL_YVES] =                     'https://' . $yvesHost;
$config[YvesConfig::YVES_SSL_ENABLED] =                    true;
$config[YvesConfig::YVES_COMPLETE_SSL_ENABLED] =           true;

$config[SystemConfig::HOST_STATIC_ASSETS] =
    $config[SystemConfig::HOST_STATIC_MEDIA] =             '{{ settings.environments[environment].static.hostname }}';

$config[SystemConfig::HOST_SSL_STATIC_ASSETS] =
    $config[SystemConfig::HOST_SSL_STATIC_MEDIA] =         '{{ settings.environments[environment].static.hostname }}';

$zedHost =                                                 '{{ settings.environments[environment].stores[store].zed.hostname }}';
$config[SystemConfig::HOST_ZED_GUI] =                      'http://' . $zedHost;
$config[SystemConfig::HOST_ZED_API] =                      $zedHost;
$config[SystemConfig::HOST_SSL_ZED_GUI] =
    $config[SystemConfig::HOST_SSL_ZED_API] =              'https://' . $zedHost;
$config[SystemConfig::ZED_SSL_ENABLED] =                   true;
$config[SystemConfig::ZED_API_SSL_ENABLED] =               true;

$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] =          $yvesHost;

/** Elasticsearch */
$config[SystemConfig::ELASTICA_PARAMETER__HOST] =          '{{ settings.hosts.elasticsearch_data|first }}';
$config[SystemConfig::ELASTICA_PARAMETER__TRANSPORT] =     'http';
$config[SystemConfig::ELASTICA_PARAMETER__PORT] =          '{{ settings.environments[environment].elasticsearch.http_port }}';
$config[SystemConfig::ELASTICA_PARAMETER__INDEX_NAME] =    '{{ store|lower }}_{{ environment }}_catalog';
$config[SystemConfig::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

/** RabbitMQ */
$config[SystemConfig::ZED_RABBITMQ_HOST] =                 '{{ settings.host.queue }}';
$config[SystemConfig::ZED_RABBITMQ_PORT] =                 '5672';
$config[SystemConfig::ZED_RABBITMQ_USERNAME] =             '{{ settings.environments[environment].stores[store].rabbitmq.username }}';
$config[SystemConfig::ZED_RABBITMQ_PASSWORD] =             '{{ settings.environments[environment].stores[store].rabbitmq.password }}';
$config[SystemConfig::ZED_RABBITMQ_VHOST] =                '{{ settings.environments[environment].stores[store].rabbitmq.vhost }}';

<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 *
 */
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerFeature\Shared\Payone\PayoneConfig;

$environment = '{{ environment }}';

$config[SystemConfig::ZED_MYSQL_USERNAME] =                '{{ settings.environments[environment].stores[store].zed.database.username }}';
$config[SystemConfig::ZED_MYSQL_PASSWORD] =                '{{ settings.environments[environment].stores[store].zed.database.password }}';
$config[SystemConfig::ZED_MYSQL_DATABASE] =                '{{ settings.environments[environment].stores[store].zed.database.database }}';
$config[SystemConfig::ZED_MYSQL_HOST] =                    '{{ settings.environments[environment].stores[store].zed.database.hostname }}';
$config[SystemConfig::ZED_MYSQL_PORT] =                    3306;


/** Public URL's and domains*/
$yvesHost =                                                '{{ settings.environments[environment].stores[store].yves.hostnames[0] }}';
$config[SystemConfig::HOST_YVES] =                         'http://' . $yvesHost;
$config[SystemConfig::HOST_STATIC_ASSETS] =
    $config[SystemConfig::HOST_STATIC_MEDIA] =             $yvesHost;

$config[SystemConfig::HOST_SSL_YVES] =                     'https://' . $yvesHost;
$config[SystemConfig::HOST_SSL_STATIC_ASSETS] =            $config[SystemConfig::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost =                                                 '{{ settings.environments[environment].stores[store].zed.hostname }}';
$config[SystemConfig::HOST_ZED_GUI] =                      'http://' . $zedHost;
$config[SystemConfig::HOST_ZED_API] =                      $zedHost;
$config[SystemConfig::HOST_SSL_ZED_GUI] =
    = $config[SystemConfig::HOST_SSL_ZED_API] =            'https://' . $zedHost;

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

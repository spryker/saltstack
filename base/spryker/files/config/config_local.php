<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 */
use SprykerFeature\Shared\Application\ApplicationConfig;

/** Session storage */
$config[ApplicationConfig::ZED_SESSION_SAVE_HANDLER]
    = $config[ApplicationConfig::YVES_SESSION_SAVE_HANDLER]
    = 'redis';
$config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '{{ settings.host.redis }}';
$config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '{{ settings.environments[environment].redis.port }}';


$config[ApplicationConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[ApplicationConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[ApplicationConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PORT];

/** Jenkins */
$config[ApplicationConfig::JENKINS_BASE_URL] = 'http://{{ settings.hosts.job|first }}:{{ settings.environments[environment].jenkins.port }}/';
$config[ApplicationConfig::JENKINS_DIRECTORY] = '/data/shop/{{ environment }}/shared/data/common/jenkins';

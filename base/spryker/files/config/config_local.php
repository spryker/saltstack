<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 */
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;

/** Session storage */
$config[SystemConfig::ZED_SESSION_SAVE_HANDLER]
    = $config[YvesConfig::YVES_SESSION_SAVE_HANDLER]
    = 'redis';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '{{ settings.host.redis }}';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '{{ settings.environments[environment].redis.port }}';


$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];

/** Jenkins */
$config[SystemConfig::JENKINS_BASE_URL] = 'http://{{ settings.hosts.job|first }}:{{ settings.environments[environment].jenkins.port }}/';
$config[SystemConfig::JENKINS_DIRECTORY] = '/data/shop/{{ environment }}/shared/data/common/jenkins';

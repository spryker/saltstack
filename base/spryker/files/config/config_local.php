<?php
/**
 * !!! This file is maintained by salt. Do not modify this file, as the changes will be overwritten!
 */
use SprykerFeature\Shared\Application\ApplicationConstants;

/** Session storage */
$config[ApplicationConstants::ZED_SESSION_SAVE_HANDLER]
    = $config[ApplicationConstants::YVES_SESSION_SAVE_HANDLER]
    = 'redis';
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST] = '{{ settings.host.redis }}';
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT] = '{{ settings.environments[environment].redis.port }}';


$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_HOST] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PORT] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT];

/** Jenkins */
$config[ApplicationConstants::JENKINS_BASE_URL] = 'http://{{ settings.hosts.job|first }}:{{ settings.environments[environment].jenkins.port }}/';
$config[ApplicationConstants::JENKINS_DIRECTORY] = '/data/shop/{{ environment }}/shared/data/common/jenkins';

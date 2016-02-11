<?php

$container->setParameter('cmf_testing.bundle_fqn', 'Symfony\Cmf\Bundle\RestBundle');
$loader->import(CMF_TEST_CONFIG_DIR.'/default.php');
$loader->import(CMF_TEST_CONFIG_DIR.'/phpcr_odm.php');
$loader->import(__DIR__.'/cmf_rest.yml');
$loader->import(__DIR__.'/cmf_rest.phpcr.yml');
$loader->import(__DIR__.'/test_services.yml');

<?php

namespace Rollbar\Magento2\Plugin;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\AppInterface;
use Rollbar\Rollbar;

class InitPlugin
{
    public function __construct(
        private DeploymentConfig $deploymentConfig
    ){}
    
    public function beforeLaunch(AppInterface $subject)
    {
        $rollbarConfig = $this->deploymentConfig->get('rollbar');

        if($rollbarConfig) {
            Rollbar::init($rollbarConfig);
        }
    }
}

<?php declare(strict_types=1);

namespace Rollbar\Magento2\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\View\Element\Template;

class Rollbar extends Template
{
    public function __construct(
        Context $context,
        private DeploymentConfig $deploymentConfig,
        array $data = [],
    )
    {
        parent::__construct($context, $data);
    }
    
    public function getRollbarConfig(): array
    {
        $rollbarConfig = $this->deploymentConfig->get('rollbar-js');
        if ($rollbarConfig) {
            return $rollbarConfig;
        }

        // Fallback to an empty array if no config is set
        return [];
    }
}

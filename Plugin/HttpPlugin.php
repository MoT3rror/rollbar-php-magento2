<?php

namespace Rollbar\Magento2\Plugin;

use Exception;
use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Http;

class HttpPlugin
{
	/**
	 * @param callable $callable
	 */
	public function aroundCatchException(Http $subject, $callable, Bootstrap $bootstrap, Exception $exception): bool
	{
		$callable($bootstrap, $exception);

		\Rollbar\Rollbar::error($exception);
		return true;
	}
}

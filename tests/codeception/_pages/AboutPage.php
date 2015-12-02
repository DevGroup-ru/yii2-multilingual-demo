<?php

namespace tests\codeception\_pages;

use yii\codeception\BasePage;
use Yii;

/**
 * Represents about page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class AboutPage extends BasePage
{
    /**
     * Returns the URL to this page.
     * The URL will be returned by calling the URL manager of the application
     * with [[route]] and the provided parameters.
     * @param array $params the GET parameters for creating the URL
     * @return string the URL to this page
     * @throws InvalidConfigException if [[route]] is not set or invalid
     */
    public function getUrl($params = [])
    {

        return $params;
    }

}

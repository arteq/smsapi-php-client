<?php

class CurlProxySuiteTest extends \ProxyTestSuite
{
    protected function setUp()
    {
        if (!extension_loaded('curl')) {
            $this->markTestSuiteSkipped('Curl extension is not available.');
        }

        echo "\n\n--------------\nExecuting Curl Proxy\n\n";
    }

    public static function suite()
    {
        $suite = new CurlProxySuiteTest();

        $suite->addTestsToSuite();

        $curlProxy = new \SMSApi\Proxy\Http\Curl('https://ssl.smsapi.pl');

        $suite->injectProxy($curlProxy);

        return $suite;
    }
}
<?php

namespace AlibabaCloud\Client\Tests\Mock\Services\Slb;

use AlibabaCloud\Client\Result\Result;
use GuzzleHttp\Psr7\Response;

/**
 * Class DescribeRulesRequestMock
 *
 * @package   AlibabaCloud\Client\Tests\Mock\Services\Slb
 */
class DescribeRulesRequestMock extends DescribeRulesRequest
{

    /**
     * @param array $data
     *
     * @return Result
     */
    public function request(array $data)
    {
        $headers = [];
        $body    = \json_encode($data);

        return new Result(new Response(200, $headers, $body), $this);
    }
}

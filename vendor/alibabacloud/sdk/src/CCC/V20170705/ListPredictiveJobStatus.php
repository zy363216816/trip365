<?php

namespace AlibabaCloud\CCC\V20170705;

use AlibabaCloud\Client\Request\RpcRequest;

/**
 * Request of ListPredictiveJobStatus
 *
 * @method string getContactName()
 * @method string getInstanceId()
 * @method string getTimeAlignment()
 * @method string getJobGroupId()
 * @method string getPhoneNumber()
 * @method string getPageSize()
 * @method string getEndTime()
 * @method string getStartTime()
 * @method string getPageNumber()
 */
class ListPredictiveJobStatus extends RpcRequest
{

    /**
     * @var string
     */
    public $product = 'CCC';

    /**
     * @var string
     */
    public $version = '2017-07-05';

    /**
     * @var string
     */
    public $action = 'ListPredictiveJobStatus';

    /**
     * @var string
     */
    public $method = 'POST';

    /**
     * @var string
     */
    public $serviceCode = 'ccc';

    /**
     * @deprecated deprecated since version 2.0, Use withContactName() instead.
     *
     * @param string $contactName
     *
     * @return $this
     */
    public function setContactName($contactName)
    {
        return $this->withContactName($contactName);
    }

    /**
     * @param string $contactName
     *
     * @return $this
     */
    public function withContactName($contactName)
    {
        $this->data['ContactName'] = $contactName;
        $this->options['query']['ContactName'] = $contactName;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withInstanceId() instead.
     *
     * @param string $instanceId
     *
     * @return $this
     */
    public function setInstanceId($instanceId)
    {
        return $this->withInstanceId($instanceId);
    }

    /**
     * @param string $instanceId
     *
     * @return $this
     */
    public function withInstanceId($instanceId)
    {
        $this->data['InstanceId'] = $instanceId;
        $this->options['query']['InstanceId'] = $instanceId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withTimeAlignment() instead.
     *
     * @param string $timeAlignment
     *
     * @return $this
     */
    public function setTimeAlignment($timeAlignment)
    {
        return $this->withTimeAlignment($timeAlignment);
    }

    /**
     * @param string $timeAlignment
     *
     * @return $this
     */
    public function withTimeAlignment($timeAlignment)
    {
        $this->data['TimeAlignment'] = $timeAlignment;
        $this->options['query']['TimeAlignment'] = $timeAlignment;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withJobGroupId() instead.
     *
     * @param string $jobGroupId
     *
     * @return $this
     */
    public function setJobGroupId($jobGroupId)
    {
        return $this->withJobGroupId($jobGroupId);
    }

    /**
     * @param string $jobGroupId
     *
     * @return $this
     */
    public function withJobGroupId($jobGroupId)
    {
        $this->data['JobGroupId'] = $jobGroupId;
        $this->options['query']['JobGroupId'] = $jobGroupId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withPhoneNumber() instead.
     *
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        return $this->withPhoneNumber($phoneNumber);
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function withPhoneNumber($phoneNumber)
    {
        $this->data['PhoneNumber'] = $phoneNumber;
        $this->options['query']['PhoneNumber'] = $phoneNumber;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withPageSize() instead.
     *
     * @param string $pageSize
     *
     * @return $this
     */
    public function setPageSize($pageSize)
    {
        return $this->withPageSize($pageSize);
    }

    /**
     * @param string $pageSize
     *
     * @return $this
     */
    public function withPageSize($pageSize)
    {
        $this->data['PageSize'] = $pageSize;
        $this->options['query']['PageSize'] = $pageSize;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withEndTime() instead.
     *
     * @param string $endTime
     *
     * @return $this
     */
    public function setEndTime($endTime)
    {
        return $this->withEndTime($endTime);
    }

    /**
     * @param string $endTime
     *
     * @return $this
     */
    public function withEndTime($endTime)
    {
        $this->data['EndTime'] = $endTime;
        $this->options['query']['EndTime'] = $endTime;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withStartTime() instead.
     *
     * @param string $startTime
     *
     * @return $this
     */
    public function setStartTime($startTime)
    {
        return $this->withStartTime($startTime);
    }

    /**
     * @param string $startTime
     *
     * @return $this
     */
    public function withStartTime($startTime)
    {
        $this->data['StartTime'] = $startTime;
        $this->options['query']['StartTime'] = $startTime;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withPageNumber() instead.
     *
     * @param string $pageNumber
     *
     * @return $this
     */
    public function setPageNumber($pageNumber)
    {
        return $this->withPageNumber($pageNumber);
    }

    /**
     * @param string $pageNumber
     *
     * @return $this
     */
    public function withPageNumber($pageNumber)
    {
        $this->data['PageNumber'] = $pageNumber;
        $this->options['query']['PageNumber'] = $pageNumber;

        return $this;
    }
}

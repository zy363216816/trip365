<?php

namespace AlibabaCloud\Rds\V20140815;

use AlibabaCloud\Client\Request\RpcRequest;

/**
 * Request of CreateMigrateTaskForSQLServer
 *
 * @method string getResourceOwnerId()
 * @method string getTaskType()
 * @method string getDBName()
 * @method string getResourceOwnerAccount()
 * @method string getIsOnlineDB()
 * @method string getDBInstanceId()
 * @method string getOwnerId()
 * @method string getOSSUrls()
 */
class CreateMigrateTaskForSQLServer extends RpcRequest
{

    /**
     * @var string
     */
    public $product = 'Rds';

    /**
     * @var string
     */
    public $version = '2014-08-15';

    /**
     * @var string
     */
    public $action = 'CreateMigrateTaskForSQLServer';

    /**
     * @var string
     */
    public $method = 'POST';

    /**
     * @var string
     */
    public $serviceCode = 'rds';

    /**
     * @deprecated deprecated since version 2.0, Use withResourceOwnerId() instead.
     *
     * @param string $resourceOwnerId
     *
     * @return $this
     */
    public function setResourceOwnerId($resourceOwnerId)
    {
        return $this->withResourceOwnerId($resourceOwnerId);
    }

    /**
     * @param string $resourceOwnerId
     *
     * @return $this
     */
    public function withResourceOwnerId($resourceOwnerId)
    {
        $this->data['ResourceOwnerId'] = $resourceOwnerId;
        $this->options['query']['ResourceOwnerId'] = $resourceOwnerId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withTaskType() instead.
     *
     * @param string $taskType
     *
     * @return $this
     */
    public function setTaskType($taskType)
    {
        return $this->withTaskType($taskType);
    }

    /**
     * @param string $taskType
     *
     * @return $this
     */
    public function withTaskType($taskType)
    {
        $this->data['TaskType'] = $taskType;
        $this->options['query']['TaskType'] = $taskType;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withDBName() instead.
     *
     * @param string $dBName
     *
     * @return $this
     */
    public function setDBName($dBName)
    {
        return $this->withDBName($dBName);
    }

    /**
     * @param string $dBName
     *
     * @return $this
     */
    public function withDBName($dBName)
    {
        $this->data['DBName'] = $dBName;
        $this->options['query']['DBName'] = $dBName;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withResourceOwnerAccount() instead.
     *
     * @param string $resourceOwnerAccount
     *
     * @return $this
     */
    public function setResourceOwnerAccount($resourceOwnerAccount)
    {
        return $this->withResourceOwnerAccount($resourceOwnerAccount);
    }

    /**
     * @param string $resourceOwnerAccount
     *
     * @return $this
     */
    public function withResourceOwnerAccount($resourceOwnerAccount)
    {
        $this->data['ResourceOwnerAccount'] = $resourceOwnerAccount;
        $this->options['query']['ResourceOwnerAccount'] = $resourceOwnerAccount;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withIsOnlineDB() instead.
     *
     * @param string $isOnlineDB
     *
     * @return $this
     */
    public function setIsOnlineDB($isOnlineDB)
    {
        return $this->withIsOnlineDB($isOnlineDB);
    }

    /**
     * @param string $isOnlineDB
     *
     * @return $this
     */
    public function withIsOnlineDB($isOnlineDB)
    {
        $this->data['IsOnlineDB'] = $isOnlineDB;
        $this->options['query']['IsOnlineDB'] = $isOnlineDB;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withDBInstanceId() instead.
     *
     * @param string $dBInstanceId
     *
     * @return $this
     */
    public function setDBInstanceId($dBInstanceId)
    {
        return $this->withDBInstanceId($dBInstanceId);
    }

    /**
     * @param string $dBInstanceId
     *
     * @return $this
     */
    public function withDBInstanceId($dBInstanceId)
    {
        $this->data['DBInstanceId'] = $dBInstanceId;
        $this->options['query']['DBInstanceId'] = $dBInstanceId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withOwnerId() instead.
     *
     * @param string $ownerId
     *
     * @return $this
     */
    public function setOwnerId($ownerId)
    {
        return $this->withOwnerId($ownerId);
    }

    /**
     * @param string $ownerId
     *
     * @return $this
     */
    public function withOwnerId($ownerId)
    {
        $this->data['OwnerId'] = $ownerId;
        $this->options['query']['OwnerId'] = $ownerId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withOSSUrls() instead.
     *
     * @param string $oSSUrls
     *
     * @return $this
     */
    public function setOSSUrls($oSSUrls)
    {
        return $this->withOSSUrls($oSSUrls);
    }

    /**
     * @param string $oSSUrls
     *
     * @return $this
     */
    public function withOSSUrls($oSSUrls)
    {
        $this->data['OSSUrls'] = $oSSUrls;
        $this->options['query']['OSSUrls'] = $oSSUrls;

        return $this;
    }
}

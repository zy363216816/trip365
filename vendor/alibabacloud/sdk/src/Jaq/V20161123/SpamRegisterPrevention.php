<?php

namespace AlibabaCloud\Jaq\V20161123;

use AlibabaCloud\Client\Request\RpcRequest;

/**
 * Request of SpamRegisterPrevention
 *
 * @method string getProtocolVersion()
 * @method string getCurrentUrl()
 * @method string getReferer()
 * @method string getAgent()
 * @method string getAddress()
 * @method string getCookie()
 * @method string getIp()
 * @method string getIDNumber()
 * @method string getPhoneNumber()
 * @method string getSource()
 * @method string getSessionId()
 * @method string getUserId()
 * @method string getBankCardNumber()
 * @method string getIdType()
 * @method string getExtendData()
 * @method string getCompanyName()
 * @method string getNickName()
 * @method string getJsToken()
 * @method string getMacAddress()
 * @method string getSDKToken()
 * @method string getCallerName()
 * @method string getEmail()
 */
class SpamRegisterPrevention extends RpcRequest
{

    /**
     * @var string
     */
    public $product = 'jaq';

    /**
     * @var string
     */
    public $version = '2016-11-23';

    /**
     * @var string
     */
    public $action = 'SpamRegisterPrevention';

    /**
     * @var string
     */
    public $method = 'POST';

    /**
     * @deprecated deprecated since version 2.0, Use withProtocolVersion() instead.
     *
     * @param string $protocolVersion
     *
     * @return $this
     */
    public function setProtocolVersion($protocolVersion)
    {
        return $this->withProtocolVersion($protocolVersion);
    }

    /**
     * @param string $protocolVersion
     *
     * @return $this
     */
    public function withProtocolVersion($protocolVersion)
    {
        $this->data['ProtocolVersion'] = $protocolVersion;
        $this->options['query']['ProtocolVersion'] = $protocolVersion;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withCurrentUrl() instead.
     *
     * @param string $currentUrl
     *
     * @return $this
     */
    public function setCurrentUrl($currentUrl)
    {
        return $this->withCurrentUrl($currentUrl);
    }

    /**
     * @param string $currentUrl
     *
     * @return $this
     */
    public function withCurrentUrl($currentUrl)
    {
        $this->data['CurrentUrl'] = $currentUrl;
        $this->options['query']['CurrentUrl'] = $currentUrl;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withReferer() instead.
     *
     * @param string $referer
     *
     * @return $this
     */
    public function setReferer($referer)
    {
        return $this->withReferer($referer);
    }

    /**
     * @param string $referer
     *
     * @return $this
     */
    public function withReferer($referer)
    {
        $this->data['Referer'] = $referer;
        $this->options['query']['Referer'] = $referer;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withAgent() instead.
     *
     * @param string $agent
     *
     * @return $this
     */
    public function setAgent($agent)
    {
        return $this->withAgent($agent);
    }

    /**
     * @param string $agent
     *
     * @return $this
     */
    public function withAgent($agent)
    {
        $this->data['Agent'] = $agent;
        $this->options['query']['Agent'] = $agent;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withAddress() instead.
     *
     * @param string $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        return $this->withAddress($address);
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function withAddress($address)
    {
        $this->data['Address'] = $address;
        $this->options['query']['Address'] = $address;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withCookie() instead.
     *
     * @param string $cookie
     *
     * @return $this
     */
    public function setCookie($cookie)
    {
        return $this->withCookie($cookie);
    }

    /**
     * @param string $cookie
     *
     * @return $this
     */
    public function withCookie($cookie)
    {
        $this->data['Cookie'] = $cookie;
        $this->options['query']['Cookie'] = $cookie;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withIp() instead.
     *
     * @param string $ip
     *
     * @return $this
     */
    public function setIp($ip)
    {
        return $this->withIp($ip);
    }

    /**
     * @param string $ip
     *
     * @return $this
     */
    public function withIp($ip)
    {
        $this->data['Ip'] = $ip;
        $this->options['query']['Ip'] = $ip;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withIDNumber() instead.
     *
     * @param string $iDNumber
     *
     * @return $this
     */
    public function setIDNumber($iDNumber)
    {
        return $this->withIDNumber($iDNumber);
    }

    /**
     * @param string $iDNumber
     *
     * @return $this
     */
    public function withIDNumber($iDNumber)
    {
        $this->data['IDNumber'] = $iDNumber;
        $this->options['query']['IDNumber'] = $iDNumber;

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
     * @deprecated deprecated since version 2.0, Use withSource() instead.
     *
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        return $this->withSource($source);
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function withSource($source)
    {
        $this->data['Source'] = $source;
        $this->options['query']['Source'] = $source;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withSessionId() instead.
     *
     * @param string $sessionId
     *
     * @return $this
     */
    public function setSessionId($sessionId)
    {
        return $this->withSessionId($sessionId);
    }

    /**
     * @param string $sessionId
     *
     * @return $this
     */
    public function withSessionId($sessionId)
    {
        $this->data['SessionId'] = $sessionId;
        $this->options['query']['SessionId'] = $sessionId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withUserId() instead.
     *
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        return $this->withUserId($userId);
    }

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function withUserId($userId)
    {
        $this->data['UserId'] = $userId;
        $this->options['query']['UserId'] = $userId;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withBankCardNumber() instead.
     *
     * @param string $bankCardNumber
     *
     * @return $this
     */
    public function setBankCardNumber($bankCardNumber)
    {
        return $this->withBankCardNumber($bankCardNumber);
    }

    /**
     * @param string $bankCardNumber
     *
     * @return $this
     */
    public function withBankCardNumber($bankCardNumber)
    {
        $this->data['BankCardNumber'] = $bankCardNumber;
        $this->options['query']['BankCardNumber'] = $bankCardNumber;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withIdType() instead.
     *
     * @param string $idType
     *
     * @return $this
     */
    public function setIdType($idType)
    {
        return $this->withIdType($idType);
    }

    /**
     * @param string $idType
     *
     * @return $this
     */
    public function withIdType($idType)
    {
        $this->data['IdType'] = $idType;
        $this->options['query']['IdType'] = $idType;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withExtendData() instead.
     *
     * @param string $extendData
     *
     * @return $this
     */
    public function setExtendData($extendData)
    {
        return $this->withExtendData($extendData);
    }

    /**
     * @param string $extendData
     *
     * @return $this
     */
    public function withExtendData($extendData)
    {
        $this->data['ExtendData'] = $extendData;
        $this->options['query']['ExtendData'] = $extendData;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withCompanyName() instead.
     *
     * @param string $companyName
     *
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        return $this->withCompanyName($companyName);
    }

    /**
     * @param string $companyName
     *
     * @return $this
     */
    public function withCompanyName($companyName)
    {
        $this->data['CompanyName'] = $companyName;
        $this->options['query']['CompanyName'] = $companyName;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withNickName() instead.
     *
     * @param string $nickName
     *
     * @return $this
     */
    public function setNickName($nickName)
    {
        return $this->withNickName($nickName);
    }

    /**
     * @param string $nickName
     *
     * @return $this
     */
    public function withNickName($nickName)
    {
        $this->data['NickName'] = $nickName;
        $this->options['query']['NickName'] = $nickName;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withJsToken() instead.
     *
     * @param string $jsToken
     *
     * @return $this
     */
    public function setJsToken($jsToken)
    {
        return $this->withJsToken($jsToken);
    }

    /**
     * @param string $jsToken
     *
     * @return $this
     */
    public function withJsToken($jsToken)
    {
        $this->data['JsToken'] = $jsToken;
        $this->options['query']['JsToken'] = $jsToken;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withMacAddress() instead.
     *
     * @param string $macAddress
     *
     * @return $this
     */
    public function setMacAddress($macAddress)
    {
        return $this->withMacAddress($macAddress);
    }

    /**
     * @param string $macAddress
     *
     * @return $this
     */
    public function withMacAddress($macAddress)
    {
        $this->data['MacAddress'] = $macAddress;
        $this->options['query']['MacAddress'] = $macAddress;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withSDKToken() instead.
     *
     * @param string $sDKToken
     *
     * @return $this
     */
    public function setSDKToken($sDKToken)
    {
        return $this->withSDKToken($sDKToken);
    }

    /**
     * @param string $sDKToken
     *
     * @return $this
     */
    public function withSDKToken($sDKToken)
    {
        $this->data['SDKToken'] = $sDKToken;
        $this->options['query']['SDKToken'] = $sDKToken;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withCallerName() instead.
     *
     * @param string $callerName
     *
     * @return $this
     */
    public function setCallerName($callerName)
    {
        return $this->withCallerName($callerName);
    }

    /**
     * @param string $callerName
     *
     * @return $this
     */
    public function withCallerName($callerName)
    {
        $this->data['CallerName'] = $callerName;
        $this->options['query']['CallerName'] = $callerName;

        return $this;
    }

    /**
     * @deprecated deprecated since version 2.0, Use withEmail() instead.
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->withEmail($email);
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function withEmail($email)
    {
        $this->data['Email'] = $email;
        $this->options['query']['Email'] = $email;

        return $this;
    }
}

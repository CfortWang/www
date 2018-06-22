<?php
/**
 * SecssUtil PHP 版本  for MER 1.0 版本
 * @author wang.ivan
 *
 */
define('CP_SIGN_FILE', "sign.file");
define('CP_SIGN_FILE_PASSWORD', "sign.file.password");
define('CP_SIGN_CERT_TYPE', "sign.cert.type");
define('CP_SIGN_INVALID_FIELDS', "sign.invalid.fields");
define('CP_VERIFY_FILE', "verify.file");
define('CP_SIGNATURE_FIELD', "signature.field");
// -------------------出错码Key-------------------------
// SUCCESS .
define('CP_SUCCESS', "00");
// LOAD_CONFIG_ERROR .
define("CP_LOAD_CONFIG_ERROR", "01");
// SIGN_CERT_ERROR .
define("CP_SIGN_CERT_ERROR", "02");
// SIGN_CERT_PWD_ERROR .
define("CP_SIGN_CERT_PWD_ERROR", "03");
// SIGN_CERT_TYPE_ERROR .
define("CP_SIGN_CERT_TYPE_ERROR", "04");
// INIT_SIGN_CERT_ERROR .
define("CP_INIT_SIGN_CERT_ERROR", "05");
// VERIFY_CERT_ERROR .
define("CP_VERIFY_CERT_ERROR", "06");
// INIT_VERIFY_CERT_ERROR .
define("CP_INIT_VERIFY_CERT_ERROR", "07");
// GET_PRI_KEY_ERROR .
define("CP_GET_PRI_KEY_ERROR", "08");
// GET_CERT_ID_ERROR .
define("CP_GET_CERT_ID_ERROR", "09");
// GET_SIGN_STRING_ERROR .
define("CP_GET_SIGN_STRING_ERROR", "10");
// SIGN_GOES_WRONG .
define("CP_SIGN_GOES_WRONG", "11");
// VERIFY_GOES_WRONG .
define("CP_VERIFY_GOES_WRONG", "12");
// VERIFY_FAILED .
define("CP_VERIFY_FAILED", "13");
// SIGN_FIELD_NULL .
define("CP_SIGN_FIELD_NULL", "14");
// SIGN_VALUE_NULL .
define("CP_SIGN_VALUE_NULL", "15");
// UNKNOWN_WRONG .
define("CP_UNKNOWN_WRONG", "16");
// ENCPIN_GOES_WRONG .
define("CP_ENCPIN_GOES_WRONG", "17");
// ENCDATA_GOES_WRONG .
define("CP_ENCDATA_GOES_WRONG", "18");
// DECDATA_GOES_WRONG .
define("CP_DECDATA_GOES_WRONG", "19");
// DEFAULTINIT_GOES_WRONG .
define("CP_DEFAULTINIT_GOES_WRONG", "20");
// SPECIFYINIT_GOES_WRONG .
define("CP_SPECIFYINIT_GOES_WRONG", "21");
// RELOADSC_GOES_WRONG .
define("CP_RELOADSC_GOES_WRONG", "22");
// NO_INIT .
define("CP_NO_INIT", "23");
// SIGN_FILE .
define("CP_CONFIG_WRONG", "24");
// SIGN_FILE .
define("CP_INIT_CONFIG_WRONG", "25");

// ---------------------------------------
// 等号 .
define("CP_KEY_VALUE_CONNECT", "=");

// 字段连接符 .
define("CP_MESSAGE_CONNECT", "&");

// 签名算法名称 .
define("CP_SIGN_ALGNAME", "SHA512WithRSA");

// 加密算法前缀 .
define("CP_ENC_ALG_PREFIX", "RSA");

// 通用编码 .
define("CP_CHARSET_COMM", "UTF-8");
// PKCS12
define("CP_PKCS12", "PKCS12");
define("CP_OPENSSL_ALGO_SHA1", 1);
define("CP_OPENSSL_ALGO_SHA224", 6);
define("CP_OPENSSL_ALGO_SHA256", 7);
define("CP_OPENSSL_ALGO_SHA384", 8);
define("CP_OPENSSL_ALGO_SHA512", 9);

/**
 * SecssUtil PHP 版本 mer 1.0
 *
 * @author wang.ivan
 *        
 */
class SecssUtil
{

    private static $VERSION = 1.0;

    private static $errMap = array(
        // 00.操作成功
        CP_SUCCESS => "操作成功",
        // 01.加载secss.properties配置文件出错，请检查文件路径！
        CP_LOAD_CONFIG_ERROR => "加载security.properties配置文件出错，请检查文件路径！",
        // 02.签名文件路径配置错误！
        CP_SIGN_CERT_ERROR => "签名文件路径配置错误！",
        // 03.签名文件访问密码配置错误！
        CP_SIGN_CERT_PWD_ERROR => "签名文件访问密码配置错误！",
        // 04.签名文件密钥容器类型配置错误，需为PKCS12！
        CP_SIGN_CERT_TYPE_ERROR => "签名文件密钥容器类型配置错误，需为PKCS12！",
        // 05.初始化签名文件出错！
        CP_INIT_SIGN_CERT_ERROR => "初始化签名文件出错！",
        // 06.验签证书路径配置错误！
        CP_VERIFY_CERT_ERROR => "验签证书路径配置错误！",
        // 07.初始化验签证书出错！
        CP_INIT_VERIFY_CERT_ERROR => "初始化验签证书出错！",
        // 08.获取签名私钥出错！
        CP_GET_PRI_KEY_ERROR => "获取签名私钥出错！",
        // 09.获取签名证书ID出错！
        CP_GET_CERT_ID_ERROR => "获取签名证书ID出错！",
        // 10.获取签名字符串出错！
        CP_GET_SIGN_STRING_ERROR => "获取签名字符串出错！",
        // 11.签名过程发生错误！
        CP_SIGN_GOES_WRONG => "签名过程发生错误！",
        // 12.验签过程发生错误！
        CP_VERIFY_GOES_WRONG => "验签过程发生错误！",
        // 13.验签失败！
        CP_VERIFY_FAILED => "验签失败！",
        // 14.配置文件中签名字段名称为空！
        CP_SIGN_FIELD_NULL => "配置文件中签名字段名称为空！",
        // 15.报文中签名为空！
        CP_SIGN_VALUE_NULL => "报文中签名为空！",
        // 16.未知错误！
        CP_UNKNOWN_WRONG => "未知错误",
        // 17.Pin加密过程发生错误！
        CP_ENCPIN_GOES_WRONG => "Pin加密过程发生错误！",
        // 18.数据加密过程发生错误！
        CP_ENCDATA_GOES_WRONG => "数据加密过程发生错误！",
        // 19.数据解密过程发生错误！
        CP_DECDATA_GOES_WRONG => "数据解密过程发生错误！",
        // 20.从默认配置文件初始化安全控件发生错误！
        CP_DEFAULTINIT_GOES_WRONG => "从默认配置文件初始化安全控件发生错误！",
        // 21.从指定属性集初始化安全控件发生错误！
        CP_SPECIFYINIT_GOES_WRONG => "从指定属性集初始化安全控件发生错误！",
        // 22.重新加载签名证书发生错误！
        CP_RELOADSC_GOES_WRONG => "重新加载签名证书发生错误！",
        // 23.未初化安全控件！
        CP_NO_INIT => "未初化安全控件",
        // 24.控件初始化信息未正确配置，请检查！
        CP_CONFIG_WRONG => "控件初始化信息未正确配置，请检查！",
        // 25.初始化配置信息发生错误！
        CP_INIT_CONFIG_WRONG => "初始化配置信息发生错误！"
    );
    // 需要进行加密的字段，加密采用chinapay的公钥加密
    private static $encryptFieldMap = array(
        "CardTransData"
    );

    private $CPPublicKey;

    private $MerPrivateKey;

    /**
     * sign .
     */
    private $sign;

    /**
     * encPin .
     */
    private $encPin;

    /**
     * encValue .
     */
    private $encValue;

    /**
     * decValue .
     */
    private $decValue;

    /**
     * privatePFXCertId .
     */
    private $privatePFXCertId;

    /**
     * publicCERCertId .
     */
    private $publicCERCertId;

    /**
     * errCode .
     */
    private $errCode;

    /**
     * errMsg .
     */
    private $errMsg;

    /**
     * #签名文件路径 .
     */
    private $signFile;

    /**
     * #签名文件访问密码
     */
    private $signFilePassword;

    /**
     * #签名文件的密钥容器格式
     */
    private $signCertType;

    /**
     * #报文中不参与签名的字段名称，多个字段用逗号进行分隔
     */
    private $signInvalidFields;

    /**
     * #验签证书路径
     */
    private $verifyFile;

    /**
     * #报文中签名的字段名称
     */
    private $signatureField;

    private $initFalg = false;

    /**
     * sha1
     * sha256
     * sha384
     * sha512
     * 
     * @var unknown
     */
    private $shaMethod = CP_OPENSSL_ALGO_SHA512;

    /**
     * #CP公钥位数
     */
    private $cpPubBits;

    function __construct()
    {}

    function __destruct()
    {}

    /**
     * 获取插件版本号
     *
     * @return number
     */
    public function getVerstion()
    {
        return $this->VERSION;
    }

    /**
     * 解析商户security.properties文件，初始化加密安全控件
     *
     * @param unknown $securityPropFile
     *            security.properties全路径
     * @return null
     */
    public function init($securityPropFile)
    {
        try {
            // 读取密钥文件
            $key_file = parse_ini_file($securityPropFile);
            if (! $key_file) {
                // 01.加载secss.properties配置文件出错，请检查文件路径！
                $this->errCode = CP_LOAD_CONFIG_ERROR;
                $this->writeLog("in SecssUitl->init 加载security.properties配置文件出错，请检查文件路径！");
                return false;
            }
            
            // #签名文件路径
            // sign.file=D:/cert_cp/000000000000001.pfx
            if (array_key_exists(CP_SIGN_FILE, $key_file)) {
                $this->signFile = $key_file[CP_SIGN_FILE];
                if (empty($this->signFile)) {
                    $this->errCode = CP_SIGN_CERT_ERROR;
                    $this->writeLog("in SecssUitl->init security.properties文件中sign.file为空 ");
                    return false;
                }
                if (! file_exists($this->signFile)) {
                    $this->errCode = CP_SIGN_CERT_ERROR;
                    $this->writeLog("in SecssUitl->init security.properties文件中sign.file=[" . $this->verifyFile . "],文件不存在");
                    return false;
                }
            } else {
                $this->errCode = CP_SIGN_CERT_ERROR;
                $this->writeLog("in SecssUitl->init security.properties文件中sign.file参数不存在 ");
                return false;
            }
            // #签名文件访问密码
            // sign.file.password=123456
            
            if (array_key_exists(CP_SIGN_FILE_PASSWORD, $key_file)) {
                $this->signFilePassword = $key_file[CP_SIGN_FILE_PASSWORD];
            } else {
                $this->signFilePassword = "";
            }
            // #签名文件的密钥容器格式
            // sign.cert.type=PKCS12
            if (array_key_exists(CP_SIGN_CERT_TYPE, $key_file)) {
                $this->signCertType = $key_file[CP_SIGN_CERT_TYPE];
                if (empty($this->signCertType)) {
                    $this->errCode = CP_SIGN_CERT_TYPE_ERROR;
                    $this->writeLog("in SecssUitl->init security.properties文件中sign.cert.type格式为空 ");
                    return false;
                } else 
                    if (CP_PKCS12 != $this->signCertType) {
                        $this->errCode = CP_SIGN_CERT_TYPE_ERROR;
                        $this->writeLog("in SecssUitl->init security.properties文件中sign.cert.type格式错误 ");
                        return false;
                    }
            } else {
                $this->errCode = CP_SIGN_CERT_TYPE_ERROR;
                $this->writeLog("in SecssUitl->init security.properties文件中sign.cert.type字段不存在");
                return false;
            }
            // #报文中不参与签名的字段名称，多个字段用逗号进行分隔
            // sign.invalid.fields=Signature,CertId
            if (array_key_exists(CP_SIGN_INVALID_FIELDS, $key_file)) {
                $this->signInvalidFields = $key_file[CP_SIGN_INVALID_FIELDS];
            }
            // #验签证书路径
            // verify.file=D:/cert_cp/cp_test.cer
            if (array_key_exists(CP_VERIFY_FILE, $key_file)) {
                $this->verifyFile = $key_file[CP_VERIFY_FILE];
                if (empty($this->verifyFile)) {
                    $this->errCode = CP_VERIFY_CERT_ERROR;
                    $this->writeLog("in SecssUitl->init security.properties文件中verify.file字段为空");
                    return false;
                }
                if (! file_exists($this->verifyFile)) {
                    $this->errCode = CP_VERIFY_CERT_ERROR;
                    $this->writeLog("in SecssUitl->init security.properties文件中verify.file=[" . $this->verifyFile . "],文件不存在");
                    return false;
                }
            } else {
                $this->errCode = CP_VERIFY_CERT_ERROR;
                $this->writeLog("in SecssUitl->init security.properties文件中verify.file字段不存在");
                return false;
            }
            
            // #报文中签名的字段名称
            // signature.field=Signature
            if (array_key_exists(CP_SIGNATURE_FIELD, $key_file)) {
                $this->signatureField = $key_file[CP_SIGNATURE_FIELD];
            }
            
            $merPkcs12 = file_get_contents($this->signFile);
            if (empty($merPkcs12)) {
                $this->errCode = CP_GET_PRI_KEY_ERROR;
                $this->writeLog("in SecssUitl->init 读取pfx证书文件失败.pfxFile=[" . $this->signFile . "]");
                return false;
            }
            // --------------------------解析商户私钥证书
            $pkcs12 = openssl_pkcs12_read($merPkcs12, $this->MerPrivateKey, $this->signFilePassword);
            if (! $pkcs12) {
                $this->errCode = CP_GET_PRI_KEY_ERROR;
                $this->writeLog("in SecssUitl->init 解析pfx证书内容错误.pfxFile=[" . $this->signFile . "]");
                return false;
            }
            // 读取证书编号
            $x509data = $this->MerPrivateKey['cert'];
            
            if (! openssl_x509_read($x509data)) {
                $this->errCode = CP_GET_PRI_KEY_ERROR;
                $this->writeLog("in SecssUitl->init 读取pfx证书公钥错误.pfxFile=[" . $this->signFile . "]");
                return false;
            }
            // 通过打印certdata可查看证书详细信息
            $certdata = openssl_x509_parse($x509data);
            if (empty($certdata)) {
                $this->errCode = CP_GET_PRI_KEY_ERROR;
                $this->writeLog("in SecssUitl->init 解析pfx证书公钥成功，但解析证书错误.pfxFile=[" . $this->signFile . "]");
                return false;
            }
            $this->privatePFXCertId = $certdata['serialNumber'];
            $this->writeLog("in SecssUitl->init 解析pfx证书公钥成功，证书编号=[" . $this->privatePFXCertId . "]");
            
            // ---------------CP公钥解析-------------------------------
            
            $this->CPPublicKey = file_get_contents($this->verifyFile);
            if (empty($this->CPPublicKey)) {
                $this->errCode = INIT_VERIFY_CERT_ERROR;
                $this->writeLog("in SecssUitl->init 读取CP公钥证书文件失败.cerFile=[" . $this->verifyFile . "]");
                return false;
            }
            
            // 通过打印certdata可查看证书详细信息
            $pk = openssl_pkey_get_public($this->CPPublicKey);
            $a = openssl_pkey_get_details($pk);
            $this->cpPubBits = $a['bits'];
            $certdata = openssl_x509_parse($this->CPPublicKey, false);
            if (empty($certdata)) {
                $this->errCode = INIT_VERIFY_CERT_ERROR;
                $this->writeLog("in SecssUitl->init 解析CP证书公钥成功，但解析证书错误.cerFile=[" . $this->verifyFile . "]");
                return false;
            }
            $this->publicCERCertId = $certdata['serialNumber'];
            $this->writeLog("in SecssUitl->init 解析CP证书公钥成功，证书编号=[" . $this->publicCERCertId . "]");
            $this->initFalg = true;
            return true;
        } catch (Exception $e) {
            $this->errCode = CP_UNKNOWN_WRONG;
            $this->writeLog("in SecssUitl->init 初始化CP签名控件出错,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 商户签名函数，返回签名信息，如签名失败返回负值，待签名数据以数组方式传送，数组格式如下：
     * array("a"=>"1","b"=>"2")
     * 如签名成功返回签名数据
     *
     * @param
     *            $paramArray
     */
    public function sign($paramArray)
    {
        try {
            $this->sign = null;
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->sign 未调用init方法，无法进行签名");
                return false;
            }
            // 根据key对数组升序排列
            ksort($paramArray);
            
            $signRawData = $this->getSignStr($paramArray);
            if (empty($signRawData)) {
                $this->errCode = CP_GET_SIGN_STRING_ERROR;
                $this->writeLog("in SecssUitl->sign 获取待签名字符串失败");
                return false;
            }
            
            $charSet = mb_detect_encoding($signRawData, array(
                "UTF-8",
                "GB2312",
                "GBK"
            ));
            // $this->writeLog("in SecssUitl->sign charSet=[" . $charSet . "]");
            $tempSignRawData = mb_convert_encoding($signRawData, "UTF-8", $charSet);
            $this->writeLog("in SecssUitl->sign 待签名数据=[" . $tempSignRawData . "]");
            $sign_falg = openssl_sign($tempSignRawData, $signature, $this->MerPrivateKey['pkey'], $this->shaMethod);
            if (! $sign_falg) {
                $this->errCode = CP_SIGN_GOES_WRONG;
                $this->writeLog("in SecssUitl->sign 签名失败,openssl签名失败,openssl return=[" . $sign_falg . "]");
                return false;
            }
            // $this->writeLog("in SecssUitl->sign signature=" . bin2hex($signature));
            $base64Result = base64_encode($signature);
            // $this->writeLog("in SecssUitl->sign base64Result=" . $base64Result);
            $this->sign = $base64Result;
            $this->errCode = CP_SUCCESS;
            return true;
        } catch (Exception $e) {
            $this->errCode = CP_SIGN_GOES_WRONG;
            $this->writeLog("in SecssUitl->sign 签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 商户签名函数，返回签名信息，如签名失败返回负值，待签名数据以数组方式传送，数组格式如下：
     * array("a"=>"1","b"=>"2")
     * 如签名成功返回签名数据
     *
     * @param
     *            $paramArray
     * @param
     *            $cpOpensslAlgo
     * @param            
     *
     */
    public function signByAlgo($paramArray, $cpOpensslAlgo)
    {
        try {
            $this->shaMethod = $cpOpensslAlgo;
            return $this->sign($paramArray);
        } catch (Exception $e) {
            $this->errCode = CP_SIGN_GOES_WRONG;
            $this->writeLog("in SecssUitl->signByAlgo 签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 签名 验证，商户传入原始报文数组，另外数组中需要增加待验证签名，数组key为：Signature。如下：<br/>
     * array("a"=>"1","b"=>"2","Signature"=>"待验证签名")
     * 
     * @param
     *            $paramArray
     * @return boolean
     */
    public function verify($paramArray)
    {
        try {
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->verify 未调用init方法，无法进行验签");
                return false;
            }
            
            // -------------------------------------
            // 获取报文中的待验签字段
            $orgSignMsg = $paramArray["Signature"];
            // $this->writeLog("in SecssUitl->verify 待验签名orgSignMsg=[" . $orgSignMsg . "]");
            if (empty($orgSignMsg)) {
                $this->writeLog("in SecssUitl->verify paramArray数组中签名字段为空。");
                $this->errCode = CP_SIGN_VALUE_NULL;
                // TODO
                return false;
            }
            unset($paramArray["Signature"]);
            // 根据key对数组升序排列
            ksort($paramArray);
            $verifySignData = $this->getSignStr($paramArray);
            // $this->writeLog("in SecssUitl->verify 待验签数据=[" . $verifySignData . "]");
            
            $charSet = mb_detect_encoding($verifySignData, array(
                "UTF-8",
                "GB2312",
                "GBK"
            ));
            // $this->writeLog("in SecssUitl->sign charSet=[" . $charSet . "]");
            $tempVerifySignData = mb_convert_encoding($verifySignData, "UTF-8", $charSet);
            $this->writeLog("in SecssUitl->verify  待验证签名数据 =[" . $tempVerifySignData . "]");
            
            $result = openssl_verify($tempVerifySignData, base64_decode($orgSignMsg), $this->CPPublicKey, $this->shaMethod);
            // $this->writeLog("in SecssUitl->verify result=[" . $result . "]");
            if ($result == 1) {
                $this->errCode = CP_SUCCESS;
            } else 
                if ($result == 0) {
                    $this->errCode = CP_VERIFY_FAILED;
                } else {
                    $this->errCode = CP_VERIFY_GOES_WRONG;
                }
            // $this->writeLog("in SecssUitl->verify 签名验证结果=[" . $this->errCode . "]");
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $this->errCode = CP_VERIFY_GOES_WRONG;
            $this->writeLog("in SecssUitl->verify  验证签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 签名 验证，商户传入原始报文数组，另外数组中需要增加待验证签名，数组key为：Signature。如下：<br/>
     * array("a"=>"1","b"=>"2","Signature"=>"待验证签名")
     *
     * @param
     *            $paramArray
     * @param
     *            $cpOpensslAlgo
     * @return boolean
     */
    public function verifyByAlgo($paramArray, $cpOpensslAlgo)
    {
        try {
            $this->shaMethod = $cpOpensslAlgo;
            return $this->verify($paramArray);
        } catch (Exception $e) {
            $this->errCode = CP_VERIFY_GOES_WRONG;
            $this->writeLog("in SecssUitl->verifyByAlgo  验证签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 获取私钥证书编号（商户私钥）
     */
    public function getSignCertId()
    {
        return $this->privatePFXCertId;
    }

    /**
     * 密码加密，RSA公钥加密（CP公钥）
     * 
     * @param unknown $pin            
     * @param unknown $card            
     * @return boolean
     */
    public function encryptPin($pin, $card)
    {
        try {
            $this->encPin = null;
            // $this->writeLog("in SecssUitl->encryptPin 密码加密.");
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->encryptPin 未调用init方法，无法进行加密");
                return false;
            }
            
            $pinBlock = $this->pin2PinBlockWithCardNO($pin, $card);
            // $this->writeLog("in SecssUitl->encryptPin PinBlock=[" . bin2hex($pinBlock) . "]");
            
            if (empty($pinBlock)) {
                $this->errCode = CP_ENCPIN_GOES_WRONG;
                $this->writeLog("in SecssUitl->encryptPin PIN加密异常,计算得到的PinBlock为空");
                return false;
            }
            // -----------------------------------------------
            $pk = openssl_pkey_get_public($this->CPPublicKey);
            $a = openssl_pkey_get_details($pk);
            $n = $a["rsa"]["n"];
            $e = $a["rsa"]["e"];
            $intN = $this->bin2int($n);
            $intE = $this->bin2int($e);
            $crypted = bcpowmod($this->bin2int($pinBlock), $intE, $intN);
            if (! $crypted) {
                $this->errCode = CP_ENCPIN_GOES_WRONG;
                $this->writeLog("in SecssUitl->encryptPin pin加密失败,errCode=[" . $this->errCode . "]");
                return false;
            }
            $rb = $this->bcdechex($crypted);
            $rb = $this->padstr($rb);
            $crypted = hex2bin($rb);
            
            $this->errCode = CP_SUCCESS;
            $this->encPin = base64_encode($crypted);
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
            // -----------------------------------------------
        } catch (Exception $e) {
            $this->errCode = CP_ENCPIN_GOES_WRONG;
            $this->writeLog("in SecssUitl->encryptPin PIN加密异常,message=" . $e->getMessage());
            return false;
        }
    }

    private function pin2PinBlockWithCardNO($aPin, $aCardNO)
    {
        $tPinByte = $this->pin2PinBlock($aPin);
        if (empty($tPinByte)) {
            return null;
        }
        if (strlen($aCardNO) == 11) {
            $aCardNO = "00" . $aCardNO;
        } else 
            if (strlen($aCardNO) == 12) {
                $aCardNO = "0" . $aCardNO;
            }
        $tPanByte = $this->formatPan($aCardNO);
        if (empty($tPanByte)) {
            return null;
        }
        $tByte = array();
        for ($i = 0; $i < 8; $i ++) {
            $tByte[$i] = $tPinByte[$i] ^ $tPanByte[$i];
        }
        $result = "";
        foreach ($tByte as $key => $value) {
            $result .= chr($value);
        }
        return $result;
    }

    private function formatPan($aPan)
    {
        $tPanLen = strlen($aPan);
        $tByte = array();
        $temp = $tPanLen - 13;
        try {
            $tByte[0] = 0;
            $tByte[1] = 0;
            for ($i = 2; $i < 8; $i ++) {
                $a = "\x" . substr($aPan, $temp, 2);
                $tByte[$i] = hexdec($a);
                $temp += 2;
            }
        } catch (Exception $e) {
            return null;
        }
        // $result="";
        // foreach ($tByte as $key => $value) {
        // $result.=chr($value);
        // }
        // return $result;
        return $tByte;
    }

    private function pin2PinBlock($aPin)
    {
        $tTemp = 1;
        $tPinLen = strlen($aPin);
        
        $tByte = array();
        try {
            $tByte[0] = $tPinLen;
            $i = 0;
            if ($tPinLen % 2 == 0) {
                for ($i = 0; $i < $tPinLen;) {
                    $a = hexdec("\x" . substr($aPin, $i, 2));
                    $tByte[$tTemp] = $a;
                    if (($i == $tPinLen - 2) && ($tTemp < 7)) {
                        for ($x = $tTemp + 1; $x < 8; $x ++) {
                            $tByte[$x] = - 1;
                        }
                    }
                    
                    $tTemp ++;
                    $i += 2;
                }
            } else {
                for ($i = 0; $i < $tPinLen - 1;) {
                    $a = hexdec("\x" . substr($aPin, $i, $i + 2));
                    $tByte[$tTemp] = $a;
                    if ($i == $tPinLen - 3) {
                        $b = hexdec("\x" . substr($aPin, $tPinLen - 1) . "F");
                        $tByte[($tTemp + 1)] = $b;
                        if ($tTemp + 1 < 7) {
                            for ($x = $tTemp + 2; $x < 8; $x ++) {
                                $tByte[$x] = - 1;
                            }
                        }
                    }
                    $tTemp ++;
                    $i += 2;
                }
            }
        } catch (Exception $e) {
            return null;
        }
        return $tByte;
    }

    /**
     * RSA数据加密（使用CP公钥进行加密）
     * 
     * @param unknown $data            
     * @return boolean          
     * @20180804_closed(data字符数大于117加密将报错)	 
     */
    public function encryptData_ForClose($data)
    {
        try {
            
            $this->encValue = null;
            // $this->writeLog("in SecssUitl->encryptData 待加密数据=[" . $data . "]");
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->encryptData 未调用init方法，无法进行加密");
                return false;
            }
            
            $charSet = mb_detect_encoding($data, array(
                "UTF-8",
                "GB2312",
                "GBK"
            ));
            // $this->writeLog("in SecssUitl->encryptData charSet=[" . $charSet . "]");
            $tmpData = mb_convert_encoding($data, "UTF-8", $charSet);
            // $this->writeLog("in SecssUitl->encryptData 待加密数据 =[" . $tmpData . "]");
            // -----------------------------------
            $pk = openssl_pkey_get_public($this->CPPublicKey);
            $a = openssl_pkey_get_details($pk);
            $n = $a["rsa"]["n"];
            $e = $a["rsa"]["e"];
            $intN = $this->bin2int($n);
            $intE = $this->bin2int($e);
            $crypted = bcpowmod($this->bin2int($tmpData), $intE, $intN);
            if (! $crypted) {
                $this->errCode = CP_ENCDATA_GOES_WRONG;
                $this->writeLog("in SecssUitl->encryptData 数据加密失败,errCode=[" . $this->errCode . "]");
                return false;
            }
            $rb = $this->bcdechex($crypted);
            $rb = $this->padstr($rb);
            $crypted = hex2bin($rb);
            
            $this->errCode = CP_SUCCESS;
            $this->encValue = base64_encode($crypted);
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
            // $this->writeLog("in SecssUitl->encryptData crypted===1=======[" . base64_encode($crypted) . "]\n");
        } catch (Exception $e) {
            $this->errCode = CP_ENCDATA_GOES_WRONG;
            $this->writeLog("in SecssUitl->encryptData 数据加密异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * g根据密文数据解密数据，采用RSA私钥进行解密（一般为商户私钥）
     * 
     * @param
     * $data
     * @return boolean
     */
    public function decryptData_ForClose($data)
    {
        try {
            $this->decValue = null;
            // $this->writeLog("in SecssUitl->decryptData 待解密数据=[" . $data . "]");
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->decryptData 未调用init方法，无法进行加密");
                return false;
            }
            $pkeyResource = openssl_pkey_get_private($this->MerPrivateKey['pkey']);
            // $pkeyDetail = openssl_pkey_get_details($pkeyResource);
            // $n = $pkeyDetail["rsa"]["n"];
            // $intN = $this->bin2int($n);
            
            // $e = $pkeyDetail["rsa"]["e"];
            // $intE = $this->bin2int($e);
            
            // $d = $pkeyDetail["rsa"]["d"];
            // $intD = $this->bin2int($d);
            
            // $p = $pkeyDetail["rsa"]["p"];
            // $intP = $this->bin2int($p);
            
            // $q = $pkeyDetail["rsa"]["q"];
            // $intQ = $this->bin2int($q);
            
            // $dmp1 = $pkeyDetail["rsa"]["dmp1"];
            // $intDP = $this->bin2int($dmp1);
            
            // $dmq1 = $pkeyDetail["rsa"]["dmq1"];
            // $intDQ = $this->bin2int($dmp1);
            
            // $iqmp = $pkeyDetail["rsa"]["iqmp"];
            // $intIQMP = $this->bin2int($iqmp);
            
            if (openssl_private_decrypt(base64_decode($data), $tmpDecValue, $pkeyResource, OPENSSL_NO_PADDING)) {
                $this->errCode = CP_SUCCESS;
            } else {
                $this->errCode = CP_DECDATA_GOES_WRONG;
            }
            // $this->writeLog("in SecssUitl->decryptData 数据解密hex结果,bin2hex=[" . bin2hex($this->decValue)."]");
            $this->decValue = $this->remove_padding($tmpDecValue);
            // $this->writeLog("in SecssUitl->decryptData 数据解密结果=[" . $this->errCode . "];decValue=[" . $this->decValue . "]");
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $this->errCode = CP_DECDATA_GOES_WRONG;
            $this->writeLog("in SecssUitl->decryptData 数据解密异常,message=" . $e->getMessage());
            return false;
        }
    }

    private function getSignStr($paramArray)
    {
        $result = "";
        $invalidFieldsArray = explode(',', $this->signInvalidFields);
        foreach ($paramArray as $key => $value) {
            // 去除不参与签名值
            if (in_array($key, $invalidFieldsArray)) {
                continue;
            }
            // TODO:CardTransData 有卡交易信息域
            // if(in_array($key, $encryptFieldMap)){
            // //需要进行数据加密
            // }
            $result = $result . $key . CP_KEY_VALUE_CONNECT . $value . CP_MESSAGE_CONNECT;
        }
        if (CP_MESSAGE_CONNECT === substr($result, - 1, 1)) {
            $result = substr($result, 0, strlen($result) - 1);
        }
        return $result;
    }

    /**
     * 返回签名信息数据
     *
     * @return String .
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * 返回加密密码信息
     *
     * @return String .
     */
    public function getEncPin()
    {
        return $this->encPin;
    }

    /**
     * 返回加密后的密文数据
     *
     * @return String .
     */
    public function getEncValue()
    {
        return $this->encValue;
    }

    /**
     * 返回解密后的明文数据
     *
     * @return String .
     */
    public function getDecValue()
    {
        return $this->decValue;
    }

    /**
     * 返回商户私钥pfx证书编号
     *
     * @return String .
     */
    public function getPrivatePFXCertId()
    {
        return $this->privatePFXCertId;
    }

    /**
     * 返回CP公钥CER证书编号
     *
     * @return String .
     */
    public function getPublicCERCertId()
    {
        return $this->publicCERCertId;
    }

    /**
     * 返回操作响应码
     *
     * @return String .
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * 返回错误响应信息
     *
     * @return String .
     */
    public function getErrMsg()
    {
        if (empty($this->errCode)) {
            // 未知错误
            $this->errMsg = self::$errMap[CP_UNKNOWN_WRONG];
        } else {
            $this->errMsg = self::$errMap[$this->errCode];
        }
        if (empty($this->errMsg)) {
            // 未知错误
            $this->errMsg = self::$errMap[CP_UNKNOWN_WRONG];
        }
        return $this->errMsg;
    }

    private function writeLog($log)
    {
        error_log($log . "\n", 0);
        // echo ($log . "\n");
    }

    /**
     * 将字符串转换为16进制字符串
     *
     * @param unknown $bindata            
     * @return string
     */
    private function bin2int($bindata)
    {
        $hexdata = bin2hex($bindata);
        return $this->bchexdec($hexdata);
    }

    /**
     * BC 16进制解码
     *
     * @param unknown $hexdata            
     * @return string
     */
    private function bchexdec($hexdata)
    {
        $ret = '0';
        $len = strlen($hexdata);
        for ($i = 0; $i < $len; $i ++) {
            $hex = substr($hexdata, $i, 1);
            $dec = hexdec($hex);
            $exp = $len - $i - 1;
            // bcpow此函数求一高精确度数字 x 的 y 次方
            $pow = bcpow('16', $exp);
            // bcmul此函数将二个高精确度的数字相乘，传入二个字符串，以左边的数字字符串 (left operand)
            // 乘以右边的 (right operand) 数字字符串。
            // 结果亦以字符串返回。scale 是一个可有可无的选项，表示返回值的小数点后所需的位数。
            $tmp = bcmul($dec, $pow);
            // bcadd此函数将二个高精确度的数字相加，传入二个字符串，结果亦以字符串返回。
            // scale 是一个可有可无的选项，表示返回值的小数点后所需的位数。
            $ret = bcadd($ret, $tmp);
        }
        return $ret;
    }

    private function padstr($src, $len = 256, $chr = '0', $d = 'L')
    {
        $ret = trim($src);
        $padlen = $len - strlen($ret);
        if ($padlen > 0) {
            $pad = str_repeat($chr, $padlen);
            if (strtoupper($d) == 'L') {
                $ret = $pad . $ret;
            } else {
                $ret = $ret . $pad;
            }
        }
        return $ret;
    }

    private function bcdechex($decdata)
    {
        $s = $decdata;
        $ret = '';
        while ($s != '0') {
            $m = bcmod($s, '16');
            $s = bcdiv($s, '16');
            $hex = dechex($m);
            $ret = $hex . $ret;
        }
        return $ret;
    }

    private function number_to_binary($number, $blocksize)
    
    {
        $base = "256";
        
        $result = "";
        
        $div = $number;
        
        while ($div > 0) 

        {
            
            $mod = bcmod($div, $base);
            
            $div = bcdiv($div, $base);
            
            $result = chr($mod) . $result;
        }
        
        return str_pad($result, $blocksize, "\x00", STR_PAD_LEFT);
    }

    private function binary_to_number($data)
    
    {
        $base = "256";
        $radix = "1";
        $result = "0";
        for ($i = strlen($data) - 1; $i >= 0; $i --) {
            $digit = ord($data{$i});
            $part_res = bcmul($digit, $radix);
            $result = bcadd($result, $part_res);
            $radix = bcmul($radix, $base);
        }
        return $result;
    }

    private function remove_padding($data)
    
    {
        // Remove the padding
        $offset = strrpos($data, "\x00", 1);
        return substr($data, $offset + 1);
    }

    /**
     * 商户签名函数，返回签名信息，如签名失败返回负值，待签名数据以字符串方式传送，
     * 如签名成功返回签名数据
     *
     * @param
     *            $signStr
     */
    private function signFromStr($signStr)
    {
        try {
            $this->sign = null;
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->signFromStr 未调用init方法，无法进行签名");
                return false;
            }
            
            if (empty($signStr)) {
                $this->errCode = CP_GET_SIGN_STRING_ERROR;
                $this->writeLog("in SecssUitl->signFromStr 获取待签名字符串失败");
                return false;
            }
            
            $sign_falg = openssl_sign($signStr, $signature, $this->MerPrivateKey['pkey'], $this->shaMethod);
            if (! $sign_falg) {
                $this->errCode = CP_SIGN_GOES_WRONG;
                return false;
            }
            // $this->writeLog("in SecssUitl->sign signature=" . bin2hex($signature));
            $base64Result = base64_encode($signature);
            // $this->writeLog("in SecssUitl->sign base64Result=" . $base64Result);
            $this->sign = $base64Result;
            $this->errCode = CP_SUCCESS;
            return true;
        } catch (Exception $e) {
            $this->errCode = CP_SIGN_GOES_WRONG;
            $this->writeLog("in SecssUitl->signFromStr 签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 签名 验证，商户传入原始报文数组，另外数组中需要增加待验证签名，数组key为：Signature。如下：<br/>
     * array("plainData"=>"","Signature"=>"待验证签名")
     *
     * @param
     *            $paramArray
     * @return boolean
     */
    private function verifyFromStr($paramArray)
    {
        try {
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->verifyFromStr 未调用init方法，无法进行验签");
                return false;
            }
            
            // -------------------------------------
            // 获取报文中的待验签字段
            $orgSignMsg = $paramArray["Signature"];
            // $this->writeLog("in SecssUitl->verifyFromStr 待验签名orgSignMsg=[" . $orgSignMsg . "]");
            if (empty($orgSignMsg)) {
                $this->writeLog("in SecssUitl->verifyFromStr paramArray数组中签名字段为空。");
                $this->errCode = CP_SIGN_VALUE_NULL;
                // TODO
                return false;
            }
            unset($paramArray["Signature"]);
            $verifySignData = $paramArray["plainData"];
            // $this->writeLog("in SecssUitl->verifyFromStr 待验签数据=[" . $verifySignData . "]");
            
            $result = openssl_verify($verifySignData, base64_decode($orgSignMsg), $this->CPPublicKey, $this->shaMethod);
            // $this->writeLog("in SecssUitl->verify result=[" . $result . "]");
            if ($result == 1) {
                $this->errCode = CP_SUCCESS;
            } else {
                if ($result == 0) {
                    $this->errCode = CP_VERIFY_FAILED;
                } else {
                    $this->errCode = CP_VERIFY_GOES_WRONG;
                }
            }
            // $this->writeLog("in SecssUitl->verify 签名验证结果=[" . $this->errCode . "]");
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $this->errCode = CP_VERIFY_GOES_WRONG;
            $this->writeLog("in SecssUitl->verifyFromStr 验证签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 对文件进行签名,换行不参与签名，签名数据将会加在文件最后一行，注意不要多次调用.
     *
     * @param
     *            filePath
     *            文件路径
     */
    public function signFile($filePath)
    {
        try {
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->signFile 未调用init方法，无法进行签名");
                return false;
            }
            $tempFilePath = mb_convert_encoding($filePath, "GBK", "auto");
            $this->signFileByAlgo($tempFilePath, CP_OPENSSL_ALGO_SHA512);
        } catch (Exception $e) {
            $this->errCode = CP_SIGN_GOES_WRONG;
            $this->writeLog("in SecssUitl->signFile 文件签名异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 对文件进行签名,换行不参与签名，签名数据将会加在文件最后一行，注意不要多次调用.
     *
     * @param
     *            tempFilePath
     *            文件路径
     * @param
     *            cpOpensslAlgo
     *            签名算法
     */
    public function signFileByAlgo($tempFilePath, $cpOpensslAlgo)
    {
        try {
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->signFileByAlgo 未调用init方法，无法进行签名");
                return false;
            }
            $filePath = mb_convert_encoding($tempFilePath, "GBK", "auto");
            if (! is_file($filePath)) {
                $this->errCode = CP_SIGN_GOES_WRONG;
                $this->writeLog("in SecssUitl->signFileByAlgo 文件不存在，无法进行签名.file=[" . $filePath . "]");
                return false;
            }
            $hashAlgo = "sha512";
            if (CP_OPENSSL_ALGO_SHA1 == $cpOpensslAlgo) {
                $hashAlgo = "sha1";
            } else 
                if (CP_OPENSSL_ALGO_SHA224 == $cpOpensslAlgo) {
                    $hashAlgo = "sha224";
                } else 
                    if (CP_OPENSSL_ALGO_SHA256 == $cpOpensslAlgo) {
                        $hashAlgo = "sha256";
                    } else 
                        if (CP_OPENSSL_ALGO_SHA384 == $cpOpensslAlgo) {
                            $hashAlgo = "sha384";
                        } else 
                            if (CP_OPENSSL_ALGO_SHA512 == $cpOpensslAlgo) {
                                $hashAlgo = "sha512";
                            }
            $ctx = hash_init($hashAlgo);
            // echo "start read file=".date('y-m-d h:i:s',time())."\r\n";
            $handle = fopen($filePath, "r");
            $max = filesize($filePath);
            $chunk = 4096;
            if ($max <= $chunk) {
                $endIndex = 0;
            } else {
                $endIndex = ($max % $chunk === 0 ? $max / $chunk : $max / $chunk + 1);
            }
            // 记录最后一次读取的字节数
            // 记录最后一次读取的字节数
            $endReadLength = $max % $chunk;
            $readData = "";
            // $srcData="";
            $ctx = hash_init($hashAlgo);
            for ($i = 0; $i <= $endIndex; $i ++) {
                if ($i == $endIndex) {
                    if ($endReadLength > 0) {
                        $readData = fread($handle, $endReadLength);
                    } else {
                        $readData = fread($handle, $chunk);
                    }
                } else {
                    $readData = fread($handle, $chunk);
                }
                $readData = str_replace(array(
                    "\r\n",
                    "\r",
                    "\n"
                ), "", $readData);
                // $srcData = $srcData.$readData;
                hash_update($ctx, $readData);
            }
            fclose($handle);
            // 清空缓存
            clearstatcache();
            // echo "end read file=".date('y-m-d h:i:s',time())."\r\n";
            $hashResult = hash_final($ctx);
            // echo "end hash file=".date('y-m-d h:i:s',time())."\r\n";
            // $this->writeLog("in SecssUitl->signFileByAlgo hashResult=[" . $hashResult . "]");
            // $base64Result = base64_encode(hex2bin($hashResult));
            // $this->writeLog("in SecssUitl->signFile base64Result=[".$base64Result."]");
            if ($this->signFromStr(hex2bin($hashResult))) {
                
                $data = "\r\n" . $this->getSign();
                if (file_put_contents($filePath, $data, FILE_APPEND) !== false) {
                    // 清空缓存
                    clearstatcache();
                    return true;
                } else {
                    $this->errCode = CP_SIGN_GOES_WRONG;
                    $this->writeLog("in SecssUitl->signFileByAlgo 写入签名数据至文件失败.file=[" . $filePath . "]");
                    // 清空缓存
                    clearstatcache();
                    return false;
                }
            } else {
                $this->errCode = CP_SIGN_GOES_WRONG;
                $this->writeLog("in SecssUitl->signFileByAlgo 文件签名失败.file=[" . $filePath . "]");
                // 清空缓存
                clearstatcache();
                return false;
            }
        } catch (Exception $e) {
            $this->errCode = CP_SIGN_GOES_WRONG;
            $this->writeLog("in SecssUitl->signFileByAlgo 文件签名异常,message=" . $e->getMessage());
            // 清空缓存
            clearstatcache();
            return false;
        }
    }

    /**
     * 验证文件签名,最后一行为base64的签名数据，换行符不参与签名.
     *
     * @param
     *            filePath
     *            文件路径
     */
    public function verifyFile($filePath)
    {
        try {
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->verifyFile 未调用init方法，无法进行签名");
                return false;
            }
            return $this->verifyFileByAlgo($filePath, CP_OPENSSL_ALGO_SHA512);
        } catch (Exception $e) {
            $this->errCode = CP_SIGN_GOES_WRONG;
            $this->writeLog("in SecssUitl->verifyFile 文件验签异常,message=" . $e->getMessage());
            return false;
        }
    }

    /**
     * 验证文件签名,最后一行为base64的签名数据，换行符不参与签名.
     *
     * @param
     *            tempFilePath
     *            文件路径
     * @param
     *            cpOpensslAlgo
     *            签名算法
     * @param
     *            encoding
     *            编码
     */
    public function verifyFileByAlgo($tempFilePath, $cpOpensslAlgo)
    {
        try {
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->verifyFileByAlgo 未调用init方法，无法进行签名");
                return false;
            }
            $filePath = mb_convert_encoding($tempFilePath, "GBK", "auto");
            if (! is_file($filePath)) {
                $this->errCode = CP_VERIFY_GOES_WRONG;
                $this->writeLog("in SecssUitl->verifyFileByAlgo 文件不存在，无法进行验签.file=[" . $filePath . "]");
                return false;
            }
            $hashAlgo = "sha512";
            if (CP_OPENSSL_ALGO_SHA1 == $cpOpensslAlgo) {
                $hashAlgo = "sha1";
            } else 
                if (CP_OPENSSL_ALGO_SHA224 == $cpOpensslAlgo) {
                    $hashAlgo = "sha224";
                } else 
                    if (CP_OPENSSL_ALGO_SHA256 == $cpOpensslAlgo) {
                        $hashAlgo = "sha256";
                    } else 
                        if (CP_OPENSSL_ALGO_SHA384 == $cpOpensslAlgo) {
                            $hashAlgo = "sha384";
                        } else 
                            if (CP_OPENSSL_ALGO_SHA512 == $cpOpensslAlgo) {
                                $hashAlgo = "sha512";
                            }
            $max = filesize($filePath);
            $handle = fopen($filePath, "r");
            // ---------------------读取文件最后一行签名
            $index = - 1;
            fseek($handle, $index, SEEK_END);
            $orgSignature = "";
            while (($c = fread($handle, 1)) !== false) {
                if ($c == "\n" || $c == "\r")
                    break;
                $orgSignature = $c . $orgSignature;
                $index = $index - 1;
                fseek($handle, $index, SEEK_END);
            }
            // 倒回文件的开头
            // echo "orgSignature=[" . $orgSignature . "]\r\n";
            // echo "strlenSignature=[" .strlen($orgSignature)."]\r\n";
            // echo "ftell=[" . ftell($handle) . "]\r\n";
            fclose($handle);
            // ---------------------------去除文件签名
            $handle = fopen($filePath, "a+");
            ftruncate($handle, $max - strlen($orgSignature));
            fclose($handle);
            // 清空缓存
            clearstatcache();
            // -------------------------
            $max = filesize($filePath);
            $handle = fopen($filePath, "r");
            $chunk = 4096;
            if ($max <= $chunk) {
                $endIndex = 0;
            } else {
                $endIndex = ($max % $chunk === 0 ? $max / $chunk : $max / $chunk + 1);
            }
            // 记录最后一次读取的字节数
            $endReadLength = $max % $chunk;
            $readData = "";
            $ctx = hash_init($hashAlgo);
            for ($i = 0; $i <= $endIndex; $i ++) {
                if ($i === $endIndex) {
                    if ($endReadLength > 0) {
                        $readData = fread($handle, $endReadLength);
                    } else {
                        $readData = fread($handle, $chunk);
                    }
                } else {
                    $readData = fread($handle, $chunk);
                }
                $readData = str_replace(array(
                    "\r\n",
                    "\r",
                    "\n"
                ), "", $readData);
                hash_update($ctx, $readData);
            }
            fclose($handle);
            // 清空缓存
            clearstatcache();
            $hashResult = hash_final($ctx);
            // $this->writeLog("in SecssUitl->verifyFileByAlgo hashResult=[" . $hashResult . "]");
            // $base64Result = base64_encode(hex2bin($hashResult));
            // $this->writeLog("in SecssUitl->verifyFileByAlgo base64Result=[".$base64Result."]");
            // "plainData"=>"","Signature"=>"待验证签名"
            $paramArray = array(
                "plainData" => hex2bin($hashResult),
                "Signature" => $orgSignature
            );
            $verifyResult = $this->verifyFromStr($paramArray);
            
            if (file_put_contents($filePath, $orgSignature, FILE_APPEND) !== false) {
                // 清空缓存
                clearstatcache();
                return $verifyResult;
            } else {
                $this->errCode = CP_VERIFY_FAILED;
                ;
                $this->writeLog("in SecssUitl->signFileByAlgo 写入原签名数据至文件失败.file=[" . $filePath . "]");
                // 清空缓存
                clearstatcache();
                return false;
            }
        } catch (Exception $e) {
            $this->errCode = CP_VERIFY_GOES_WRONG;
            $this->writeLog("in SecssUitl->verifyFileByAlgo 文件签名验证异常,message=" . $e->getMessage());
            // 清空缓存
            clearstatcache();
            return false;
        }
    }
	
	/*20170804
	*新加解密函数（解决大字段问题）
	*/
	public function encryptData($data)
    {
        try {
            
            $this->encValue = null;
            // $this->writeLog("in SecssUitl->encryptData 待加密数据=[" . $data . "]");
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->encryptData 未调用init方法，无法进行加密");
                return false;
            }

            $charSet = mb_detect_encoding($data, array(
                "UTF-8",
                "GB2312",
                "GBK"
            ));
            // $this->writeLog("in SecssUitl->encryptData charSet=[" . $charSet . "]");
            $tmpData = mb_convert_encoding($data, "UTF-8", $charSet);
            // $this->writeLog("in SecssUitl->encryptData 待加密数据 =[" . $tmpData . "]");
            // // -----------------------------------
            $pk = openssl_pkey_get_public($this->CPPublicKey);
            $crypted = ''; 
			$is_error = 0;
            if (is_numeric($this->cpPubBits) && $this->cpPubBits === 1024) {
                $split_length = 127;
                $pad_length = 128;
            }elseif (is_numeric($this->cpPubBits) && $this->cpPubBits === 2048) {
                $split_length = 255;
                $pad_length = 256;
            }
			//与JAVA解密要一致(每127个字符加密时进行补位，补到128个，补位方式为nopadding)
            foreach (str_split($tmpData, $split_length) as $chunk) {
                if(openssl_public_encrypt(str_pad($chunk, $pad_length, "\x00", STR_PAD_LEFT), $encryptData, $pk, OPENSSL_NO_PADDING)){
                	$crypted .= $encryptData;
				}else{
					$is_error = 1;
				}
            }

			if(!$is_error){
            	$this->errCode = CP_SUCCESS;
            	$this->encValue = base64_encode($crypted);
			}
			
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
            // $this->writeLog("in SecssUitl->encryptData crypted===1=======[" . base64_encode($crypted) . "]\n");
        } catch (Exception $e) {
            $this->errCode = CP_ENCDATA_GOES_WRONG;
            $this->writeLog("in SecssUitl->encryptData 数据加密异常,message=" . $e->getMessage());
            return false;
        }
    }
	public function decryptData($data)
    {
        try {
            $this->decValue = null;
            // $this->writeLog("in SecssUitl->decryptData 待解密数据=[" . $data . "]");
            if (! $this->initFalg) {
                $this->errCode = CP_NO_INIT;
                $this->writeLog("in SecssUitl->decryptData 未调用init方法，无法进行加密");
                return false;
            }
            $pkeyResource = openssl_pkey_get_private($this->MerPrivateKey['pkey']);
			$crypto = '';
			$is_error = 0;
			$bytes = array();
            if (is_numeric($this->cpPubBits) && $this->cpPubBits === 1024) {
                $split_length = 128;
            }elseif (is_numeric($this->cpPubBits) && $this->cpPubBits === 2048) {
                $split_length = 256;
            }
			foreach(str_split(base64_decode($data), $split_length) as $chunk) {
				if(openssl_private_decrypt($chunk, $tmpDecValue, $pkeyResource,OPENSSL_NO_PADDING)){
                    $bytes[] = $this->getBytes($tmpDecValue);//字符串转为字节数组
				}else{
					$is_error = 1;
				}
			}
            $crypto = $this->toStr($bytes);//字节数组转为字符串
			if(!$is_error){
                $this->errCode = CP_SUCCESS;
            } else {
                $this->errCode = CP_DECDATA_GOES_WRONG;
            }
            $this->decValue = $crypto;
            if ($this->errCode === CP_SUCCESS) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $this->errCode = CP_DECDATA_GOES_WRONG;
            $this->writeLog("in SecssUitl->decryptData 数据解密异常,message=" . $e->getMessage());
            return false;
        }
    }
    public  function getBytes($string) {
	    $flag = false;
        $bytes = array();
        for($i = 0; $i < strlen($string); $i++){
            if (ord($string[$i]) === 0 && !$flag) {
                continue;
            }else{
                $bytes[] = ord($string[$i]);
                $flag = true;
            }
        }
        return $bytes;
    }
    public  function toStr($bytes) {
        $str = '';
        foreach($bytes as $key=>$ch) {
            foreach ($ch as $k=>$v) {
                $str .= chr($v);
            }
        }

        return $str;
    }
}
?>
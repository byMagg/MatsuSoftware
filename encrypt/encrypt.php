<?php
class Enigma {

    private static $Key = "CLAVESUPERSECRETA";

    public static function encrypt ($string) {
        return base64_encode(openssl_encrypt(MCRYPT_RIJNDAEL_256, md5(Enigma::$Key), $string, MCRYPT_MODE_CBC, md5(md5(Enigma::$Key))));
    }

    public static function decrypt ($string) {
        return rtrim(openssl_decrypt(MCRYPT_RIJNDAEL_256, md5(Enigma::$Key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5(Enigma::$Key))), "\0");
    }
}
?>
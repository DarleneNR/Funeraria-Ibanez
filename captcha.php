<?php

class Captcha
{
    protected $secretKey = '0x705DdDA07EC926A71fb1a75817Cc77006344a4d8';
    protected $captchaVerificationEndpoint = 'https://hcaptcha.com/siteverify';
    
    public function checkCaptcha ($response)
    {
        $responseData = json_decode($this->verifyCaptcha([
            'secret' => $this->secretKey,
            'response' => $response
        ]));

        return $responseData->success;
    }

    protected function verifyCaptcha($data)
    {
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, $this->captchaVerificationEndpoint);
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($verify);
    }
}

?>
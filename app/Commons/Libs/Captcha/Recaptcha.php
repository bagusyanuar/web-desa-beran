<?php

namespace App\Commons\Libs\Captcha;

use Illuminate\Support\Facades\Http;

class Recaptcha
{
    public static function validate($token): array
    {
        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => env('CAPTCHA_SECRET_KEY'),
                'response' => $token,
                'remoteip' => request()->ip(),
            ]);
            if (!$response->successful()) {
                return [
                    'success' => false,
                    'message' => 'invalid captcha'
                ];
            }
            return [
                'success' => true,
                'message' => 'successfully validate captcha'
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'messsage' => $e->getMessage()
            ];
        }
    }
}

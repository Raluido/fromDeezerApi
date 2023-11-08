<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Session\Session;
use Mockery\Undefined;

class LoginController extends Controller
{
    function authenticate(Request $request)
    {
        $app_id = "644881";
        $app_secret = "f81c9f6a9ba2783b7dd5d52c6f8e9727";
        $app_uri = "http://hitthehits.com.devel/logued/";

        if (isset($_REQUEST["code"])) {
            $code = $_REQUEST["code"];
        } else {
            $sessionState = md5(uniqid(rand(), TRUE));
            session(['state' => $sessionState]);
            session()->save();

            $dialog_url = "https://connect.deezer.com/oauth/auth.php?app_id=" . $app_id
                . "&redirect_uri=" . urlencode($app_uri) . "&perms=email,offline_access"
                . "&state=" . session('state');

            header("Location: " . $dialog_url);
            exit;
        }

        if ($_REQUEST['state'] == session('state')) {
            $token_url = "https://connect.deezer.com/oauth/access_token.php?app_id="
                . $app_id . "&secret="
                . $app_secret . "&code=" . $code;

            $response  = file_get_contents($token_url);
            $params    = null;
            parse_str($response, $params);
            $api_url   = "https://api.deezer.com/user/me?access_token="
                . $params['access_token'];

            session(['access_token' => $params['access_token']]);
            session()->save();

            $user = json_decode(file_get_contents($api_url));

            return view('index', ['name' => $user->name, 'token' => session('access_token')]);
        } else {
            echo ("The state does not match. You may be a victim of CSRF.");
        }
    }
}

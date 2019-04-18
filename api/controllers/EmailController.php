<?php
class EmailController extends Api
{
    /**
     * Check email action
     * @return Api::response
     */
    public static function check() {
        $email = trim($_POST['email']);
        $res = self::checkEmail($email);
        return self::response($res);
    }

    /**
     * @param string $email
     * @return object
     */
    public static function checkEmail($email) {
        $res = (object)[];
        $err = null;

        if( !$email || !is_string($email) || ( is_string($email) && strlen($email) < 1 ) ){
            $err = 'EMAIL_REQUIRED';
        } else if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $err = 'EMAIL_BAD';
        }

        if($err) {
            $res->err = $err;
        } else {
            $res->validation = true;
        }

        return $res;
    }
}

<?php
namespace Database {
    use Data;
    use Database;

    class Session
    {
        private static $session = null;
        private $userdata = null;
        private $settings = null;
        private $key = null;
        private function __construct()
        {
            A_Include("php/data/user.php");
            if ($_COOKIE["session"] != null || $this->key != null) {
                $this->key = $_COOKIE["session"];
                $userid = Database\Connection::execSelect("SELECT * FROM `Sessions` WHERE `Key` = ?", "s", [$this->key]);
                if (count($userid) > 0) {
                    $userid = $userid[0]["UserID"];
                } else {
                    echo "Session expired";
                    setcookie("session", "", -1);
                    return;
                }

                $this->userdata = Data\User::GetFromid($userid);
                $this->settings = Data\Settings::Get($userid);
            }
        }

        public static function Begin()
        {
            if (self::$session == null) {
                self::$session = new Session();
            }
        }
        public static function generateRandomString($length = 10)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        public static function Login($user_id)
        {
            $session_key = self::generateRandomString(64);
            Database\Connection::execOperation("INSERT INTO `Sessions` (`Key`, `UserID`) VALUES (?, ?) ", "si", [$session_key, $user_id]);
            setcookie("session", $session_key, strtotime("2038-01-19 03:14:07"));
        }
        public static function LoggedIn()
        {
            if (self::$session->userdata == null) {
                return false;
            } else {
                return true;
            }
        }
        public static function UserData()
        {
            if (self::$session->userdata == null) {
                return null;
            }
            return self::$session->userdata;
        }
    }
}
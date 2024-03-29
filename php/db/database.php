<?php
namespace Database {
use mysqli;

use Database;
    class Connection
    {
        private static $db;
        private $connection;

        private function __construct()
        {
            $this->connection = new mysqli(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
            $this->connection->set_charset("utf8mb4"); // to fix emojis in comments
        }

        public static function getConnection()
        {
            if (self::$db == null) {
                self::$db = new Connection();
            }
            return self::$db->connection;
        }

        /**
         * @param string $strQuery
         * @param string $strTypes
         * @param array $colVariables
         * 
         * @return array
         */
        public static function execSelect($strQuery, $strTypes, $colVariables, $cacheKey = "", $cacheLength = 0)
        {
            $cache = false;
            if($cacheKey != "") $cache = true;
            if($cache == true) {
                $resp = Database\Memcache::getConnection()->get($cacheKey);
                if($resp != false) return json_decode($resp, true);
            }
            $mysql = self::getConnection();
            $stmt = $mysql->prepare($strQuery);
            $stmt->bind_param($strTypes, ...$colVariables);
            $stmt->execute();
            $meta = $stmt->result_metadata();

            while ($field = $meta->fetch_field())
                $params[] = &$row[$field->name];
            $stmt->bind_result(...$params);
            while ($stmt->fetch()) {
                foreach ($row as $key => $val) {
                    $c[$key] = $val;
                }
                $hits[] = $c;
            }
            if ($mysql->more_results()) {
                $mysql->next_result();
            }
            if (isset($hits)) {
                if ($cache == true) {
                    Database\Memcache::getConnection()->set($cacheKey, json_encode($hits), $cacheLength);
                }
                return $hits;
            } else {
                return [];
            }
        }

        /**
         * @param string $strQuery
         * 
         * @return array
         */
        public static function execSimpleSelect($strQuery, $cacheKey = "", $cacheLength = 0)
        {
            $cache = false;
            if($cacheKey != "") $cache = true;
            if($cache == true) {
                $resp = Database\Memcache::getConnection()->get($cacheKey);
                if($resp != false) return json_decode($resp, true);
            }
            $oQuery = self::getConnection()->query($strQuery);
            while ($val = $oQuery->fetch_assoc()) {
                $hits[] = $val;
            }
            if ($cache == true) {
                Database\Memcache::getConnection()->set($cacheKey, json_encode($hits), $cacheLength);
            }
            return $hits;
        }

        /**
         * @param string $strQuery
         * @param string $strTypes
         * @param array $colVariables
         * 
         * @return void
         */
        public static function execOperation($strQuery, $strTypes, $colVariables): void
        {
            $mysql = self::getConnection();
            $stmt = $mysql->prepare($strQuery);
            $stmt->bind_param($strTypes, ...$colVariables);
            $stmt->execute();
        }
    }
}
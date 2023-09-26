<?php

namespace Core\Logger\Traits;


trait HasLogType {
    /**
     * @desc simple log config
     * @method
     * @private
     * @name {simple}
     * @return {array}
     */    
    private function simple(): array {
        return [
            "type" => "SIMPLE",
            "method" => $_SERVER["REQUEST_METHOD"],
            "code" => http_response_code(),
            "url" => $_SERVER["REQUEST_URI"],
        ];
    }

    /**
     * @desc dev log config
     * @method
     * @private
     * @name {dev}
     * @return {array}
     */       
    private function dev(): array {
        return [
            "type" => "DEV",
            "time" => date("H:i:s A"),
            "ip" => $_SERVER["REMOTE_ADDR"],
            "protocol" => $_SERVER["SERVER_PROTOCOL"],
            "method" => $_SERVER["REQUEST_METHOD"],
            "code" => http_response_code(),
            "url" => $_SERVER["REQUEST_URI"],
        ];
    }

    /**
     * @desc combined log config
     * @method
     * @private
     * @name {combined}
     * @return {array}
     */     
    private function combined(): array {
        return [
            "type" => "COMBINED",
            "date" => date("Y-m-d"),
            "time" => date("H:i:s A"),
            "ip" => $_SERVER["REMOTE_ADDR"],
            "protocol" => $_SERVER["SERVER_PROTOCOL"],
            "host" => $_SERVER["HTTP_HOST"],
            "method" => $_SERVER["REQUEST_METHOD"],
            "code" => http_response_code(),
            "url" => $_SERVER["REQUEST_URI"],
            "device" => $_SERVER["HTTP_USER_AGENT"],
        ];
    }
}
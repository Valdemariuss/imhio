<?php
class Api
{
    /**
     * @param object $data
     */
    public static function response($data) {
        echo json_encode($data);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 15.12.2017
 * Time: 15:10
 */

namespace services;


class EmailService
{
    public static function passwordReset()
    {
        $mail = self::createEmail();
    }
    private static function createEmail()
    {
        return json_decode('{
          "personalizations": [
            {
              "to": [
                {
                  "email": "email"
                }
              ]
            }
          ],
          "from": {
            "email": "noreply@savvy.ch",
            "name": "savvy"
          },
          "subject": "subject",
          "content": [
            {
              "type": "text/html",
              "value": "value"
            }
          ]
        }');
    }
}
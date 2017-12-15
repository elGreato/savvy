<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 15.12.2017
 * Time: 15:10
 */

namespace services;
use domain\Student;
use config\Config;
use services\StudentServiceImpl;

class EmailService
{
    public static function passwordReset(Student $student)
    {
        $token = StudentServiceImpl::getInstance()->issueToken(StudentServiceImpl::RESET_TOKEN, $_POST["email"]);
        $mail = self::createEmail();
        $mail->personalizations[0]->to[0]->email = $student->getEmail();
        $mail->content[0]->value = "<p>Dear" . $student->getUsername()."</p><br><p>Click this link to get your new password: </p><br><p>".$GLOBALS["ROOT_URL"] . "/password/reset?token=" . $token."</p>";
        $options = ["http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/json",
                "Authorization: Bearer ".Config::emailConfig().""],
            "content" => json_encode($mail)
        ]];
        $context = stream_context_create($options);
        //$response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if(strpos($http_response_header[0],"202"))
            return true;
        return false;
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
            "email": "noreply@fhnw.ch",
            "name": "WE-CRM"
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
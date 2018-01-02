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
        $mail->content[0]->value = "<p>Dear savvy user</p><br><p>Click this link to get your new password: </p><br><a href='".$_SERVER['HTTP_HOST'].$GLOBALS["ROOT_URL"] . "/passwordreset/reset?token=" . $token."'>Reset link</a>";
        $options = ["http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/json",
                "Authorization: Bearer ".Config::emailConfig().""],
            "content" => json_encode($mail)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if(strpos($http_response_header[0],"202"))
            return true;
        return false;

    }
    public static function contactUs()
    {
        $mail = self::createEmail();
        $mail->personalizations[0]->to[0]->email = "savvymail@protonmail.ch";
        $mail->content[0]->value = "<p>Dear admin</p><br><p>Request from a savvy user: </p><br><p>".$_POST["message"]."</p><br><p>Contact Details: </p><br><br><p>Contact Details: </p><br><p>Name: ".$_POST["name"]."</p><br><p>Email: ".$_POST["email"]."</p>";
        $mail->subject = "Savvy - Request";
        $options = ["http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/json",
                "Authorization: Bearer ".Config::emailConfig().""],
            "content" => json_encode($mail)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
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
            "email": "noreply@savvy.ch",
            "name": "Savvy"
          },
          "subject": "Savvy - Password reset",
          "content": [
            {
              "type": "text/html",
              "value": "value"
            }
          ]
        }');
    }
}
<?php


namespace App\Services\Mail;


use App\Services\ConfigReader;
use app\Services\Mail\PhpMailer\Exception;
use app\Services\Mail\PhpMailer\PHPMailer;
use JetBrains\PhpStorm\NoReturn;

class Mail
{

    private static object $phpMailer;

    private static array  $mailConfigArray = [];

    private static string $mainConfigName = "main";

    /**
     * @param array $mailConfig
     */

    /**
     * @param string $targetMail
     * @param string $subject
     * @param string $body
     * @param string $mailConfig
     * @param array $attachment
     */

    /**
     * @param string $targetMail
     * @param string $subject
     * @param string $body
     * @param array $attachments
     * @return false
     */
    public static function sendMail(string $targetMail,string $subject, string $body , array $attachments=[]): bool
    {

        static::makePhpMailerObject();

        if (static::initializeMail(static::$mainConfigName))
        {
            if (count($attachments) > 0) 
            {
                static::attachToEmail($attachments);
            }

            static::$phpMailer->addAddress($targetMail);

            static::$phpMailer->Subject=$subject;

            static::$phpMailer->Body=$body;

            return static::send();
        }
        
        return false;
    }

    /**
     * @param string $mailConfig
     * @return mixed
     */
    
    private static function initializeMail( string $mailConfig): mixed
    {

        
        if (static::getMailConfig($mailConfig))
        
        {
            $config = static::getMailConfig($mailConfig);

            static::$phpMailer->isSMTP($config["isSmtp"]);

            static::$phpMailer->Host=$config["host"];

            static::$phpMailer->SMTPAuth=$config["smtpAuth"];

            static::$phpMailer->Username=$config["username"];

            static::$phpMailer->Password=$config["password"];

            static::$phpMailer->SMTPSecure=$config["smtpSecure"];

            static::$phpMailer->Port=$config["port"];

            static::$phpMailer->CharSet=$config["charset"];

            static::$phpMailer->FromName=$config["fromName"];

            static::$phpMailer->From=$config["from"];

            static::$phpMailer->ContentType=$config["contentType"];

            static::$phpMailer->isHTML($config["isHtml"]);

            static::$phpMailer->addReplyTo($config["replyTo"]);

            return true;

        }
            return false;
    }

    /**
     * @param string $mailConfig
     * @return mixed
     */
    
    private static function getMailConfig(string $mailConfig): mixed
    {
        if (count(static::$mailConfigArray) < 1)
        {
            static::$mailConfigArray = ConfigReader::getConfig("mail");
        }

        if (array_key_exists($mailConfig,static::$mailConfigArray)){

            return static::$mailConfigArray[$mailConfig];
            
        }
        
        return false;
    }

    /**
     * @param array $attachments
     */
    
    private static function attachToEmail(array $attachments)
    {
        foreach ($attachments as $attachment){
            
            static::$phpMailer->addAttachment($attachment);
            
        }
    }

    /**
     * @return bool
     */
    private static function send(): bool
    {
        try {


            static::$phpMailer->send();

            return true;

        }catch (Exception $exception)
        {

            return false;
        }
    }

    private static function makePhpMailerObject()
    {
        if (!isset(static::$phpMailer)){

            static::$phpMailer = new PHPMailer(true);
        }

    }

    /**
     * @param string $name
     */

    public static function setMailConfigName(string $name)
    {
        static::$mainConfigName = $name;
    }


    /**
     * @param array $customConfig
     */

    public static function setCustomMailConfig(array $customConfig)
    {
        if (count(static::$mailConfigArray) < 1)
        {
            static::$mailConfigArray = ConfigReader::getConfig("mail");
        }

        array_walk($customConfig,function ($value,$key){

           static::$mailConfigArray[static::$mainConfigName][$key] = $value;

        });

    }
}
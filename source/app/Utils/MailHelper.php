<?php
namespace App\Utils;
use Mail;
/**
 * provides methods for sending mails asynchronously and synchronously
 */
class MailHelper
{
  /**
   * Call this method to get singleton
   *
   * @return MailHelper
   */
  public static function getInstance()
  {
      static $inst = null;
      if ($inst === null) {
          $inst = new MailHelper();
      }
      return $inst;
  }

    /**
     * Private ctor so nobody else can instance it
     *
     */
    private function __construct()
    {

    }


    public function sendMailAsync()
    {
        //TODO
    }

    public function sendMail($from,$to,$senderName,$subject,$mailTemplate,$templateVariablesArray,$attachedFile)
    {
        Mail::send($mailTemplate,$templateVariablesArray, function ($mail) use ($to,$from, $senderName, $subject,$attachedFile) {
            $mail->from($from, $senderName)
                    ->to($to)
                    ->subject($subject)
                    ->attach($attachedFile);
        });
    }
}

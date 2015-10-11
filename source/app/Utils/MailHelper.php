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
    private function __construct() {}

    public function getMyEmailAddress() {
        return "splatensehh@gmail.com";
    }

    public function sendMailAsync()
    {
        //TODO
    }

    public function sendMail($from,$to,$senderName,$subject,$mailTemplate,$templateVariablesArray,$attachedFile,$logicalName)
    {
        Mail::send($mailTemplate,$templateVariablesArray, function ($mail) use ($to,$from, $senderName, $subject,$attachedFile,$logicalName) {
            $mail->from($from, $senderName)
                    ->to($to)
                    ->subject($subject);
            if($attachedFile != null && $logicalName != null)
            {
                $mail->attach($attachedFile,['as'=>$logicalName]);
            }

        });
    }

    public function queueMail($from,$to,$senderName,$subject,$mailTemplate,$templateVariablesArray,$attachedFile,$logicalName)
    {
        Mail::queue($mailTemplate,$templateVariablesArray, function ($mail) use ($to,$from, $senderName, $subject,$attachedFile,$logicalName) {
            $mail->from($from, $senderName)
                    ->to($to)
                    ->subject($subject);
            if($attachedFile != null && $logicalName != null)
            {
                $mail->attach($attachedFile,['as'=>$logicalName]);
            }

        },"mails");
    }
}

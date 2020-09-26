<?php

namespace BasicFormApp\Mail;

use BasicFormApp\Models\Enquiry;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class NewEnquiryMail
{
    protected $subject = 'New customer enquiry';

    /**
     * @param Enquiry $enquiry
     * @return bool
     */
    public function sendMail(Enquiry $enquiry)
    {
        $mail = new PHPMailer(true);
        try {
            $this->setMailServerSettings($mail);
            //Recipients
            $mail->setFrom(getenv('MAIL_USERNAME'), getenv('MAIL_SENDER_OF_CONTACT_FORM'));
            //$mail->addAddress('joe@example.net', 'Joe User');// Add a recipient
            $mail->addAddress(getenv('MAIL_RECEIVER_OF_CONTACT_FORM'));// Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');// Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');// Optional name

            // Content
            $mail->isHTML(true);// Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body = $this->getBody($enquiry);
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param PHPMailer $mail
     */
    private function setMailServerSettings(PHPMailer $mail)
    {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
        $mail->isSMTP();// Send using SMTP
        $mail->Host = getenv('SMTP_HOSTNAME');// Set the SMTP server to send through
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->Username = getenv('MAIL_USERNAME');// SMTP username
        $mail->Password = getenv('MAIL_PASSWORD');// SMTP password
        $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = getenv('SMTP_PORT');// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    }

    /**
     * @param Enquiry $enquiry
     * @return string
     */
    private function getBody(Enquiry $enquiry)
    {
        $orderNumber = $enquiry->getOrderNumber();
        $orderNumber = empty($orderNumber) ? '' : '<strong> | Order Number : </strong>' . $orderNumber;

        return '<body style="background-image: linear-gradient(110deg, #d57eeb 0%, #fccb90 100%); color:#2c0020;">
<div style="padding:20px;"><h2 style="padding-left:40px;">Hey, we have new customer enquiry !</h2>
<p style="padding-left:40px; font-size:18px;">Here are the details of the contact form</p>
<ul style="list-style: none; line-height: 32px; border-top:1px solid #2c0020; border-bottom: 1px solid #2c0020;">
<li><strong>Customer Name :</strong>' . $enquiry->getName() . '</li>
<li><strong>Enquiry Type :</strong>' . $enquiry->getEnquiryTypeReadable() . $orderNumber . '</li>
<li><strong>Customer Email :</strong>' . $enquiry->getEmail() . '</li>
<li><strong>Customer Message :</strong>' . $enquiry->getMessage() . '</li>
</ul><p style="padding-left:40px; font-size:14px;">Wish you great day :)</p></div></body>';
    }
}

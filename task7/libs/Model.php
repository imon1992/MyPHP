<?php 

class Model
{
    protected $replaceArr =[];
   public function __construct()
   {
        $this->setDefaultValues();
        $this->replaceArr['%SUCCESSFUL_SENT%'] = '';
   }
   	
	public function getArray()
   {
       return $this->replaceArr;
   }
    public function setDefaultValues()
    {
        $this->replaceArr['%RIGHT_EMAIL%'] = '';
        $this->replaceArr['%RIGHT_FULL_NAME%'] ='';
        $this->replaceArr['%RIGHT_MESSAGE%'] = '';
        $this->replaceArr['%FULL_NAME_ERROR%'] = '';
        $this->replaceArr['%EMPTY_STRING_ERROR%'] = '';
        $this->replaceArr['%WRONG_FULL_NAME%'] = '';
        $this->replaceArr['%SUBJECT_ERROR%'] = '';
        $this->replaceArr['%WRONG_EMAIL%']='';
        $this->replaceArr['%EMAIL_ERROR%'] = '';
        $this->replaceArr['%WRONG_MESSAGE%'] = '';
        $this->replaceArr['%MESSAGE_EMPTY%'] = '';
        $this->replaceArr['%ERROR_COLOR%'] = '';
        $this->replaceArr['%SELECTED_SUBJECT1%'] = '';
        $this->replaceArr['%SELECTED_SUBJECT2%'] = '';
        $this->replaceArr['%SELECTED_SUBJECT3%'] = '';
        $this->replaceArr['%SUCCESSFUL_SENT%'] = 'Message successfully sent';
    }
	
	public function checkForm()
	{
        $formResult = 0;
        if(!empty($_POST['email']))
        {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->replaceArr['%WRONG_EMAIL%']='field error';
                $this->replaceArr['%EMAIL_ERROR%'] = '';
                $this->replaceArr['%RIGHT_EMAIL%'] = '';
                $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';

            }else
            {
                $this->replaceArr['%RIGHT_EMAIL%'] = $_POST['email'];
                $this->replaceArr['%EMAIL_ERROR%'] = '';
                $this->replaceArr['%WRONG_EMAIL%'] = '';
                $formResult++;
            }
        }else
        {
            $this->replaceArr['%EMAIL_ERROR%'] = 'Empty field';
            $this->replaceArr['%WRONG_EMAIL%'] = '';
            $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
            $this->replaceArr['%RIGHT_EMAIL%'] = '';
        }

        if(!empty($_POST['fullName']))
        {
            if(!(trim($_POST['fullName']) == ''))
            {
                if((strip_tags($_POST['fullName']) == $_POST['fullName']) &&
                    !ctype_digit($_POST['fullName']))
                {
                    $this->replaceArr['%RIGHT_FULL_NAME%'] = trim($_POST['fullName']);
                    $this->replaceArr['%WRONG_FULL_NAME%'] = '';
                    $this->replaceArr['%EMPTY_STRING_ERROR%'] = '';
                    $formResult++;

                }else
                {
                    $this->replaceArr['%WRONG_FULL_NAME%'] = 'ne verna9 stroka';
                    $this->replaceArr['%EMPTY_STRING_ERROR%'] = '';
                    $this->replaceArr['%RIGHT_FULL_NAME%'] = '';
                    $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
                }
            }
            else
            {
                $this->replaceArr['%EMPTY_STRING_ERROR%'] = 'empty string';
                $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
                $this->replaceArr['%RIGHT_FULL_NAME%'] = '';
            }
        }else{
            $this->replaceArr['%EMPTY_STRING_ERROR%'] = 'empty string';
            $this->replaceArr['%WRONG_FULL_NAME%'] = '';
            $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
            $this->replaceArr['%RIGHT_FULL_NAME%'] = '';
        }

        if(!empty($_POST['subject']) && ($_POST['subject'] != 'Select Subject'))
        {
            if($_POST['subject'] == 'subject 1')
            {
                $this->replaceArr['%SELECTED_SUBJECT1%']='selected';
                $this->replaceArr['%SELECTED_SUBJECT2%']='';
                $this->replaceArr['%SELECTED_SUBJECT3%']='';
            }
            if($_POST['subject'] == 'subject 2')
            {
                $this->replaceArr['%SELECTED_SUBJECT2%']='selected';
                $this->replaceArr['%SELECTED_SUBJECT1%']='';
                $this->replaceArr['%SELECTED_SUBJECT3%']='';
            }
            if($_POST['subject'] == 'subject 3')
            {
                $this->replaceArr['%SELECTED_SUBJECT3%']='selected';
                $this->replaceArr['%SELECTED_SUBJECT2%']='';
                $this->replaceArr['%SELECTED_SUBJECT1%']='';
            }

            $this->replaceArr['%TRUE_SUBJECT%'] = $_POST['subject'];
            $this->replaceArr['%SUBJECT_ERROR%'] = '';
            $formResult++;
        }else
        {
            $this->replaceArr['%SUBJECT_ERROR%'] = 'select drgu0 subject';
            $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
        }

        if(!empty($_POST['message']))
        {
            if(!(trim($_POST['message']) == ''))
            {
                if(strip_tags($_POST['message']) == $_POST['message'])
                {
                    $this->replaceArr['%RIGHT_MESSAGE%'] = trim($_POST['message']);
                    $this->replaceArr['%WRONG_MESSAGE%'] = '';
                    $this->replaceArr['%MESSAGE_EMPTY%'] = '';
                    $formResult++;

                }else
                {
                    $this->replaceArr['%WRONG_MESSAGE%'] = 'ne verna9 stroka soobsheni9';
                    $this->replaceArr['%MESSAGE_EMPTY%'] = '';
                    $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
                    $this->replaceArr['%RIGHT_MESSAGE%'] = '';
                }
            }

        }else
        {
            $this->replaceArr['%MESSAGE_EMPTY%'] = 'message empty';
            $this->replaceArr['%WRONG_MESSAGE%'] = '';
            $this->replaceArr['%ERROR_COLOR%'] = 'errorColor';
            $this->replaceArr['%RIGHT_MESSAGE%'] = '';
        }

        if($formResult == 4){
            return true;
        }else
        {
            return false;
        }
	}
   
	public function sendEmail()
	{
        $to = 'vpavlov@geeksforless.net';
        $subject = $_POST['subject'];
        $messageText = wordwrap($_POST['message'], 70, "\r\n");


        $headers = 'From: '.$_POST['email'] . "\r\n" .
            'Reply-To: '.$_POST['email'] . "\r\n" .
            'MIME-Version: 1.0' . "\r\n".
            'Content-type: text/html; charset=utf-8' . "\r\n";

        $message = '<html>
                    <body>
                      <p>From:'.$_POST['fullName'] .' </p>
                      <p>Message sent at:' . date('l jS \of F Y h:i:s A') .'</p>
                      <p>From Ip:'.$_SERVER['REMOTE_ADDR'].' </p>
                      <p>Reply-to:'.'<a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a>' .' </p>
                      <p>' . $messageText .'</p>
                    </body>
                    </html>
                    ';

        $mailResult = mail($to,$subject,$message,$headers);
        return $mailResult;

	}		
}

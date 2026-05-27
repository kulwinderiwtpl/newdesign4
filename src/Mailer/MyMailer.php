<?php

/* 
 * Emailer Class used to send All Emails
 */

namespace App\Mailer;

// use Cake\Mailer\Mailer;
// use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
// use App\Model;

class MyMailer extends \Cake\Mailer\Mailer
{
    private $template;
    function MyMailer() {
        // echo "got here";die;
    //    print "In SubClass constructor\n";
        // return new MyMailer();
    }
    private function getEmailBody($template_key,$variables){
        //$this->loadModel('EmailTemplates');
        // echo "in get template";
        $emailTemplates = TableRegistry::get('EmailTemplates');
        $this->template = $emailTemplates->find()
            ->where([
                'EmailTemplates.template_key' => $template_key
            ])
            ->first();
        $r = $this->getReplacements($variables);
        // print_r($r);
        $this->template->email_text = str_replace($r['search'],$r['replace'],$this->template->email_text);
        $this->template->subject = str_replace($r['search'],$r['replace'],$this->template->subject);
 //       die($_SERVER['HTTP_HOST']);
        if($_SERVER['HTTP_HOST']=='localhost'){
            echo "Subject: ".$this->template->subject.'</br>';
            echo $this->template->email_text;
            die;
        }
        // echo "dfgdfgdfg";
    }

    private function getReplacements($variables){
        $varArr = (array)json_decode(json_encode($variables));
        // $variables
        $search = $replace = [];
        foreach($varArr as $key=>$val){
            // echo $key.'lk ';
            $search[] = '{'.$key.'}';
            $replace[] = $val;
        }
        return ['search'=>$search,'replace'=>$replace];
        // $getKeys = array_keys($varArr);
        // print_r($getKeys);
    }

    private $from = 'no-reply@healthclaimsforum.net';
    private $to = 'ineekweb@live.co.uk';
    private $bcc = 'ineekweb@live.co.uk';
    
    
    /* private $to = 'salman.tariq63111@gmail.com';
    private $bcc = 'salman.tariq63111@gmail.com';*/

    public function welcome($user)
    {
        //pr($user);
//        pr($user->first_name);
        $this->getEmailBody('user_registration',$user);
        // print $this->template->email_text;die;
        // print_r($this->template);
        // $this->getReplacements($user);
        // str_replace();

        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
            ->to($user->email)
            //->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
         $this
             ->setTo($user->email)
             ->setSubject(sprintf('Welcome %s', $user->first_name))
             ->setTemplate('welcome') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($this->from)
             ->set('user',$user);
    }

    public function resetPassword($user)
    {
//        pr($user);
        // $this
        //     ->setTo($user->email)
        //     ->setSubject(sprintf('Reset Password Confirmation Email', $user->first_name))
        //     ->setMessage('cfds fsd fdsfds fds ') // By default template with same name as method name is used.
        //     ->setEmailFormat('html')
        //     ->setLayout('default')
        //     ->setFrom($this->from)
        //     ->set('user',$user);
        // echo "asdasdsadasd";die;
        $this->getEmailBody('reset_password',$user);

        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
            ->to($user->email)
            //->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
        // echo $this->template;die;
        $this
            ->setTo($user->email)
            ->setSubject('Reset password')
            ->set(['token' => $user->token]);
    }

    public function rsvp_submitted($data)
    {
//        pr($user->first_name);
        $this->getEmailBody('rsvp_submitted',$data);
        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
            ->to($data['email'])
           // ->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
//         $this
//             ->setTo($data['email'])
//             ->setSubject(sprintf('Health Claims Forum application'))
//             ->setTemplate('rsvp_submitted') // By default template with same name as method name is used.
//             ->setEmailFormat('html')
//             ->setLayout('default')
//             ->setFrom($this->from)
//             ->set('data',$data);
    }
public function newsletter_self($data){
    
     $this->getEmailBody('newsletter_self',$data);

     
    // pr($this->getEmailBody('newsletter_self',$data));die;
     
        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
            // ->to($data['email'])
            ->to($data['email'])
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
         $this
             ->setTo($data['email'])
             ->setSubject(sprintf('News letter'))
             ->setTemplate('newsletter_self') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($this->from)
             ->set('data',$data);
    
    
    
    
}
    public function rsvp_colleague($data)
    {
        
       // pr($data);die;
//        pr($user->first_name);
        $this->getEmailBody('rsvp_colleague',$data);

        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
             ->to($data['email'])
            //->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
         $this
             ->setTo($data['email'])
             ->setSubject(sprintf('Health Claims Forum application'))
             ->setTemplate('rsvp_colleague') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($this->from)
             ->set('data',$data);
    }
    public function contact_us($data)
    {
        
       // pr($data);die;
//        pr($user->first_name);
        $this->getEmailBody('contact_us',$data);

        $email = new Email('default');
        $email->from($data['email'])
                ->to('annmarie.bayley@pacificlifere.com')
                ->bcc('ineekweb@live.co.uk')
                ->emailFormat('html')
                //->subject($this->template->subject)
                ->subject('HCF Members Area Enquiry')
                ->send($this->template->email_text);
         $this
             
             ->setTo('annmarie.bayley@pacificlifere.com')
             ->setSubject(sprintf('Health Claims Forum application'))
             ->setTemplate('contact_us') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($this->from)
             ->set('data',$data);
    }
    
    
    public function rsvp_self($data)
    {
        
       // pr($data);die;
//        pr($user->first_name);
        $this->getEmailBody('rsvp_self',$data);

        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
             ->to($data['email'])
            //->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
        /* $this
             ->setTo($data['email'])
             ->setSubject(sprintf('Health Claims Forum application'))
             ->setTemplate('rsvp_colleague') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($this->from)
             ->set('data',$data);*/
    }
    
    
    

    public function blank($user)
    {
    //    pr($user);
        $this->getEmailBody('send_email',$user);
        // pr($this->template);
        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
             ->to($user->email)
           // ->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
        // pr( $email);
        // $this
        //     ->setTo($user->email)
        //     ->setSubject(__($user->subject))
        //     ->setTemplate('blank') // By default template with same name as method name is used.
        //     ->setEmailFormat('html')
        //     ->setLayout('default')
        //     ->setFrom($this->from)
        //     ->set('user',$user);
//        $this
//            ->setTo($user->email)
//            ->setSubject('Reset password')
//            ->set(['token' => $user->token]);
    }

    public function sendInfo($user)
    {
       //pr($user);die;
        $this->getEmailBody('user_login_details',$user);

        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
             ->to($user->email)
           // ->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject)
            ->send($this->template->email_text);
         $this
             ->setTo($user->email)
             ->setSubject(__('Your account is Activated. You can now login.'))
             ->setTemplate('send_info') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($this->from)
             ->set('user',$user);
//        $this
//            ->setTo($user->email)
//            ->setSubject('Reset password')
//            ->set(['token' => $user->token]);
    }

    public function bulkEmail($mailData)
    {
        // pr($mailData);
        // die;
        $this->getEmailBody('send_email',$mailData);

        $email = new Email('default');
        $email->from([$this->template->from_address=>$this->template->from_name])
             ->to($mailData->email)
            //->to($this->to)
            ->bcc($this->bcc)
            ->emailFormat('html')
            ->subject($this->template->subject);
            if(isset($mailData->cc)){
                $email->cc($mailData->cc);
            }
            $email->send($this->template->email_text);
         $this
             ->setTo($mailData->email)
             // ->setTo('peter@msoft-technologies.com')
             ->setSubject(__($mailData->subject))
             ->setTemplate('bulkEmail') // By default template with same name as method name is used.
             ->setEmailFormat('html')
             ->setLayout('default')
             ->setFrom($mailData->from_email)
             ->set('mailData',$mailData);
         if(isset($mailData->cc)){
             $this->setCc($mailData->cc);
         }
        $this
            ->setTo($user->email)
            ->setSubject('Reset password')
            ->set(['token' => $user->token]);
    }
    
}
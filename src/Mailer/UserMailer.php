<?php
namespace App\Mailer;

use Cake\Mailer\Email;

$email = new Email('default');
$email->from(['topsinpw@gmail.com' => 'My Site'])
    ->to('topsinpw@gmail.com')
    ->subject('About')
    ->send('My message');

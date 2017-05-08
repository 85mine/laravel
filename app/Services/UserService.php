<?php namespace App\Services;

use App\Models\ConfirmEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService extends Service
{

    public function activeEmail($user)
    {

        $confirmEmail = ConfirmEmail::firstOrNew(['email' => $user->email]);
        $confirmEmail->email = $user->email;
        $confirmEmail->token = Hash::make($user->email);
        $confirmEmail->save();

        if ($confirmEmail) {
            Mail::send('emails.template.confirm_email', ['user' => $user], function ($m) use ($user) {
                $m->from(config('email_setting.email'), config('email_setting.name'));
                $m->to($user->email, $user->name)->subject(trans('labels.email.confirm_email.title'));
            });

            if( count(Mail::failures()) > 0 ) {
                $this->res['status'] = true;
                $this->res['message'] = trans('messages');
            }
            return redirect(route('user.getActiveEmail'))->withInput('aaaa');
        }
    }
}
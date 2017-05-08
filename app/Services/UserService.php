<?php namespace App\Services;

use App\Models\ConfirmEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail;

class UserService extends Service
{

    public function activeEmail($user)
    {

        $confirmEmail = ConfirmEmail::firstOrNew(['email' => $user->email]);
        $confirmEmail->email = $user->email;
        $confirmEmail->token = Hash::make($user->email);
        $confirmEmail->save();

        if ($confirmEmail) {
            $email = Mail::send('emails.template.confirm_email', ['user' => $user, 'token' => $confirmEmail], function ($m) use ($user) {
                $m->from(config('config.email_setting.email'), config('config.email_setting.name'));
                $m->to($user->email, $user->name)->subject(trans('labels.email.confirm_email.title'));
            });

            if($email) {
                $this->res['status'] = true;
                $this->res['message'] = trans('messages.user.confirm_email.send_success');
            } else {
                $this->res['message'] = trans('messages.user.confirm_email.send_fail');
            }
        }
        return $this->res;
    }
}
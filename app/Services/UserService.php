<?php namespace App\Services;

use App\Models\ConfirmEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail, DB;

class UserService extends Service
{
    public function activeEmail($token)
    {
        $confirmEmail = ConfirmEmail::where(['token' => $token])->first();
        $findUser = User::where(['email' => $confirmEmail->email])->first();

        DB::beginTransaction();
        try {
            // active email user
            $findUser->status = USER_ACTIVE;
            $findUser->save();

            // delete token from confirm email table
            $confirmEmail->delete();
            DB::commit();
            $this->res['status'] = true;
            $this->res['message'] = str_replace( STRING_REPLACE, route('user.getLogin'), trans('messages.user.confirm_email.active_email_success'));
        } catch (\Exception $e) {
            DB::rollback();
        }

        return $this->res;
    }

    public function sendConfirmEmail($user)
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
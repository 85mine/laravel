<?php namespace App\Helper;
use Illuminate\Http\Request;

class Common {

    public static function setMessage($request, $type, $messages) {
        $request->session()->flash('alertMsg', view('errors.message')->with([
            'type' => $type,
            'messages' => $messages,
        ])->render());
    }

    public static function getMessage($request) {
        $message = null;
        if($request->session()->has('alertMsg')) {
            $message = $request->session()->get('alertMsg');
        }

        return $message;
    }
}
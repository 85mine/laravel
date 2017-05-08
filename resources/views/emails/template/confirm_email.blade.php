@extends('emails.layout.main')
Dear {{ $user->name }},
<br><br>
Please click below link to active email:
<br>
<a href="{{route('user.getActiveEmail')}}?token={{$token->token}}">{{route('user.getActiveEmail')}}?token={{$token->token}}</a>
<br><br>
Expired date: {{ \Carbon\Carbon::parse($token->created_at)->addDay()->format(config('config.date.format_datetime')) }}
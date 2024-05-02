@extends('layouts.template')

@section('page', 'Feedback')

@section('feedback-form')
    <form action="/success" method="POST">
    @csrf
    <label>Enter your E-mail ID: </label>
    <input type="text" name="username" placeholder="Enter your mail"><br><br>
    <label>Enter your Feedback: </label>
    <input type="text" name="feedback" placeholder="Enter your feedback"><br><br>
    <button type='submit'>Submit</button>
    </form>
@endsection

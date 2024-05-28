@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        @can('isAdmin')
                            <h4 class="text-center">this is for admin</h4>
                        @endcan

                        @can('isUser')
                            <h4 class="text-center">this is for user</h4>
                        @endcan

                        @can('isEditor')
                            <h4 class="text-center">this is for editor</h4>
                        @endcan

                        <button class="btn btn-primary"><a href="{{route('post.index')}}" class="nav-link">Show Post</a></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

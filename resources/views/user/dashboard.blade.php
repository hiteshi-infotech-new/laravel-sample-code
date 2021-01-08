@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         @include('layouts/sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>
                <div class="card-body ">

                @include('layouts/flash')
                <div class="text-left">
                        @if(Auth::user()->profile)
                        <img src="{{ asset('/storage/images/'.Auth::user()->profile) }}" width="100">
                        @else
                        <img src="{{ asset('/storage/images/user.png')}}" width="100">
                        @endif   
                </div>

                    <div class="text-right">
                    <form action="{{url('profile_upload')}}" method="post" enctype="multipart/form-data">
                        
                        @csrf
                        <input type="file" name="profile">
                        <input type="submit" value="upload">

                    </form>      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

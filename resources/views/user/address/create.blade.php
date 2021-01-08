
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('layouts/sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('Address.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value=""   autofocus>
                                <input id="" type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}"   autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                            	<select name="country" class="form-control @error('country') is-invalid @enderror">
                                    <option value="">---Select Country---</option>
                            	@foreach($country as $key => $value)	

                            	<option value="{{$value->id}}">{{$value->country_name}}</option>
                            	@endforeach
                            	</select>
                               
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

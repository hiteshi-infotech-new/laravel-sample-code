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

                    <div class="text-center">
                        <h3><a href="{{route('Address.create')}}" class="btn btn-success ml">Add +</a></h3>
                        <table class="table">
                            <thead>
                                <th>S.No</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                @if($Address)
                                @foreach($Address as $key => $address)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->country_name }}</td>
                                    <td>{{ $address->status }}</td>
                                    <td><a href="{{route('Address.edit',$address->id)}}" class="btn btn-info ml">edit</a><span>&nbsp;</span>
                                    <form action="{{ route('Address.destroy', $address->id) }}" onsubmit="return confirm('Are you sure?');" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mr" type="submit">Delete</button>
                                    </form>

                                    <!-- <a href="{{route('Address.destroy',$address->id)}}" class="btn btn-danger mr">delete</a> -->
                                    
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>No Data Found.</tr>
                                @endif
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

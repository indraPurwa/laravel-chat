@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @if (Auth::user()->level==2)
                        <form method="POST" action="{{ route('order.store') }}">
                            <input type="hidden" name="usermer_id" value="1">
                            @csrf
                            @if ($errors->any())
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <ol>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Pesan 1</button>
                                </div>
                            </div>
                        </form>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

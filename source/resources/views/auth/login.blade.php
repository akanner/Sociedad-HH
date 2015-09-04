@extends('layout.main')
@section('title') Login :: @parent @endsection

@section('content')

    @include('errors.messageBagErrors')

    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contrase&ntilde;a</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <button type="submit" class="btn">Entrar</button>
    </form>

@endsection

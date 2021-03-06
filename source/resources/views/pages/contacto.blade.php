@extends('layout.main')
@section('title') Contacto :: @parent @endsection

@section('content')

    <div class="row">
        @include('errors.messageBagErrors')

        <div class="page-intro-wrapper">
            <h4>CUENTEN CON NOSOTROS</h4>
            <h3>CONTACTO</h3>
            <p>
                A través de esta sección la Sociedad de Hematología y Hemoterapia de La Plata lo
                invita a dejar sus comentarios, dudas y/o consultas que tenga. A la brevedad recibirá una
                respuesta.
            </p>
        </div>

        {!! Form::open(array('action' => 'ContactController@sendEmail', 'class' => 'stylish-form')) !!}
            <div class="form-group">
                {!! Form::label('fullName-input', 'Nombre y apellido', ["class" => "required"]) !!}
                {!! Form::text('fullName', null,["id" => "fullName-input", "class" => "form-control", "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email-input', 'E-mail', ["class" => "required"]) !!}
                {!! Form::email('email', null,["id" => "email-input", "class" => "form-control", "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('subject-input', 'Asunto', ["class" => "required"]) !!}
                {!! Form::text('subject', null,["id" => "subject-input", "class" => "form-control", "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message-input', 'Mensaje', ["class" => "required"]) !!}
                {!! Form::textarea('message', null,["id" => "message-input", "class" => "form-control", "required"]) !!}
            </div>
            <button type="submit" class="btn btn-error">Enviar</button>
        {!! Form::close() !!}
    </div>

@endsection

<html>
    <head>
        <title>CoInstaSearch</title>
        <!--  <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />  -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <link rel="stylesheet" href="css/profilestyle.css">
          <link rel="icon" href="/img/icons/icon.png" />

    </head>

    <body>
      



        {!! Form::model($identity, ['action' => ['CompaniesController@updateEmail', $identity->id], 'method' => 'PUT']) !!}



        @if (count($errors) >0)
        <div class="alert alert-danger">
            There were  some problems adding the company.<br />
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="form-group">
    {!! Form::label('Email') !!}
    {!! Form::text('email', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți emailul'
    )) !!}
</div>

 <div class="form-group">
        {!! Form::submit('Salvează!',
            array(
                'class' =>'btn btn-primary'
        )) !!}
        </div>
{!! Form::close() !!}


        {!! Form::model($identity, ['action' => ['CompaniesController@updatePassword', $identity->id], 'method' => 'PUT']) !!}



        @if (count($errors) >0)
        <div class="alert alert-danger">
            There were  some problems adding the company.<br />
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class="form-group">
    {!! Form::label('Parola curentă') !!}
    {!! Form::text('current_password', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți parola'
    )) !!}
</div>

    <div class="form-group">
    {!! Form::label('Parola nouă') !!}
    {!! Form::text('new_password', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți noua parola'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Confirmă Parola nouă') !!}
    {!! Form::text('confirm_password', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Confirmati noua parola'
    )) !!}
</div>

 <div class="form-group">
        {!! Form::submit('Salvează!',
            array(
                'class' =>'btn btn-primary'
        )) !!}
        </div>
{!! Form::close() !!}




<script src="js/script.js"></script>
    </body>
</html>
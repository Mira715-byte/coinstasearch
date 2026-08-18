<!DOCTYPE html>
<html>
    <head>
        <title>CoInstaSearch</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <body>
     <div class="container">   

        <nav class="collapse navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/') }}">View all Comapnies</a></li>    
                <li><a href="{{ URL::to('companies/create') }}">Create a Company</a></li> 
            </ul>
        </nav>

        

        {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'PUT']) !!}

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
    {!! Form::label('Nume companie') !!}
    {!! Form::text('company_name', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți numele companiei'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('CUI') !!}
    {!! Form::text('CUI', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți CUI'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Număr înmatriculare') !!}
    {!! Form::text('no_reg', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți numărul de înregistrare'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('EUID') !!}
    {!! Form::text('EUID', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți EUID'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Data înființării') !!}
    {!! Form::text('startdate', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți data înființării'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Observații') !!}
    {!! Form::text('comments', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți observații'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Mărci înregistrate la OSIM') !!}
    {!! Form::text('OSIM', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți mărci înregistrate la OSIM'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Descrierea firmei') !!}
    {!! Form::text('about', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți descrierea firmei'
    )) !!}
</div>

<div class="form-group">
{!! Form::label('county_id', 'Județ:') !!}
{!! Form::select('county_id[]', $county, $company->county->lists('id')->toArray(), 
['class' => 'form-control multi-select', 'multiple' => 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('Adresă') !!}
    {!! Form::text('address', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți adresa'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Telefon') !!}
    {!! Form::text('phone', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți telefon'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Fax') !!}
    {!! Form::text('fax', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți fax'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Mobil') !!}
    {!! Form::text('mobile', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți mobil'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Administrator') !!}
    {!! Form::text('admins', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți administrator'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Web') !!}
    {!! Form::text('web', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți adresa web'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Cod CAEN') !!}
    {!! Form::text('CAEN', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți codul CAEN'
    )) !!}
</div>

<div class="form-group">
    {!! Form::label('Obiect de activitate') !!}
    {!! Form::text('activity', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți obiectul de activitate'
    )) !!}
</div>
<div class="form-group">
    {!! Form::label('Obiect de activitate') !!}
    {!! Form::text('activity_description', null,
        array(
            'class' =>'form-control',
            'placeholder' => 'Introduceți descrierea activității'
    )) !!}
</div>





        <div class="form-group">
        {!! Form::submit('Edit Company!',
            array(
                'class' =>'btn btn-primary'
        )) !!}
        </div>
{!! Form::close() !!}

</body>
</html>
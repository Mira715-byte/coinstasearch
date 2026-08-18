@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
<!--
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>

				-->


				<div class="form">



    <div class="tab-content">
        <div id="user">
            <h1>Detalii candidat</h1>
            <form action="/doregisteruser" method="post">
            	
                <div class="field-wrap">
                    <label>
                        Nume<span class="req">*</span>
                    </label>
                    <input type="text" name="lastname" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Prenume<span class="req">*</span>
                    </label>
                    <input type="text" name="firstname" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        E-mail<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Parolă<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Confirmă parola<span class="req">*</span>
                    </label>
                    <input type="password" name="cpassword" required autocomplete="off"/>
                </div>

                <button type="submit" name="submit" value="Submit" class="button button-block">Creare cont</button>
                <br><br>
            </form>
        </div>

        <div id="company">
            <h1>Detalii companie</h1>

            <form action="/doregistercompany" method="post">
            	
                <div class="field-wrap">
                    <label>
                        Companie<span class="req">*</span>
                    </label>
                    <input type="text" name="company_name" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Telefon<span class="req">*</span>
                    </label>
                    <input type="text" name="phone" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        E-mail<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Parolă<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Confirmă parola<span class="req">*</span>
                    </label>
                    <input type="password" name="cpassword" required autocomplete="off"/>
                </div>

                <button type="submit" name="submit" value="Submit" class="button button-block">Creare cont</button>
                <br><br>
            </form>

        </div>
    </div><!-- tab-content -->

</div>




				</div>
			</div>
		</div>
	</div>
</div>
@endsection

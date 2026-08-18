<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Auth;
use View;
use Session;
use Validator;
use Input;
use Redirect;
use Hash;


class AdminController extends Controller
{
   /* public function __construct()
	{
		if( !Auth::user()->admin_id ) {
			App::abort( 403, 'Access denied' );
		}
	} */

	public function index()
	{
		return View::make( 'admin.index' );
	}

	public function companies()
	{
		return View::make( 'admin.companies', ['companies' => Company::all()] );
	}

	

	public function users()
	{
		return View::make( 'admin.users', ['users' => User::all()] );
	}

	public function contactForm()
	{
		return View::make( 'admin.contactform', ['submits' => ContactForm::all()] );
	}

	public function doDeleteCompany()
	{
		$id = Input::get( 'id' );
		$company = Company::findOrFail( $id );
		$company->delete();

		return Redirect::to( '/admin/companies' );
	}


	public function doDeleteUser()
	{
		$id = Input::get( 'id' );
		$user = User::findOrFail( $id );
		$user->delete();

		return Redirect::to( '/admin/users' );
	}

	public function doDeleteContactForm()
{
	$id = Input::get( 'id' );
	$submit = ContactForm::findOrFail( $id );
	$submit->delete();

	return Redirect::to( '/admin/contactform' );
}

	public function doLogout()
	{
		Auth::logout(); 
		return Redirect::to( '/' ); 
	}
}

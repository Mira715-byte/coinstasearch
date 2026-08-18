<?php

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

?>
<html>
    <head>
        <title>CoInstaSearch</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/auth.css">
          <link rel="icon" href="/img/icons/icon.png" />

    </head>

    <body>

    <div class="container co-list">
            <a class="navbar-brand" href="/">
                <img  class="img-list" alt="Logo" src="../img/icons/icon.png">
                <div class="container">
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                    <div class="lines-list"></div>
                  </div>
             <img id="insta-list" alt="Logo" src="../img/icons/insta.png">    
            </a>


         @if (Auth::guest())
                
              @elseif( Auth::user()->user_id  || Auth::user()->company_id)
                <a  href="/listafirme" style="width:auto;" class="btn btn-info btn-lg" role="button">Listă firme</a>
                <a  href="/logout" style="width:auto;" class="btn btn-info btn-lg" role="button">Logout</a>  
                @if( Auth::user()->company_id)  
                <a  href="/editcompany" style="width:auto;" class="btn btn-info btn-lg" role="button">Actualizează companie</a> 
                @endif
         @endif
         @if(!Auth::check())

        <div class="dropdown">
        <button onclick="myFunction()"  style="width:auto;" class="btn btn-info-drop btn-lg ">Dropdown</button>
        <div id="myDropdown" class="dropdown-content">
         
        <a  onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="btn btn-info btn-lg" role="button">Persoană fizică</a>    

        <div id="id02" class="modal">
          
          <form class="modal-content animate" action="/doregisteruser" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
              
            </div>

            <div class="container loginform">

              <label for="lastname"><b>Nume</b></label>
              <input type="text"  placeholder="Introduceți numele" name="lastname" required>

              <label for="firstname"><b>Prenume</b></label>
              <input type="text"  placeholder="Introduceți prenumele" name="firstname" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Introduceți emailul" name="email" required>

              <label for="psw"><b>Parolă</b></label>
              <input type="password" placeholder="Introduceți parola" name="password" required>

              <label for="psw"><b>Conformă parola</b></label>
              <input type="password" placeholder="Confirmați parola" name="cpassword" required>
                
               <button type="submit" name="submit" value="Submit" class="button button-block" id="button"/>Creare cont</button>
              
            </div>

            
          </form>
        </div>


        <a  onclick="document.getElementById('id03').style.display='block'" style="width:auto;" class="btn btn-info btn-lg" role="button">Companie</a>  
          
          <div id="id03" class="modal">
          
          <form class="modal-content animate" action="/doregistercompany" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
              
            </div>

            <div class="container loginform">

              <label for="company_name"><b>Companie</b></label>
              <input type="text"  placeholder="Introduceți numele" name="company_name" required>

              <label for="phone"><b>Telefon</b></label>
              <input type="text"  placeholder="Introduceți telefonul" name="phone" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Introduceți emailul" name="email" required>

              <label for="password"><b>Parolă</b></label>
              <input type="password" placeholder="Introduceți parola" name="password" required>

              <label for="cpassword"><b>Conformă parola</b></label>
              <input type="password" placeholder="Confirmați parola" name="cpassword" required>
                
               <button type="submit" name="submit" value="Submit" class="button button-block" id="button"/>Creare cont</button>
              
            </div>
  
          </form>
        </div>
           
      </div>
  </div>

          <a  onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-info btn-lg" role="button">Autentificare</a>      

          <div id="id01" class="modal">
          
          <form class="modal-content animate" action="/dologin" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              
            </div>

            <div class="container loginform">
              <label for="uname"><b>Email</b></label>
              <input type="text" placeholder="Introduceți emailul" name="email" required>

              <label for="psw"><b>Parolă</b></label>
              <input type="password" placeholder="Introduceți parola" name="password" required>
                
               <button type="submit" name="submit" value="Submit" class="button button-block" id="button"/>Intră în cont</button>
              
            </div> 
          </form>
        </div>        
@endif
<form class="example" action="{{ url('listafirme') }}" method="get" >
  <input type="text"  name="search"
                      class="form-control"
                      placeholder="Search..."
                      id="table_filter" type="text" aria-label="Text input with segmented button dropdown" >
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


<div class="panel-body col-md-12">

      <h2>Companies <small>{{ $companies->count() }}</small></h2>
       @forelse ($companies as $key => $value)
       
      <button class="accordion">{{ $value->company_name }}</button>

      <div class="panel">


            <table>

              <a class="btn btn-small button2" href="{{ URL::to('listafirme/' . $value->id)}}">Show this Company</a>
                    
              <tr>
                <td>Nume Companie</td>
                <td>{{ $value->company_name }}</td>
              </tr>
              <tr>
                <td>CUI</td>
                <td>{{ $value->CUI }}</td>
              </tr>
              <tr>
                <td>Număr înmatriculare</td>
                <td>{{ $value->no_reg }}</td>
              </tr>
              <tr>
                <td>EUID</td>
                <td>{{ $value->EUID }}</td>
              </tr>
               <tr>
                <td>Judet</td>
                <td>{{ $value->county->county_name }}</td> 
              </tr>
              <tr>
                <td>Data înființării</td>
                <td>{{ $value->startdate }}</td>
            </tr>
             <tr>
                <td>Observații</td>
                <td>{{ $value->comments }}</td>
            </tr>
             <tr>
                <td>Mărci înregistrate La OSIM</td>
                <td>{{ $value->OSIM }}</td>
            </tr>
             <tr>
                <td>Descrierea Firmei</td>
                <td>{{ $value->about }}</td>
            </tr>
             <tr>
                <td>Oraș</td>
                <td>{{ $value->city->city_name}}</td>
            </tr>
             <tr>
                <td>Adresă</td>
                <td>{{ $value->address }}</td>
            </tr>
             <tr>
                <td>Telefon</td>
                <td>{{ $value->phone }}</td>
            </tr>
             <tr>
                <td>Fax</td>
                <td>{{ $value->fax }}</td>
            </tr>
             <tr>
                <td>Mobil</td>
                <td>{{ $value->mobile }}</td>
            </tr>
             <tr>
                <td>Administrator</td>
                <td>{{ $value->admins }}</td>
            </tr>
             <tr>
                <td>Web</td>
                <td>{{ $value->web }}</td>
            </tr>
             <tr>
                <td>Cod CAEN</td>
                <td>{{ $value->CAEN }}</td>
            </tr>
             <tr>
                <td>Obiect De Activitate</td>
                <td>{{ $value->activity_description }}</td>
            </tr>

            </table>

       
      </div>


      @empty
         <p>No companies found</p>
      @endforelse

</div>

{{--
  <div class="panel">


            <table>

              <a class="btn btn-small button2" href="{{ URL::to('listafirme/' . $value->id)}}">Show this Company</a>
                    
              <tr>
    <td>Nume Companie</td>
    <td>{{ $company->company_name }}</td>
  </tr>
  <tr>
    <td>CUI</td>
    <td>{{ $company->CUI }}</td>
  </tr>
  <tr>
    <td>Număr înmatriculare</td>
    <td>{{ $company->no_reg }}</td>
  </tr>
  <tr>
    <td>EUID</td>
    <td>{{ $company->EUID }}</td>
  </tr>
   <tr>
     <td>Judet</td>
     <td>{{ $company->county->county_name }}</td>
    </tr>
  <tr>
    <td>Data înființării</td>
    <td>{{ $company->startdate }}</td>
</tr>
 <tr>
    <td>Observații</td>
    <td>{{ $company->comments }}</td>
</tr>
 <tr>
    <td>Mărci înregistrate La OSIM</td>
    <td>{{ $company->OSIM }}</td>
</tr>
 <tr>
    <td>Descrierea Firmei</td>
    <td>{{ $company->about }}</td>
</tr>
  <tr>
     <td>Oraș</td>
     <td>{{ $company->city->city_name}}</td>
  </tr>
 <tr>
    <td>Adresă</td>
    <td>{{ $company->address }}</td>
</tr>
 <tr>
    <td>Telefon</td>
    <td>{{ $company->phone }}</td>
</tr>
 <tr>
    <td>Fax</td>
    <td>{{ $company->fax }}</td>
</tr>
 <tr>
    <td>Mobil</td>
    <td>{{ $company->mobile }}</td>
</tr>
 <tr>
    <td>Administrator</td>
    <td>{{ $company->admins }}</td>
</tr>
 <tr>
    <td>Web</td>
    <td>{{ $company->web }}</td>
</tr>
 <tr>
    <td>Cod CAEN</td>
    <td>{{ $company->CAEN }}</td>
</tr>
 <tr>
    <td>Obiect De Activitate</td>
    <td>{{ $company->activity_description }}</td>
</tr>

            </table> 

       
      </div>  --}}

<center>
      <div class="col-md-12">
        <ul class="pagination">
          <li>
            <a href="#">Prev</a>
          </li>
          <li class="active">
            <a href="#">1</a>
          </li>
          <li>
            <a href="#">2</a>
          </li>
          <li>
            <a href="#">3</a>
          </li>
          <li>
            <a href="#">4</a>
          </li>
          <li>
            <a href="#">5</a>
          </li>
          <li>
            <a href="#">Next</a>
          </li>
        </ul>
      </div>
</center>

</div>   
      
<script src="js/script.js"></script>
    </body>
</html>
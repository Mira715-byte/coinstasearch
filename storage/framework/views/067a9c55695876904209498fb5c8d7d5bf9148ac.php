<?php

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

?>

<html>
    <head>
        <title>CoInstaSearch</title>
        <!--  <link rel="stylesheet" href="<?php echo e(elixir('css/app.css')); ?>" />  -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/auth.css">
          <link rel="icon" href="/img/icons/icon.png" />

    </head>

    <body>

    <div class="container-fluid">
      <div class="navbar-header">
 

            <a class="navbar-brand" href="/">
                <img alt="Logo" src="../img/icons/icon.png">
                <div class="container">
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  <div class="lines"></div>
  </div>
             <img id="insta" alt="Logo" src="../img/icons/insta.png">   
    <a  onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="btn btn-info abutton btn-lg" role="button">Autentificare</a>  
  <div class="dropdown">
<button onclick="myFunction()"  style="width:auto;" class="btn btn-info abutton dropbutton btn-lg ">Dropdown</button>
  <div id="myDropdown" class="dropdown-content showdropdown">
 
    <a  onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="btn btn-info  btn-lg" role="button">Persoană fizică</a> 
    <a  onclick="document.getElementById('id03').style.display='block'" style="width:auto;" class="btn btn-info  btn-lg" role="button">Companie</a>   
  </div>
        </div> 
            </a>
<div class="motto"><p style="color:#fff"> Obțineți informațiile dorite cu privire la companii printr-o căutare eficientă!</p></div>
         
           
            
    
              
 



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

        </div>        




    </div>


</nav>

</div>





<div class="parallax2"></div>
<div class="col-md-3">
   
   <div class="box"> <h3><a href="<?php echo e(url('/listafirme')); ?>">Listă firme</a></h3></div>

        
    </div>
  
  <div class="col-md-3">

   <div class="box"><h3><a href="/select-county">Județ</a></h3></div>
        

  </div>

  <div class="col-md-3">
  
   <div class="box"><h3><a href="/select-city">Oraș</a></h3></div>
        
 
  </div>

  <div class="col-md-3">
  
   <div class="box"><h3><a href="/select-domain">Domeniu</a></h3></div>

        
  
  </div> 


<div class="parallax2"></div>





              
                </div>   






            </div>
        </div>
      


 <section id="get-in-touch">
        <div class="container">
          
             
      
            
            <div class="row">
            <div class="col-sm-6">
              <div class="address">
                              <h2>Contactează-ne</h2>
                                </div>

            <div class="address">
            <h4>Adresă sediu central</h4>
            <p> Strada George Enescu, nr. 34 Sector 2, București</p>
            </div>
            
            <div class="address">
            <h4>Telefon</h4>
            <p>0100-000-000</p>
            </div>
            
            <div class="address">
            <h4>Email</h4>
            <p><a href="#">info@coinstasearch.com </a></p>
            </div>
            
          
            </div>
            
            <div class="col-sm-6 form">
            
            <form action="#" method="post" name="contact-form" id="main-contact-form">
                                <div class="form-group">
                                    <input type="text" required placeholder="Nume" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" required placeholder="Email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" required placeholder="Subiect" class="form-control" name="subject">
                                </div>
                                <div class="form-group">
                                    <textarea required placeholder="Mesaj" rows="8" class="form-control" name="message"></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Trimite</button>
                            </form>
            </div>
            
            
            </div>
            
            
        </div>
    </section><!--/#get-in-touch-->


<footer id="footer">
        <div class="container text-center">
          <p class= "copyright">All rights reserved © 2018 | CoInstaSearch</p>
        </div>
    </footer><!--/#footer-->






<script src="js/script.js"></script>
    </body>
</html>
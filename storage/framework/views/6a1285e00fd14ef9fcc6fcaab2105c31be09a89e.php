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


         <?php if(Auth::guest()): ?>
                
              <?php elseif( Auth::user()->user_id  || Auth::user()->company_id): ?>
                <a  href="/listafirme" style="width:auto;" class="btn btn-info btn-lg" role="button">Listă firme</a>
                <a  href="/logout" style="width:auto;" class="btn btn-info btn-lg" role="button">Logout</a>  
                <?php if( Auth::user()->company_id): ?>  
                <a  href="/editcompany" style="width:auto;" class="btn btn-info btn-lg" role="button">Actualizează companie</a> 
                <?php endif; ?>
         <?php endif; ?>
         <?php if(!Auth::check()): ?>

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
<?php endif; ?>
<form class="example" action="<?php echo e(url('listafirme')); ?>" method="get" >
  <input type="text"  name="search"
                      class="form-control"
                      placeholder="Search..."
                      id="table_filter" type="text" aria-label="Text input with segmented button dropdown" >
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


<div class="panel-body col-md-12">

      <h2>Companies <small><?php echo e($companies->count()); ?></small></h2>
       <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
       
      <button class="accordion"><?php echo e($value->company_name); ?></button>

      <div class="panel">


            <table>

              <a class="btn btn-small button2" href="<?php echo e(URL::to('listafirme/' . $value->id)); ?>">Show this Company</a>
                    
              <tr>
                <td>Nume Companie</td>
                <td><?php echo e($value->company_name); ?></td>
              </tr>
              <tr>
                <td>CUI</td>
                <td><?php echo e($value->CUI); ?></td>
              </tr>
              <tr>
                <td>Număr înmatriculare</td>
                <td><?php echo e($value->no_reg); ?></td>
              </tr>
              <tr>
                <td>EUID</td>
                <td><?php echo e($value->EUID); ?></td>
              </tr>
               <tr>
                <td>Judet</td>
                <td><?php echo e($value->county->county_name); ?></td> 
              </tr>
              <tr>
                <td>Data înființării</td>
                <td><?php echo e($value->startdate); ?></td>
            </tr>
             <tr>
                <td>Observații</td>
                <td><?php echo e($value->comments); ?></td>
            </tr>
             <tr>
                <td>Mărci înregistrate La OSIM</td>
                <td><?php echo e($value->OSIM); ?></td>
            </tr>
             <tr>
                <td>Descrierea Firmei</td>
                <td><?php echo e($value->about); ?></td>
            </tr>
             <tr>
                <td>Oraș</td>
                <td><?php echo e($value->city->city_name); ?></td>
            </tr>
             <tr>
                <td>Adresă</td>
                <td><?php echo e($value->address); ?></td>
            </tr>
             <tr>
                <td>Telefon</td>
                <td><?php echo e($value->phone); ?></td>
            </tr>
             <tr>
                <td>Fax</td>
                <td><?php echo e($value->fax); ?></td>
            </tr>
             <tr>
                <td>Mobil</td>
                <td><?php echo e($value->mobile); ?></td>
            </tr>
             <tr>
                <td>Administrator</td>
                <td><?php echo e($value->admins); ?></td>
            </tr>
             <tr>
                <td>Web</td>
                <td><?php echo e($value->web); ?></td>
            </tr>
             <tr>
                <td>Cod CAEN</td>
                <td><?php echo e($value->CAEN); ?></td>
            </tr>
             <tr>
                <td>Obiect De Activitate</td>
                <td><?php echo e($value->activity_description); ?></td>
            </tr>

            </table>

       
      </div>


      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
         <p>No companies found</p>
      <?php endif; ?>

</div>



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
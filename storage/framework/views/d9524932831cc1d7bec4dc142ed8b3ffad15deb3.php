


<html>
    <head>
        <title>CoInstaSearch</title>
        <!--  <link rel="stylesheet" href="<?php echo e(elixir('css/app.css')); ?>" />  -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/auth.css">
    
          <link rel="icon" href="/img/icons/icon.png" />
<style>
.list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid #ddd;
    margin-left: 460px;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    margin-left: 136px;
    padding: 10px;
    margin-top: 43px;
}

.form {
    margin-top: 80px;
    margin-right: 15px;
}
</style>

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
 
<div class="mottocity"><p style="color:#fff"> Căutați compania dorită în funcție de criteriul „județ”!</p></div>

<app class='app'></app>

<script src="https://cdn.jsdelivr.net/g/algoliasearch@3(algoliasearchLite.min.js),algoliasearch.helper@2"></script>`


<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/algoliasearch-helper@2.26.1/dist/algoliasearch.helper.min.js"></script>


<script src="/js/vue/county.js"></script>
<script src="js/script.js"></script>

      

    </body>
</html>
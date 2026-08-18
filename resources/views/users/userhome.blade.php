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
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid profile">
        <div class="navbar-header ">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" class='co' href="/">
                <img alt="Logo" class='small_logo'src="../img/icons/icon.png">
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
             <img class="smallname" alt="Logo" src="../img/icons/insta.png">    
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        
            

            
 
        
        <ul class="nav navbar-nav navbar-right">
             <li><button class="button a"><a href="#"><span> Profil </span></a></button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           
            <li><button class="button b"> <a href="/logout"><span> Logout </span></a></button></li>

              
        </ul>
        </ul>
        <ul class="nav navbar-nav navbar-right">
             <li><button class="button c"><a href="/listafirme"><span> Listă firme </span></a></button></li>
        </ul>
    




      
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
           
            <li><a href="/userhome/settings">Setări cont</a></li>
           
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          



          <div align="center" class="fond">

 
 <br><br><br><br><br><br><br><br><br> 
<form action="/doupdatecompanyprofile" method="post" enctype="multipart/form-data">
            <div class="file-upload">
                <div class="image-upload-wrap">
                    <input class="file-upload-input" type="file" name="file" id="file" onchange="readURL(this);"
                           accept="image/*"/>
                    <div class="drag-text">
                        
                    </div>
                </div>
                <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image"/>
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Șterge <span
                                    class="image-title">Uploaded Image</span></button>
                    </div>
                </div>
                <input class="file-upload-btn" type="submit" value="Adaugă imagine de profil"/>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </div>
        </form>


  
    
</div>




 </div>
 </div>
 </div>
<script src="/js/profile.js"></script>
<script src="js/script.js"></script>
    </body>
</html>





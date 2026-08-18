<!DOCTYPE html>
<html>
    <head>
        <title>CoInstaSearch</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <link rel="stylesheet" href="../css/style.css">
          <link rel="icon" href="/img/icons/icon.png" />
    </head>

    <body>

<div class="panel-body col-md-12">

                





<table>

        
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




</div>




  
            
<script src="../js/script.js"></script>

</body>
</html>                
                


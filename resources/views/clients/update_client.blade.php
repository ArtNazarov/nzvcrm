<!DOCTYPE html>
<html>
<head>
<title>Обновление данных клиента<</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';
$client_statuses = client_statuses();
$sources = sources();
$client_groups = client_groups();
?>
</head>
<body>
    
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      @include("navigation")
      <form class="d-flex" action='/searcher_client' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
        
<div class="container mt-4">
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="card">
<div class="card-header text-center font-weight-bold">
<h2>Обновление данных клиента</h2>
</div>
<div class="card-body">
    <form name="client" id="client" method="post" action="{{url('edit_client')}}">   
        {{ csrf_field() }}
        
    <input type='hidden' name='id' value='{{ $client->id }}'>

    <div class="form-group">
        <label for="clientInputName">Имя</label>
        <input  value='{{ $client->name }}' type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>        
 

<!-- inn -->	
     <div class="form-group">
                <label for="clientInputInn">ИНН</label>
                <input  value='{{ $client->inn }}' type="text" id="inn" name="inn" class="@error('inn') is-invalid @enderror form-control">
                        @error('inn')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>    

<!-- kpp  -->

    <div class="form-group">
                <label for="clientInputKpp">КПП</label>
                <input  value='{{ $client->kpp }}' type="text" id="kpp" name="kpp" class="@error('kpp') is-invalid @enderror form-control">
                        @error('kpp')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 

<!-- uadr -->  	 	


    <div class="form-group">
                <label for="clientInputUadr">Юр. адрес</label>
                <input  value='{{ $client->uadr }}' type="text" id="uadr" name="uadr" class="@error('uadr') is-invalid @enderror form-control">
                        @error('uadr')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 
<!-- fadr -->
 <div class="form-group">
                <label for="clientInputFadr">Фактический адрес</label>
                <input  value='{{ $client->fadr }}' type="text" id="fadr" name="fadr" class="@error('fadr') is-invalid @enderror form-control">
                        @error('fadr')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 

<!-- rcv -->  	 	
<div class="form-group">
                <label for="clientInputRcv">Грузополучатель</label>
                <input  value='{{ $client->rcv }}' type="text" id="rcv" name="rcv" class="@error('rcv') is-invalid @enderror form-control">
                        @error('rcv')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 
 
<!-- phone -->
<div class="form-group">
                <label for="clientInputPhone">Телефон</label>
                <input  value='{{ $client->phone }}' type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror form-control">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>


 
<!-- fax -->
<div class="form-group">
                <label for="clientInputFax">Факс</label>
                <input  value='{{ $client->fax }}' type="text" id="fax" name="fax" class="@error('fax') is-invalid @enderror form-control">
                        @error('fax')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>

 
<!-- director -->	
<div class="form-group">
                <label for="clientInputDirector">Директор</label>
                <input  value='{{ $client->director }}' type="text" id="director" name="director" class="@error('director') is-invalid @enderror form-control">
                        @error('director')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>


 

<!-- glavbuh --> 	 	  
<div class="form-group">
                <label for="clientGlavbuh">Глав. бух</label>
                <input  value='{{ $client->glavbuh }}' type="text" id="glavbuh" name="glavbuh" class="@error('glavbuh') is-invalid @enderror form-control">
                        @error('glavbuh')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>

<!-- email -->

<div class="form-group">
                <label for="clientEmail">Email</label>
                <input  value='{{ $client->email }}' type="text" id="email" name="email" class="@error('email') is-invalid @enderror form-control">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>
<!-- site -->
<div class="form-group">
                <label for="clientSite">Сайт</label>
                <input  value='{{ $client->site }}' type="text" id="site" name="site" class="@error('site') is-invalid @enderror form-control">
                        @error('site')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>


 	 		

<div class="form-group">
                <label for="clientSource">Источник клиента</label>
                <select  id="source" name="source" class="@error('source') is-invalid @enderror form-control">
                    @foreach ($sources as $source_key => $source_value)
                    <option <?=$client->source == $source_key ? ' selected="selected"' : '';?>  value='{{ $source_key }}'>{{ $source_value }} </option>
                    @endforeach
                </select> 
                         @error('source')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>
        
<div class="form-group">
                <label for="clientStatus">Статус клиента</label>
                <select  id="status" name="status" class="@error('status') is-invalid @enderror form-control">
                    @foreach ($client_statuses as $status_key => $status_value)
                    <option <?=$client->status == $status_key ? ' selected="selected"' : '';?> value='{{ $status_key }}'>{{ $status_value }} </option>
                    @endforeach
                </select> 
                         @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>   
                        
                         

<div class="form-group">
                <label for="clientClientGroup">Группа клиента</label>
                <select  id="client_group" name="client_group" class="@error('client_group') is-invalid @enderror form-control">
                    @foreach ($client_groups as $group_key => $group_value)
                    <option <?=$client->client_group == $group_key ? ' selected="selected"' : '';?> value='{{ $group_key }}'>{{ $group_value }} </option>
                    @endforeach
                </select>                         @error('client_group')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>   
 	 	 	 	 	

<div class="form-group">
                <label for="clientDocNum">Номер договора</label>
                <input  value='{{ $client->doc_num }}' type="text" id="doc_num" name="doc_num" class="@error('doc_num') is-invalid @enderror form-control">
                        @error('doc_num')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>   

<div class="form-group">
                <label for="clientDocDate">Дата договора</label>
                <input  value='{{ $client->doc_date }}' type="date" id="doc_date" name="doc_date" class="@error('doc_date') is-invalid @enderror form-control">
                        @error('doc_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>   

<div class="form-group">
                <label for="clientRs">Расчетный счет</label>
                <input value='{{ $client->rs }}' type="text" id="rs" name="rs" class="@error('rs') is-invalid @enderror form-control">
                        @error('rs')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>   
    
  <div class="form-group">
                <label for="clientBank">Банк</label>
                <input  value='{{ $client->bank }}' type="text" id="bank" name="bank" class="@error('bank') is-invalid @enderror form-control">
                        @error('bank')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>  
        
                                        
  <div class="form-group">
                <label for="clientKs">Коррсчет</label>
                <input  value='{{ $client->ks }}' type="text" id="ks" name="ks" class="@error('ks') is-invalid @enderror form-control">
                        @error('ks')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>  



<div class="form-group">
                <label for="clientBik">БИК</label>
                <input  value='{{ $client->bik }}' type="text" id="bik" name="bik" class="@error('bik') is-invalid @enderror form-control">
                        @error('bik')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>  
                                        

   <button type="submit" class="btn btn-primary">Обновить данные на клиента</button>
    </form>
</div>
</div>
</div>  
        
    </div><!-- comment -->
    @include('footer');
</body>
</html>
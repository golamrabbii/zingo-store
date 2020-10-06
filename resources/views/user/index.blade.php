@extends('user.main')

@section('title')
    User - Zingo
@endsection

@section('sub-content')

{{-- content --}}
    <div class="container">
    	<div class="card">
    		<div class="card-body">
    			<h2>Welcome, {{ $user->first_name.' '.$user->last_name }}</h2>
    			<hr style="margin: 40px 0px;">
    			<table width="398" border="0" align="center" cellpadding="0" style="margin-left: 0px;">
  					
  				  
				  <tr>
				    <td width="122" valign="top">
				    	<div align="left" style="font-weight: 600;">Contact</div>
				    </td>
				    <td valign="top" style="width: 25px;">:</td>
				    <td width="165" valign="top">{{ $user->phone }}</td>
				  </tr>
				  <tr>
				    <td valign="top">
				    	<div align="left" style="font-weight: 600;">E-mail</div>
				    </td>
				    <td valign="top" style="width: 25px;">:</td>
				    <td valign="top">{{ $user->email }}</td>
				  </tr>
				  <tr>
				    <td valign="top">
				    	<div align="left" style="font-weight: 600;">Address</div>
				    </td>
				    <td valign="top" style="width: 25px;">:</td>
				    <td valign="top">{{ $user->street_address }}</td>
				  </tr>
				  <tr>
				    <td valign="top">
				    	<div align="left" style="font-weight: 600;">Shipping address</div>
				    </td>
				    <td valign="top" style="width: 25px;">:</td>
				    <td valign="top">{{ $user->shipping_address }}</td>
				  </tr>
				  {{-- <tr>
				    <td valign="top">
				    	<div align="left">Contact No.</div>
				    </td>
				    <td style="width: 25px;">:</td>
				    <td valign="top">{{ $user-> }}</td>
				  </tr> --}}
				</table>
    		</div>
    	</div>
        
    </div>


@endsection
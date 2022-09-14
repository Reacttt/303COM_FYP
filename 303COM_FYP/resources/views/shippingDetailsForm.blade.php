<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>E Store - eCommerce HTML Template</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="eCommerce HTML Template Free Download" name="keywords">
   <meta content="eCommerce HTML Template Free Download" name="description">

   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link rel="stylesheet" href="<?php echo asset('css/header.css') ?>" type="text/css">
</head>

@include('header')

<body>

   @if ($shipping_details == NULL)
   <div class='container'>
      <form action="{{route('addShippingDetails')}}" method="post" class="form-group" enctype="multipart/form-data" align='center'>
         @csrf
         @php $user_id = DB::table('user')->where('user_username', Session::get('user_username'))->value('user_id'); @endphp
         <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}">

         <input type="text" class="form-control" placeholder="First Name" name="shipping_first_name" value="{{old('shipping_first_name')}}">
         @error('shipping_first_name')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Last Name" name="shipping_last_name" value="{{old('shipping_last_name')}}">
         @error('shipping_last_name')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Address Line 1" name="shipping_address_line1" value="{{old('shipping_address_line1')}}">
         @error('shipping_address_line1')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Address Line 2" name="shipping_address_line2" value="{{old('shipping_address_line2')}}">
         @error('shipping_address_line2')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="City" name="shipping_city" value="{{old('shipping_city')}}">
         @error('shipping_city')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Postal Code" name="shipping_postal_code" value="{{old('shipping_postal_code')}}">
         @error('shipping_postal_code')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Country" name="shipping_country" value="{{old('shipping_country')}}">
         @error('shipping_country')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <input type="text" class="form-control" placeholder="Contact" name="shipping_contact" value="{{old('shipping_contact')}}">
         @error('shipping_contact')
         <div class="error">
            {{ $message }}
         </div>
         @enderror
         <br>
         <button type='submit' class='registerbtn'>Add Shipping Details</button>
         <br>
      </form>
   </div>
   @else
   <p> {{ $shipping_details->shipping_address_line1 }} </p>
   @endif

</body>


@include('footer')

</html>
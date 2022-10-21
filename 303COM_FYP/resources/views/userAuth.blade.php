<!DOCTYPE html>
<html lang="en">

@php
// Check User is Authenticated
if(Session()->get('user_username') == NULL) {
Session()->put('alert', "Please login to your Admin account to proceed!");
header('location: http://127.0.0.1:8000/login');
die;
}
@endphp

</html>
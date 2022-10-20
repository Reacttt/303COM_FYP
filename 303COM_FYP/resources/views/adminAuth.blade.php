<!DOCTYPE html>
<html lang="en">

@php
// Check Admin is Authenticated
if(Session()->get('admin_username') == NULL) {
Session()->put('alert', "Please login to your Admin account to proceed!");
header('location: http://127.0.0.1:8000/loginAdmin');
die;
}
@endphp

</html>
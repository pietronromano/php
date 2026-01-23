<!-- Header: first part of our views -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- Variable that sets the page title, passed from the controller 
         Example: return view('header', ['title' => 'Home']) 
         If not sent, will show an error: "Undefined variable $title"
    -->
    <title> <?= $title ?> </title>
</head>

<body>
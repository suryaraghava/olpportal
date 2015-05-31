<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
             #updatePwd { width:400px;height:220px }
             #labelPwd { color:#0033cc;font-size: 16px;margin-top:2%;margin-bottom:2%; }
             #label {  margin-top:1%;margin-bottom:1%;}
             #labelInput { margin-bottom:2%; }
        </style>
        <script>
          function opendropdown(){
                $(".dropdown-menu").dropdown("toggle");
              }
        </script>
    </head>
    <body>
         <div id="updatePwd" style="">
             <div id="labelPwd" align="center" class="col-xs-12"><B> Change Password </B> </div>
             <div id="label" class="col-xs-12"><B> Password </B> </div>
             <div id="labelInput" class="col-xs-12">
                 <input id="input-Pwd"  type="password" class="form-control" placeholder="Enter password ... " onclick="opendropdown()"/>
             </div>
             <div  id="label" class="col-xs-12"><B> Re-enter Password </B> </div>
             <div  id="labelInput" class="col-xs-12">
                <input id="input-RePwd" type="password" class="form-control" placeholder="Enter Re-enter password ... "  onclick="opendropdown()"/>
             </div>
             <div  id="label" class="col-xs-12">
                 <button class="btn btn-danger pull-right">Reset Password</button>
             </div>
        </div>
    </body>
</html>

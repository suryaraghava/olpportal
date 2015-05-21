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
        <script>
            var g_hour;
            var g_min;
            var g_sec;
        function load()
        {
            var hour="00"; 
            var min="10";
            var sec="59";
            setInitialTime(hour,min, sec );
            setInterval( function() { document.getElementById("time").innerHTML=timeTest(); } , 1000);
        }
        function setInitialTime(hour,min, sec)
        {
            g_hour=hour;
            g_min=min;
            g_sec=sec;
        }
        
        function timeTest()
        {
            var viewTime=g_hour+":"+g_min+":"+g_sec;
          if(g_sec>0){
             g_sec=g_sec-1; 
             if(g_sec<=9) { viewTime=g_hour+":"+g_min+":"+'0'+g_sec; }
             if(g_sec==0) { g_min=g_min-1; viewTime=g_hour+":"+g_min+":"+g_sec; }
             else { viewTime=g_hour+":"+g_min+":"+g_sec; }
          }
          // var viewTime=g_hour+":"+g_min+":"+g_sec;
          
          return viewTime;
        }
        
        </script>
    </head>
    <body onload="load()">
        <span id="time"></span>
        <?php
        // put your code here
        ?>
    </body>
</html>

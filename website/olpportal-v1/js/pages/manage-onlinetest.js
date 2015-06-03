/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 var coursesList;
   
      function managecoursesload()
      {
          var result;
          $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        action : 'courseListOnly',
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                                   console.log(result);
                                   var res=JSON.parse(result);
          coursesList=res;
          viewLeftMenu1();
          
      }
      
      function viewLeftMenu1()
      {
          document.getElementById("leftMenuContainer1").style.display='block';
          document.getElementById("leftMenuContainer2").style.display='none';
          document.getElementById("leftMenuContainer3").style.display='none';
          document.getElementById("leftMenuContainer4").style.display='none';
          
          // Build Dynamic Course-List
          
          var courseListing=document.getElementById("view-courseName");
          var p_option = document.createElement("option");
			 p_option.id = "";
			p_option.text = "Select a Course";
			p_option.value = "";
			courseListing.add(p_option);
            var res=coursesList;
            for(var ind=0;ind<res.length;ind++)
           {
                var option = document.createElement("option");
			option.id = res[ind].courseName;
			option.text = res[ind].courseName;
			option.value = res[ind].courseName;
			courseListing.add(option);
               console.log("courseName : "+res[ind].courseName);
           }
            
          
          
      //    adminGetCourseList();
          
          
          $("#leftMenu-1").addClass("active");
          $("#leftMenu-2").removeClass("active");
          $("#leftMenu-3").removeClass("active");
          $("#leftMenu-4").removeClass("active");
      }
      
      function adminGetCourseList()
        {
            var result;
          $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.courses.php',
                                    data: { 
                                        action : 'courseListOnly',
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
                                   var res=JSON.parse(result);
                 
                 
                 
                 
               console.log("courses : "+res);
           
        }
      
      
      function viewLeftMenu2()
      {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='block';
          document.getElementById("leftMenuContainer3").style.display='none';
          document.getElementById("leftMenuContainer4").style.display='none';
          // Dynamic Mmenu
          
          var courseListing=document.getElementById("courseList");
          var p_option = document.createElement("option");
			 p_option.id = "";
			p_option.text = "Select a Course";
			p_option.value = "";
			courseListing.add(p_option);
            var res=coursesList;
            for(var ind=0;ind<res.length;ind++)
           {
                var option = document.createElement("option");
			option.id = res[ind].courseName;
			option.text = res[ind].courseName;
			option.value = res[ind].courseName;
			courseListing.add(option);
               console.log("courseName : "+res[ind].courseName);
           }
            
          
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").addClass("active");
          $("#leftMenu-3").removeClass("active");
          $("#leftMenu-4").removeClass("active");
      }
      
      
       function viewLeftMenu3()
       {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='none';
          document.getElementById("leftMenuContainer3").style.display='block';
          document.getElementById("leftMenuContainer4").style.display='none';
          
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").removeClass("active");
          $("#leftMenu-3").addClass("active");
          $("#leftMenu-4").removeClass("active");
       }
      
       function viewLeftMenu4()
       {
          document.getElementById("leftMenuContainer1").style.display='none';
          document.getElementById("leftMenuContainer2").style.display='none';
          document.getElementById("leftMenuContainer3").style.display='none';
          document.getElementById("leftMenuContainer4").style.display='block';
          
          $("#leftMenu-1").removeClass("active");
          $("#leftMenu-2").removeClass("active");
          $("#leftMenu-3").removeClass("active");
          $("#leftMenu-4").addClass("active");
       }
      
        function AddQuestionOnSubmit()
        {
            var courseList=document.getElementById("courseList").value;
            
            var test=[];
            var answer;
            var c_preTest=document.getElementById("C_PreTest");
            var c_postTest=document.getElementById("C_PostTest");
            
            var addQuestion=document.getElementById("AddQuestion");
            var t_option1=document.getElementById("T_Option1");
            var t_option2=document.getElementById("T_Option2");
            var t_option3=document.getElementById("T_Option3");
            var t_option4=document.getElementById("T_Option4");
            
            var c_option1=document.getElementById("C_Option1");
            var c_option2=document.getElementById("C_Option2");
            var c_option3=document.getElementById("C_Option3");
            var c_option4=document.getElementById("C_Option4");
            
            var act=document.getElementById("activeQuestion");
            var active='0';
            
            if(act.checked)
            {
                active='1';
            }
            
            if(c_preTest.checked)
            {
               test.push(c_preTest.value); 
            }
            if(c_postTest.checked)
            {
               test.push(c_postTest.value); 
            }
            
            if(c_option1.checked)
            {
               answer=t_option1.value;
            }
            if(c_option2.checked)
            {
               answer=t_option2.value;
            }
             if(c_option3.checked)
            {
               answer=t_option3.value;
            }
             if(c_option4.checked)
            {
               answer=t_option4.value;
            }
            
            console.log("courseList : "+courseList);
            console.log("test : "+test);
            console.log("addQuestion : "+addQuestion.value); 
            console.log("t_option1 : "+t_option1.value);
            console.log("t_option2 : "+t_option2.value);
            console.log("t_option3 : "+t_option3.value);
            console.log("t_option4 : "+t_option4.value);
            console.log("answer : "+answer);
            
            // AdminAddQuestions
            
             var result="";
                 $.ajax({type: "GET", 
                                    async: false,
                                    url: 'php/dac.questions.php',
                                    data: { 
                                        action : 'AdminAddQuestions',
                                        courseList : courseList,
                                        testList:test,
                                        addQuestion : addQuestion.value,
                                        t_option1:t_option1.value,
                                        t_option2 : t_option2.value,
                                        t_option3 : t_option3.value,
                                        t_option4 : t_option4.value,
                                        answer : answer,
                                        active : active
                                    },
                                    success: function(resp)
                                    {
                                          result=resp;
                                    }
                                   });
               console.log("Data : "+result);
            
            // Clear Fields
             c_preTest.checked=false;
             c_postTest.checked=false;
            
             addQuestion.value='';
             t_option1.value='';
             t_option2.value='';
             t_option3.value='';
             t_option4.value='';
            
             c_option1.checked=false;
             c_option2.checked=false;
             c_option3.checked=false;
             c_option4.checked=false;
            
            
            viewLeftMenu1();
        }
      
      
                 function viewExamination()
                    {
                        var courseName=document.getElementById("view-courseName");
                        var preTest=document.getElementById("view_C_PreTest");
                        var postTest=document.getElementById("view_C_PostTest");
                        
                        var test='';
                        if(preTest.checked)
                        {
                            test=preTest.value;
                        }
                        if(postTest.checked)
                        {
                            test=postTest.value;
                        }
                        
                        if(courseName.value.length>0)
                        {
                             console.log("courseName : "+courseName.value);
                             console.log("test : "+test);
                             
                             // Generate Dynamic Table
                             document.getElementById("leftMenuTable1").style.display='block';
                              var result="";
                                $.ajax({type: "GET", 
                                                    async: false,
                                                    url: 'php/dac.questions.php',
                                                    data: { 

                                                        course :courseName.value,
                                                        test:test,
                                                        action : 'viewQuestions'
                                                    },
                                                  success: function(resp)
                                                    {
                                                          result=resp;
                                                    }
                                                   });
                                        console.log("Res : "+result);
                                   
                                   var res=JSON.parse(result);
                                   
                                   
                                   
               var content='<table class="table table-responsiv table-bordered">';
                   content+='<thead>';
                   content+='<tr>';
                   content+='<th>S. No.</th>';
                   content+='<th>Test Type</th>';
                   content+='<th>Question</th>';
                   content+='<th>Option1</th>';
                   content+='<th>Option2</th>';
                   content+='<th>Option3</th>';
                   content+='<th>Option4</th>';
                   content+='<th>Answer</th>';
                   content+='<th>Active</th>';
                   content+='</tr>';
                   content+='</thead>';
                   content+='<tbody>';
                  
                  
                           
                                   for(var ind=0;ind<res.length;ind++)
                                   {
                                       
                                        content+='<tr>';
                                        content+='<td>'+(ind+1)+'</td>';
                                        content+='<td>'+res[ind].testType+'</td>';
                                        content+='<td>'+res[ind].question+'</td>';
                                        content+='<td>'+res[ind].option1+'</td>';
                                        content+='<td>'+res[ind].option2+'</td>';
                                        content+='<td>'+res[ind].option3+'</td>';
                                        content+='<td>'+res[ind].option4+'</td>';
                                        content+='<td>'+res[ind].answer+'</td>';
                                        content+='<td>'+res[ind].active+'</td>';
                                        content+='</tr>'
                                    
                                        
                                   }
                                  
                                  
                                  
                   content+='</tbody>';
                   content+='</table>';
                   content+='</div>';
                                   
                   
                   document.getElementById("leftMenuTable1").innerHTML=content;
                                   
                                   
                         
                        }
                        else
                        {
                            popupOpen();
                            document.getElementById("popcontent").innerHTML='<h4>Please Select a course to Manage Examination Questions </h4>';
                            
                            preTest.checked=false;
                            postTest.checked=false;
                        }
                        
                        
                    }
                    
                    
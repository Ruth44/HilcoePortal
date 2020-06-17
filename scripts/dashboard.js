var type=$(".TYPE").text();
$(Initialize);
async function Initialize(){
      $(".homee").removeClass("hide");
      $(".studentgrade").addClass("hide");
      $(".teachergrade").addClass("hide");
      $(".teacherass").addClass("hide");
      $(".studentass").addClass("hide");
      $(".teachercourse").addClass("hide");
      $(".studentcourse").addClass("hide");
  }
  $("#home").on("click",function(){
    $(".homee").removeClass("hide");
      $(".studentgrade").addClass("hide");
      $(".teachergrade").addClass("hide");
      $(".teacherass").addClass("hide");
      $(".studentass").addClass("hide");
      $(".teachercourse").addClass("hide");
      $(".studentcourse").addClass("hide");
  })
  $("#course").on("click",function(){
    
      $(".homee").addClass("hide");
      $(".studentgrade").addClass("hide");
      $(".teachergrade").addClass("hide");
      $(".teacherass").addClass("hide");
      $(".studentass").addClass("hide");
      if(type=="Student"){
        $(".teachercourse").addClass("hide");
        $(".studentcourse").removeClass("hide");
      } else if(type=="Teacher"){
      $(".teachercourse").removeClass("hide");
      $(".studentcourse").addClass("hide");
      }
  })
  $("#assignment").on("click",function(){
    var type=$(".TYPE").text();
      $(".homee").addClass("hide");
      $(".studentgrade").addClass("hide");
      $(".teachergrade").addClass("hide");
      $(".teachercourse").addClass("hide");
      $(".studentcourse").addClass("hide");
      if(type=="Student"){
        $(".teacherass").addClass("hide");
        $(".studentass").removeClass("hide");
      } else if(type=="Teacher"){
        $(".teacherass").removeClass("hide");
        $(".studentass").addClass("hide");

      }
  })
  $("#grade").on("click",function(){
    var type=$(".TYPE").text();
      $(".homee").addClass("hide");
    
      $(".teacherass").addClass("hide");
      $(".studentass").addClass("hide");
      $(".teachercourse").addClass("hide");
      $(".studentcourse").addClass("hide");
      if(type=="Student"){
        $(".studentgrade").removeClass("hide");
        $(".teachergrade").addClass("hide");
       
      } else if(type=="Teacher"){
        $(".studentgrade").addClass("hide");
        $(".teachergrade").removeClass("hide");
     
      }
  })
  if($("#CouTeaStatus").text()=="success"){
      alert();
  }



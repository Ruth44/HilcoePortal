var type=$(".TYPE").text();
$(Initialize);
async function Initialize(){
  if(type=="Student"){
    $(".teachercourse").addClass("hide");
    $(".teachergrade").addClass("hide");
    $(".teacherass").addClass("hide");
    $(".studentcourse").removeClass("hide");
    $(".studentgrade").removeClass("hide"); 
    $(".studentass").removeClass("hide");
  } else if(type=="Teacher"){
    $(".teachercourse").removeClass("hide");
    $(".teachergrade").removeClass("hide");
    $(".teacherass").removeClass("hide");
    $(".studentcourse").addClass("hide");
    $(".studentgrade").addClass("hide"); 
    $(".studentass").addClass("hide");
  }
}
  
 



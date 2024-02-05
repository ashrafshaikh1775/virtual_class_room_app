$(document).ready(function(){
    $("#submit1").click(function(e){
        e.preventDefault();
      window.location.href ="../php/manage_stud.php";
    });
    $("#submit2").click(function(e){
        e.preventDefault();
      window.location.href ="../php/manage_tutors.php";
    });
    // $("#submit1").click(function(e){
    //     e.preventDefault();
    //   window.location.href ="../php/manage_stud.php";
    // });
});
$(function(){
  
  $(".dropdown-dim a").click(function(){
    
    $("#dropdown-dim-val").text($(this).text());
     $("#dropdown-dim-val").val($(this).text());
  });

     $(".dropdown-type a").click(function(){
    
    $("#dropdown-type-val").text($(this).text());
     $("#dropdown-type-val").val($(this).text());
  });
    
});
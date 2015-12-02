$('#btnPrivate').click(function () {
     $("i",this).toggleClass("fa-lock fa-unlock");
     if($('#inputPrivate').val() == 'true'){
         $('#inputPrivate').val() == 'false';
     }else{
         $('#inputPrivate').val() == 'true';
     }
}); 
$('#btnWiki').click(function () {
     $("i",this).toggleClass("fa-comments fa-times");
     if($('#inputWiki').val() == 'true'){
         $('#inputWiki').val() == 'false';
     }else{
         $('#inputWiki').val() == 'true';
     }
}); 
$('#btnDwn').click(function () {
     $("i",this).toggleClass("fa-download fa-times");
     if($('#inputDown').val() == 'true'){
         $('#inputDown').val() == 'false';
     }else{
         $('#inputDown').val() == 'true';
     }
}); 

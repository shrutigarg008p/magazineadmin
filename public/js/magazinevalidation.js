$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        if(inputValue == 'pdf'){
            $("#filepdf").attr("required", "true");
            $("#fileepub").prop('required',false);
             $("#epub_description").prop('required',false);
            $("#xml_description").prop('required',false);
        }
        if(inputValue == 'epub'){
            $("#fileepub").attr("required", "true");
             $("#epub_description").attr("required", "true");
            $("#filepdf").prop('required',false);
            $("#xml_description").prop('required',false);
        }
        if(inputValue == 'xml'){
            $("#xml_description").attr("required", "true");
            $("#filepdf").prop('required',false);
              $("#fileepub").prop('required',false);
             $("#epub_description").prop('required',false);        
        }
        if(inputValue == 'grid'){
            $("#filepdf").prop('required',false);
            $("#fileepub").prop('required',false);
        }
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });


});

$(document).on('click','.pdfval',function(){
 $('span#pdfepubval strong').css('display','none'); 
})
$(document).on('click','.epubval',function(){
 $('span#pdfepubval strong').css('display','none'); 
   
})



    function EpubFileType( fileName, fileTypes ) {
    if (!fileName) return;

    dots = fileName.split(".")
    //get the part AFTER the LAST period.
    fileType = "." + dots[dots.length-1];

    return (fileTypes.join(".").indexOf(fileType) != -1) ?
    $('#fileepub').val()+$('#err_epub').html('') :
    // alert("Please only upload files that end in types: \n\n"
    //  + (fileTypes.join(" .")) + 
    //  "\n\nPlease select a new file and try again.")+
     $('#fileepub').val('')+$('#err_epub').html('please upload epub only');

    }
    function PdfFileType( fileName, fileTypes ) {
    if (!fileName) return;

    dots = fileName.split(".")
    //get the part AFTER the LAST period.
    fileType = "." + dots[dots.length-1];

    return (fileTypes.join(".").indexOf(fileType) != -1) ?
    $('#filepdf').val()+$('#err_pdf').html('') :
    // alert("Please only upload files that end in types: \n\n"
    //  + (fileTypes.join(" .")) + 
    //  "\n\nPlease select a new file and try again.")+
     $('#filepdf').val('')+$('#err_pdf').html('please upload pdf file only');

    }

 

    $('#form').on('submit', function(){
     //    if ($('input[name="file_type"]:checked').length == 0) {
     //    $('#radioVal').css('display','block');
     //     $('#radioVal').html("Please Select One");
     //     return false; 
     // }else{
     //    $('#radioVal').css('display','none');
     // } 
        $('#err_epub').html('');
         $('#err_pdf').html('');

    });


/*
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var pdf_val=$("#filepdf").val();
        var epub_val=$("#fileepub").val();
        if(inputValue == 'pdf'){
             if(pdf_val == ""){
                $('#err_pdf').html("Please Upload File");
                  // return false;
                  $('#filepdf').change( function(){
               var upld_val = $(this).val() ;
               if(upld_val !=''){
                  // alert('shiv');
                  $("#err_pdf").html('');

               }else{
                  $("#err_pdf").html('Please Upload File');
                  return false;
               }
            });
            }
            // $("#filepdf").attr("required", "true");
            $("#fileepub").prop('required',false);
             $("#epub_description").prop('required',false);
            $("#xml_description").prop('required',false);    
        }
        if(inputValue == 'epub'){
            $("#fileepub").attr("required", "true");
             $("#epub_description").attr("required", "true");
            $("#filepdf").prop('required',false);
            $("#xml_description").prop('required',false);

        }
        if(inputValue == 'xml'){
            $("#xml_description").attr("required", "true");
            $("#filepdf").prop('required',false);
              $("#fileepub").prop('required',false);
             $("#epub_description").prop('required',false);
        }
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
*/
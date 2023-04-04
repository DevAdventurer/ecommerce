$('.no-more').hide();
var paginate = 1;

var singleMediaCall = document.getElementById('mediafiles')
var bsOffcanvasSingle = new bootstrap.Offcanvas(singleMediaCall)



function loadMediaFiles(element, openType) {

    bsOffcanvasSingle.show();
    //if($('#mediafiles-list li').length == 0){
        mediafiles(paginate, openType);
    //}

}



function mediafiles(paginate, openType, search='') {
    

    $.ajax({
        url: '/admin/media/get/single?opentype='+openType+'&search='+search+'&page=' + paginate,
        type: 'get',
        datatype: 'html',
        beforeSend: function() {
            $('#load-more-mediafiles').text('Loading...');
        }
    })
    .done(function(data) {
       
        $("#getdata").empty().html(data);
           
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      alert('Something went wrong.');
  });
}



$("#mediafilesearch").keyup(function(){
    var type = $('.select-mediatype').attr('mediatype');
    var search = $(this).val();
    if(search.length > 1){
        mediafiles(1,type,search)
    }else{
        mediafiles(1, type)
    }
});




function selectSingleFile() {
    $(".media-file-value").html('');
    $(".media-file").html('');
    var checkboxes = document.getElementsByName('media[]');

    var result = "";
    var image = "";

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result += '<input type="hidden" name="file[]" value="'+checkboxes[i].value+'" class="fileid'+checkboxes[i].value+'">';
            var myimage = $("#getmedia-"+checkboxes[i].value).html();
            image += '<div  class="file-container d-inline-block fileid'+checkboxes[i].value+'"><span data-id="'+checkboxes[i].value+'" class="remove-file">&#x2715;</span>'+myimage+"</div>";
        }
    }
    bsOffcanvasSingle.hide();
    $(".media-file-value").append(result);
    $(".media-file").append(image);

}

$("body").on("click", ".remove-file", function(){
    var image_id = $(this).attr("data-id");
    $(".fileid"+image_id).remove();
    $("#mediaid"+image_id+":checked").prop('checked',false);
});







$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            mediafiles(page);
        }
    }
});


$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();


        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];


        mediafiles(page);
    });
});

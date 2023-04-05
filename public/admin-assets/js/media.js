$('.no-more').hide();
var paginate = 1;

var singleMediaCall = document.getElementById('mediafiles')
const bsOffcanvasSingle = new bootstrap.Offcanvas(singleMediaCall)

singleMediaCall.addEventListener('hidden.bs.offcanvas', function () {
  $('.media-area').removeClass('active');
})
function loadMediaFiles(element, openType) {

    bsOffcanvasSingle.show();
    mediafiles(paginate, openType);
    element.parent().addClass('active')

}



function mediafiles(paginate, search='') {
    
    var type = $('.select-mediatype').attr('mediatype');

    $.ajax({
        url: '/admin/media/get/single?opentype='+type+'&search='+search+'&page=' + paginate,
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
        mediafiles(1,search)
    }else{
        mediafiles(1)
    }
});




function selectSingleFile() {
    $(".media-area.active .media-file-value").html('');
    $(".media-area.active .media-file").html('');

    var file_name = $(".media-area.active").attr('file-name');
    //alert(file_name);

    var checkboxes = document.getElementsByName('media[]');

    var result = "";
    var image = "";

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            result += '<input type="hidden" name="'+file_name+'[]" value="'+checkboxes[i].value+'" class="fileid'+checkboxes[i].value+'">';
            var myimage = $("#getmedia-"+checkboxes[i].value).html();
            image += '<div  class="file-container d-inline-block fileid'+checkboxes[i].value+'"><span data-id="'+checkboxes[i].value+'" class="remove-file">&#x2715;</span>'+myimage+"</div>";
        }
    }
    
    $(".media-area.active .media-file-value").append(result);
    $(".media-area.active .media-file").append(image);

    bsOffcanvasSingle.hide();
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

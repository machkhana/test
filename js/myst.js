$(document).ready(function () {
    $('.infosideform').hide();
    $('#add').click(function () {
        $('.infosideform').show();
        $('#addbutton').show();
        $('#editbutton').hide();
        $('#title').val('');
        $('#text').val('');
        $('#image').remove();
    })
    $('.edit').click(function () {
        $('.infosideform').show();
        $('#addbutton').hide();
        $('#editbutton').show();
        $('#image').remove();
        var infoid=$(this).data('id');
        var title=$(this).data('title');
        var text = $(this).data('text');
        var image = $(this).data('image');
        $('#title').val(title);
        $('#text').val(text);
        $('.imageside').append(
            "<div id='image' class='mt-1'>" +
            "<img src='images/"+ image +"' width='50'/> თუ გნებავთ შეცვალოთ აირჩიეთ, თუ არა დატოვეთ ცარიელი " +
            "<input name='id' type='hidden' value='"+ infoid +"'/>"+
            "</div>"
        );
    })
    $('#close').click(function () {
        $('.infosideform').hide();
        $('#title').val('');
        $('#text').val('');
        $('#image').remove();
    })
    $(".removeinfo").click(function(){
        if(confirm("გსურთ წაიშალოს ?")){
            var id = $(this).attr('id');
            $.ajax({
                type:'POST',
                url:'',
                data:'delinfo='+id,
                success:function(data) {
                    if(data) {
                        $("#infoid-"+ id).remove();
                    }
                }
            });
        }
    });

})
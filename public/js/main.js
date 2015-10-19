$(function() {

    $('.btnAjax').on("click", function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/movies",
            data: $(this).closest('form').serialize()
        }).done(function(response){
            console.log(response);
            if ( ! response.success) {
                $('.results')
                    .removeClass('hide')
                    .removeClass('alert-success')
                    .addClass('alert-danger')
                    .html('Error there is no data to display.');
            } else {
                $('.error').html('');
                var tr = $('<tr/>');
                tr.append('<td>'+response.data.name+'</td>');
                tr.append('<td>'+response.data.year+'</td>');
                tr.append('<td>'+response.data.director+'</td>');
                $('#movies-table tbody').append(tr);
                $('.results')
                    .removeClass('hide')
                    .removeClass('alert-danger')
                    .addClass('alert-success')
                    .html(response.message);
            }
         }).fail(function( jqXHR, textStatus, errorThrown ){
            console.log(jqXHR);
            if (jqXHR.responseJSON.name) {
                $('.error-name').html(jqXHR.responseJSON.name[0]);
            } else {
                $('.error-name').html('');
            }

            if (jqXHR.responseJSON.year) {
                $('.error-year').html(jqXHR.responseJSON.year[0]);
            } else {
                $('.error-year').html('');
            }

            if (jqXHR.responseJSON.director) {
                $('.error-director').html(jqXHR.responseJSON.director[0]);
            } else {
                $('.error-director').html('');
            }

        });
     });

    $('.ajax-directors').on('click', function(e){
        e.preventDefault();

         $.ajax({
            type: "GET",
            url: "/directors/details/" + $(this).data('id'),
        }).done(function(response){
            console.log(response);
            $('.modal-body > .table tbody').html('');
            if (response) {
                $.each(response.movies, function(i, item){
                    var tr = $('<tr/>');
                    tr.append('<td>'+item.name+'</td>');
                    tr.append('<td>'+item.year_of_release+'</td>');
                    $('.modal-body > .table tbody').append(tr);
                });
                $('#myModal').modal('show');
            }
         }).fail(function( jqXHR, textStatus, errorThrown ){
            console.log(jqXHR);
        });
    });

    $('.ajax-actors').on('click', function(e){
        e.preventDefault();

         $.ajax({
            type: "GET",
            url: "/actors/details/" + $(this).data('id'),
        }).done(function(response){
            console.log(response);
            $('.modal-body > .table tbody').html('');
            if (response) {
                $.each(response.movies, function(i, item){
                    var tr = $('<tr/>');
                    tr.append('<td>'+item.name+'</td>');
                    tr.append('<td>'+item.year_of_release+'</td>');
                    $('.modal-body > .table tbody').append(tr);
                });
                $('#myModal').modal('show');
            }
         }).fail(function( jqXHR, textStatus, errorThrown ){
            console.log(jqXHR);
        });
    });

    $('#director-search').autocomplete({
        serviceUrl: 'directors/search/',
        dataType: 'json',
        transformResult: function(response) {
            return {
                suggestions: $.map(response, function(dataItem) {
                    return { value: dataItem.first_name +' '+ dataItem.last_name, data: dataItem.id };
                })
            }
        },
        onSelect: function (suggestion) {
            $('#director_id').val(suggestion.data);
        }
    });
});

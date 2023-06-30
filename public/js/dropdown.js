   $('#departament').on('change', function(e){
        console.log(e.target.value);
        var id_departament = e.target.value;
        
        $.get('information/create/ajax-state?id_departament=' + id_departament, function(data) {
            console.log(data);
            $('#municipality').empty();
            $.each(data, function(index,subCatObj){
                $('#municipality').append(''+subCatObj.municipality+'');
                $("#municipality").append('<option value='+subCatObj.id_municipality+'}> '+subCatObj.municipality+' </option>');
            });
        });
    });
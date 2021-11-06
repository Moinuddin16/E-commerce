
    $('#academy_id').on('change', function(){

        var academyID = $(this).val();
       
        if(academyID){
            $.ajax({
                type:'GET',
                url:`${baseUrl}/admin/get-employee-category-list/${academyID}`,
                success:function(res){
                    if(res){
                        $('#employee_category_id').empty();
                        $('#employee_category_id').append('<option value="">Choose...</option>');
                        $.each(res, function(key, value){
                            $('#employee_category_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }else{
                        $('#employee_category_id').empty();
                    }
                }
            });
        }
       
    });

     


    
      


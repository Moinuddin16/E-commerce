var baseUrl = $('meta[name=baseUrl]').attr("content");
var csrfToken = $('meta[name=csrf-token]').attr("content");
var currency = $('meta[name=currency]').attr("content");

// change fee status
changeFeesStatus = (id, status) => {
    
    successCallback = (data) => {
        toastr.success(data.message);
    }
    
    errorCallback = (data) => {
        toastr.error(data.message);
    }

    makeAPostAjaxRequest(baseUrl + '/admin/fees/change-status', { _token:csrfToken , id: id, status: status }, successCallback, errorCallback);  
}

// change student status
changeStudentStatus = (id, status) => {

    
    successCallback = (data) => {
        toastr.success(data.message);
    }
    
    errorCallback = (data) => {
        toastr.error(data.message);
    }

    makeAPostAjaxRequest(baseUrl + '/admin/student/change-status', { _token:csrfToken , id: id, status: status }, successCallback, errorCallback);  
}

filterTable = (otherFilters) => {
    let FilterItem = [];
    otherFilters.forEach(element => {
    let getValue = $('#filter_' + element).val();
     let FilterItemValue = [{element,getValue }];
     FilterItem.push(FilterItemValue);
    })

    successCallback = (data) => {
       $('#inner_div').html("");
       $('#inner_div').html(data);
    }
    
    errorCallback = (data) => {
       
    }
    makeAPostAjaxRequest(baseUrl + '/admin/filter-fess-setup',{_token:csrfToken ,'data':JSON.stringify(FilterItem)}, successCallback, errorCallback); 
}

filterGenerateFeeBookTable = (otherFilters) => {
    let FilterItem = [];
    otherFilters.forEach(element => {
    let getValue = $('#filter_' + element).val();
     let FilterItemValue = [{element,getValue }];
     FilterItem.push(FilterItemValue);
    })

    successCallback = (data) => {
       $('#inner_div').html("");
       $('#inner_div').html(data);
    }
    
    errorCallback = (data) => {
       
    }
    makeAPostAjaxRequest(baseUrl + '/admin/filter-generate-fess-book',{_token:csrfToken ,'data':JSON.stringify(FilterItem)}, successCallback, errorCallback); 
}

getEmployeeInformation = (otherFilters) => {
  
    let FilterItem = [];
    otherFilters.forEach(element => {
    let getValue = $('#filter_' + element).val();
     let FilterItemValue = [{element,getValue }];
     FilterItem.push(FilterItemValue);
    })


    successCallback = (data) => {
        $('#employee_id').find('option:not(:first)').remove();
        data.forEach(element => {
            $('#employee_id').append('<option  value="'+element.employee_name+'">'+element.employee_name+'</option>');
        });
        
     }
     
     errorCallback = (data) => {
        
     }
     let ignore = [];
    makeAPostAjaxRequest(baseUrl + '/admin/get-employee-list',{_token:csrfToken ,'data':JSON.stringify(FilterItem),'ignore':JSON.stringify(ignore)}, successCallback, errorCallback); 
    
}


   

makeAPostAjaxRequest = (url, data, successCallback, errorCallback) => {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (data) {
            successCallback(data);
        },
        error: function (data) {
            errorCallback(data);
        }
    });
}

makeAGetAjaxRequest = (url, data, successCallback, errorCallback) => {
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (data) {
            successCallback(data);
        },
        error: function (data) {
            errorCallback(data);
        }
    });
}

showEmployeeEducationModel = (id) => {
    successCallback = (data) => {
       
        $("#show-education-model").html('');
        $("#show-education-model").html(data);
        $('#exampleModal').modal('show');
    }
    
    errorCallback = (data) => {       
    }

    makeAGetAjaxRequest(baseUrl + '/admin/get-emplpyee-education/'+id,'', successCallback, errorCallback); 

}
showProductDetailsModal = (id) => {
  
    successCallback = (data) => {
        $("#show-details-model").html('');
        $("#show-details-model").html(data);
        $('#show-prodcut-details-modal').modal('show');
    }
    
    errorCallback = (data) => {       
    }

    makeAGetAjaxRequest(baseUrl + '/admin/product-deatils/'+id,'', successCallback, errorCallback); 
 

}
showProductModal = (id) => {
  
    successCallback = (data) => {
        $("#show-product-model").html('');
        $("#show-product-model").html(data);
        $('#exampleModal2').modal('show');
    }
    
    errorCallback = (data) => {       
    }

    makeAGetAjaxRequest(baseUrl + '/admin/product/'+id+'/edit','', successCallback, errorCallback); 
 

}

deleteProduct  = (id) => {
    successCallback = (data) => {
        if(data.status == 'success'){
            toastr.success(data.message);
            $('#datatable').DataTable().ajax.reload();
        }
    }
    
    errorCallback = (data) => {       
    }
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
               
                makeAGetAjaxRequest(baseUrl + '/admin/product/delete-data/'+id,'', successCallback, errorCallback); 
            }
        })

}
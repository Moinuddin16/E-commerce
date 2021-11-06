<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            @if(isset($employeeInformation))
            <form action="{{ route('employee-info.update',$employeeInformation->id) }}" id="employee_information_update_form" method="POST" enctype="multipart/form-data">
            @endif
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-body">
                  @csrf
               
                    @if(isset($employeeInformation))
                    <input type="hidden" id="employee_information_id" name="employee_information_id" value="{{$employeeInformation->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employee_code">Employee Code:<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="employee_code" maxlength="6" name="employee_code" 
                                    placeholder="Enter Employee Code" value="{{ $employeeInformation->employee_code }}" required>
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="employee_name">Employee Name:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name"
                                    placeholder="Enter Employee Name" value="{{ $employeeInformation->employee_name }}" required>
                              
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="academy_id">Academy:<span class="text-danger">*</span> </label>
                                <select id="academy_id" class="form-control" name="academy_id" required> 
                                    <option value="">Choose...</option>
                                    @if (isset($academies))
                                        @foreach ($academies as $academy)
                                            <option value="{{ $academy->id }}"
                                                {{ currentSelectedItem($academy->id,$employeeInformation->academy_id ) }}>
                                                {{ $academy->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                             
                            </div>
                            <div class="form-group col-md-6">
                                <label for="employee_category_id">Employee Categories:<span class="text-danger">*</span> </label>
                                <select id="employee_category_id" class="form-control" name="employee_category_id" required>
                                    <option value="">Choose...</option>
                                    @if (isset($employeeCategories))
                                        @foreach ($employeeCategories as $employeeCategory)
                                            <option value="{{ $employeeCategory->id }}"
                                                {{ currentSelectedItem($employeeCategory->id,$employeeInformation->employee_category_id ) }}>
                                                {{ $employeeCategory->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                              
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department_id">Department: </label>
                                <select id="department_id" class="form-control" name="department_id" >
                                    <option value="">Choose...</option>
                                    @if (isset($departments))
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ currentSelectedItem($department->id, $employeeInformation->department_id) }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('department_id'))
                                    <small class="text-danger">{{ $errors->first('department_id') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="designation_id">Designation:<span class="text-danger">*</span> </label>
                                <select id="designation_id" class="form-control" name="designation_id" required>
                                    <option value="">Choose...</option>
                                    @if (isset($designations))
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ currentSelectedItem($designation->id, $employeeInformation->designation_id) }}>
                                            {{ $designation->name }}
                                        </option>
                                    @endforeach
                                @endif
                                </select>
                            
                            </div>
                    
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="father_name">Father’s Name:<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="father_name" name="father_name" 
                                    placeholder="Enter Father’s Name" value="{{$employeeInformation->father_name }}" required>
                           
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mother_name">Mother’s Name:<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name"
                                    placeholder="Enter Mother’s Name" value="{{ $employeeInformation->mother_name }}" required>
                       
                            </div>
                        </div>
              
                        <div class="form-row ">
                            <div class="form-group  col-md-6">
                                <label for="gender">Gender:<span class="text-danger">*</span> </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" @if($employeeInformation->gender == 'Male') checked @endif >
                                    <label class="form-check-label" for="gridRadios1">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female"  @if($employeeInformation->gender == 'Female') checked @endif>
                                    <label class="form-check-label " for="gridRadios2">
                                      Female
                                    </label>
                                  </div>
                             
                            </div>
                            <div class="form-group col-md-6 date">
                                <label for="date_of_birth">Date of Birth: </label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    value="{{$employeeInformation->date_of_birth}}">
                               
                            </div>
                         
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nationality">Nationality: </label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    placeholder="Enter Nationality" value="{{ $employeeInformation->nationality }}">
  
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photo">Photo:<span class="text-danger">*</span> </label>
                                <input type="file"  class="form-control" id="photo" name="photo"
                                placeholder="Enter Nationality" value="{{$employeeInformation->photo}}" accept="image/*" @if(!isset($employeeInformation->photo)) {{'required'}}  @endif>
                             
                            </div>
                     
                        </div>
                        
                      

                    


                                                  
                    @endif


                 
                
                    
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).ready(function(){
            makeVliadation($('#employee_information_update_form'));
        });

        function makeVliadation(form)
        {
            $(form).validate({
                
                rules: {
                    employee_code: {
                        required: true,
                        minlength: 6,
                        maxlength: 6,
                        remote: {url: `${baseUrl}/admin/validation/checkUserName`, type : "post",data: {_token:csrfToken,employee_information_id:$("#employee_information_id").val()} }
                    },
                    photo: {
                      
                        filesize: 2000000,
                    },
                    'passing_year[]':{
                        required: true, 
                    },
                    'result[]':{
                        required: true, 
                    },
                    'major_subject[]':{
                        required: true, 
                    },
                    'academic_degree[]':{
                        required: true, 
                    },
                    
                },
                messages: {
                    employee_code: {
                    
                        minlength: "Employee code must be at least 6 characters long",
                        maxlength: "Employee code can not be more than 6 characters long",
                        remote: "Employee code must be unique,"
                    }, 
                    photo:{
                        filesize:"File size must be less than 2 mb.",
                    
                    }

                },
            });
            $.validator.addMethod('filesize', function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param)
            }, 'File size must be less than {0}');

        }
        $(document).on('submit', '#employee_information_update_form', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            formData =  $(this)[0];
            formData =  new FormData(formData);
            formData.append('photo', $('input[type=file]')[0].files[0]);
            formData.append('_token',csrfToken);
            if($(this).valid()) {
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': csrfToken
                //     }
                // });
                
                $.ajax({
                    url: $(this).attr('action'),
                    type:  $(this).attr('method'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        if(data.status == 'success'){
                            toastr.success(data.message);
                            $('#exampleModal2').modal('hide');
                            $('#employee_education_form')[0].reset();
                            $('#datatable').DataTable().ajax.reload();
                        }else{
                            toastr.error("Something went wrong");
                        }
                    },
                    error: function(data){
                        var errors = data.responseJSON;
                        if(errors.errors){
                            toastr.error(errors.errors);
                        }
                    }
                });
            }
        });
    });
</script>
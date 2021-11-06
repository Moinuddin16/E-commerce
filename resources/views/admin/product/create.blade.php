@extends('admin.master')
@section('title', 'Add Employee Info')
@section('main-content')

<style>
    .error{
        color:red;
    }
</style>
 
    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="examples" class="mb-4">
                        <h2>Add Employee Info</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('employee-info.store') }}" id="employee_info_form" method="POST" enctype="multipart/form-data">
                                @csrf
                             
                             
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="employee_code">Employee Code:<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="employee_code" maxlength="6" name="employee_code" 
                                            placeholder="Enter Employee Code" value="{{ old('employee_code') }}" required>
                                       
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="employee_name">Employee Name:<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="employee_name" name="employee_name"
                                            placeholder="Enter Employee Name" value="{{ old('employee_name') }}" required>
                                      
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
                                                        {{ currentSelectedItem($academy->id, old('academy_id')) }}>
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
                                        </select>
                                      
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="department_id">Department: </label>
                                        <select id="department_id" class="form-control" name="department_id" >
                                            <option value="">Choose...</option>
                                            @if (isset($departments))
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ currentSelectedItem($department->id, old('department_id')) }}>
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
                                                    {{ currentSelectedItem($designation->id, old('designation')) }}>
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
                                            placeholder="Enter Father’s Name" value="{{ old('father_name') }}" required>
                                   
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mother_name">Mother’s Name:<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name"
                                            placeholder="Enter Mother’s Name" value="{{ old('mother_name') }}" required>
                               
                                    </div>
                                </div>
                      
                                <div class="form-row ">
                                    <div class="form-group  col-md-6">
                                        <label for="gender">Gender:<span class="text-danger">*</span> </label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked >
                                            <label class="form-check-label" for="gridRadios1">
                                              Male
                                            </label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                                            <label class="form-check-label " for="gridRadios2">
                                              Female
                                            </label>
                                          </div>
                                     
                                    </div>
                                    <div class="form-group col-md-6 date">
                                        <label for="date_of_birth">Date of Birth: </label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}">
                                       
                                    </div>
                                 
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nationality">Nationality: </label>
                                        <input type="text" class="form-control" id="nationality" name="nationality"
                                            placeholder="Enter Nationality" value="{{ old('nationality') }}">
                                        @if ($errors->has('nationality'))
                                            <small class="text-danger">{{ $errors->first('nationality') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="photo">Photo:<span class="text-danger">*</span> </label>
                                        <input type="file"  class="form-control" id="photo" name="photo"
                                        placeholder="Enter Nationality" value="{{ old('photo') }}" accept="image/*" required>
                                     
                                    </div>
                             
                                </div>
                                
                                <hr>
                                <label class="mb-3 " for="">Education</label>
                                <div class="increment">
                                    <input type="hidden" value="0" id="increment_education">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="academic_degree">Academic Degree:<span class="text-danger">*</span> </label>
                                            <select id="academic_degree" class="form-control" name="academic_degree[]" required>
                                                <option value="">Choose...</option>
                                                @if (isset($academicDegrees))
                                                @foreach ($academicDegrees as $academicDegree)
                                                    <option value="{{ $academicDegree->id }}"
                                                        {{ currentSelectedItem($academicDegree->id, old('academic_degree')) }}>
                                                        {{ $academicDegree->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                            </select>
                                           
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="board">Board/University:<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="board" name="board[]"
                                                placeholder="Enter Board/University" value="{{ old('board') }}" required>
                                         
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="major_subject">Major Subject:<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="major_subject" name="major_subject[]"
                                                placeholder="Enter Major Subject" value="{{ old('major_subject') }}" required>
                                      
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="result">Result:<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="result" name="result[]"
                                                placeholder="Enter Result" value="{{ old('result') }}" required>
                                           
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="passing_year">Passing Year:<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="passing_year" name="passing_year[]"
                                                placeholder="Enter Passing Year" value="{{ old('passing_year') }}" required>
                                           
                                        </div>
                                 
                                    </div>                                         
                                </div>
                                <div class="float-right">
                                        <button class="btn add-education btn-success ml-1 mb-1" type="button"><i class="fa fa-plus"></i></button>
                                </div>

                                {{-- <div class="clone d-none">
                                 
                                </div> --}}


                                <div class="form-row">
                               
                                    <div class="col-lg-12 text-right">             
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

  
    <script type="text/javascript">
        $(document).ready(function() {
           
            $(".add-education").click(function(){ 
                increment_education = $('#increment_education').val();
              var html = 
                                `   <div class="new" >
                                    <hr>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="academic_degree_${increment_education}">Academic Degree:<span class="text-danger">*</span> </label>
                                                <select id="academic_degree_${increment_education}" class="form-control required" name="academic_degree[]" required>
                                                    <option value="">Choose...</option>
                                                    @if (isset($academicDegrees))
                                                    @foreach ($academicDegrees as $academicDegree)
                                                        <option value="{{ $academicDegree->id }}">
                                                            {{ $academicDegree->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                </select>
                                          
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="board_${increment_education}">Board/University:<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control required" id="board_${increment_education}" name="board[]"
                                                    placeholder="Enter Board/University"required>
                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="major_subject_${increment_education}">Major Subject:<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control required" id="major_subject_${increment_education}" name="major_subject[]"
                                                    placeholder="Enter Major Subject"  required>
                                      
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="result_${increment_education}">Result:<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control required" id="result_${increment_education}" name="result[]"
                                                    placeholder="Enter Result" required>
                                       
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="passing_year_${increment_education}">Passing Year:<span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control " id="passing_year_${increment_education}" name="passing_year[]"
                                                    placeholder="Enter Passing Year" required>
                                       
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="float-right">
                                                    <button class="btn btn-danger remove-education ml-1 mb-1" style="margin-top: 25px" type="button"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                     
                                        </div>    	
                                       
                                    </div>
              `;
              $(".increment").append(html);
             $('#increment_education').val(parseInt(increment_education) + 1);
              
            });
          
          
            $("body").on("click",".remove-education",function(){ 
            $(this).parents(".new").remove();
          });
      
          
        });

        $(document).ready(function(){
            makeVliadation($("#employee_info_form"))
          
            $(document).on('submit','#employee_info_form',function(e){
                e.preventDefault();
                form = $(this);
                if($(this).valid()) {
                    Swal.fire({
                        title: 'Do you want to Save this form?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        denyButtonText: `No`,
                    }).then((result) => {
                    
                        if (result.isConfirmed) {
                        Swal.fire('Saved!', '', 'success')
                            
                        formData =  $(form)[0];
                        formData =  new FormData(formData);
                        formData.append('photo', $('input[type=file]')[0].files[0]);
                    
                        $.ajax({
                            url: `${baseUrl}/admin/employee-info`,
                            method: "POST",
                            contentType: false,
                            processData: false, 
                            data: formData,
                            success: function(response) {
                                    switch(response.alert_type){
                                        case 'info':
                                        toastr.info(response.message);
                                        break;
                                    case 'success':
                                        toastr.success(response.message);
                                        break;
                                    case 'warning':
                                        toastr.warning(response.message);
                                        break;
                                    case 'error':
                                        toastr.error(response.message);
                                        break;
                                }
                                window.location.href = `${baseUrl}/admin/employee-info`;
                            }            
                        });
                        } else if (result.isDenied) {
                        Swal.fire('Changes are not Submit', '', 'info')
                        }
                    })
                
                }
            });
    
            // $(document).on('click','.add-education',function(e){
            //     console.log($('#employee_info_form'));
            //     makeVliadation($('#employee_info_form'));
            // });
        });   
        

        function makeVliadation(form)
        {
            $(form).validate({
                
                rules: {
                    employee_code: {
                        required: true,
                        minlength: 6,
                        maxlength: 6,
                        remote: {url: `${baseUrl}/admin/validation/checkUserName`, type : "post",data: {_token:csrfToken} }
                    },
                    photo: {
                        required: true,
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
    </script>
    
@endsection

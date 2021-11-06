<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employee-education.update') }}" id="employee_education_form" method="POST" enctype="multipart/form-data">

            <div class="modal-body">
                    @csrf
               
                    @if(isset($educations))
                        @foreach($educations as $key=>$education)
                        <input type="hidden" name="employee_education_id[]" value="{{$education->id}}">
                            @if($key!=0)
                            <hr>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="academic_degree">Academic Degree:<span class="text-danger">*</span> </label>
                                    <select id="academic_degree" class="form-control" name="academic_degree[]" required>
                                        <option value="">Choose...</option>
                                        @if (isset($academicDegrees))
                                        @foreach ($academicDegrees as $academicDegree)
                                            <option value="{{ $academicDegree->id }}"
                                                {{ currentSelectedItem($academicDegree->id, $education->academic_degree) }}>
                                                {{ $academicDegree->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                    </select>
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="board">Board/University:<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="board" name="board[]"
                                        placeholder="Enter Board/University" value="{{$education->board}}" required>
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="major_subject">Major Subject:<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="major_subject" name="major_subject[]"
                                        placeholder="Enter Major Subject" value="{{$education->major_subject}}" required>
                            
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="result">Result:<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="result" name="result[]"
                                        placeholder="Enter Result" value="{{$education->result}}" required>
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passing_year">Passing Year:<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="passing_year" name="passing_year[]"
                                        placeholder="Enter Passing Year" value="{{$education->passing_year}}" required>
                                
                                </div>
                        
                            </div>   
                        @endforeach                                      
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
        $(document).on('submit', '#employee_education_form', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.status == 'suceess'){
                        toastr.success(data.message);
                        $('#exampleModal').modal('hide');
                        $('#employee_education_form')[0].reset();
                        $('#education_table').DataTable().ajax.reload();
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
        });
    });
</script>
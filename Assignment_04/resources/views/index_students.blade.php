
 
@extends('layouts.app')


@section('content')
    <!-- Current Students -->

    


        <div class="panel panel-default">
            <?php use App\Models\Major; ?>
            <?php $majors = Major::all();
                    foreach($majors as $major)
        {
            $majorlist[] = $major->name;
        } 
        ?>
            <div class="row">
                <div class="clear-fix" style="width:100%; margin-top:20px;">
                 <a href="export-csv" target="_blank" class="btn btn-primary btn-sm me-1 f-left">Export Data</a>
                    <button type="button" class="btn btn-sm btn-success f-left" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Import Data
                     </button>



                     <button class="btn btn-primary f-right" style="margin-left:-4px;" onclick="search()"> <i class="fa fa-search"></i>  Search</button>
                     <input type="search" name="search" id="searchId" placeholder="Search here" value="{{ old('search') }}" class="f-right  @error('search') is-invalid @enderror" style="padding:10px; outline:none; border:1px solid #3B71CA; height:37px;"  required>

      
                </div>
                @if (session('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('success') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                @endif  

            <div class="panel-body">

                <div class="clear-fix">
                    <h2 class="control-label f-left">Student List</h2>
                    <div class="f-right">
                        <a href="{{ url('/student_add') }}" class="btn btn-sm btn-primary f-right" style="margin:30px 0" data-bs-toggle="modal" data-bs-target="#create_students">
                            <i class="fa fa-plus"></i> Add Student</a>
                    </div>
                </div>

                <table class="table table-striped task-table" style="margin:0 auto;">
            
                    <!-- Table Body -->
                    <tr class="table-header">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Major</th>
                            <th></th>
                    </tr>
                    <tbody class="" id="tableBody">

                    </tbody>
                </table>
            </div>
        </div>

    <!-- Modal IMport EXport-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control" style="margin-top:0px;">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>


        {{--Create student --}}
        <div class="modal fade" id="create_students" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin-top: 15vh;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding:40px 0 !important;">
        
            <!-- Display Validation Errors -->
            @include('common.errors')
           
            <!-- New Student Form -->
            <form name="student_form" class="form-horizontal" style="width:400px; margin:0 auto;">
          
                <!-- Student Data -->
                <div class="form-group">

           
                    <div class="col-sm-12">
                        <input type="text" name="studentName" placeholder="Student name"  class="form-control @error('name') is-invalid @enderror">
                        <span id="nameError"></span>
                    </div>
                    <div class="col-sm-12">
                        <input type="email" name="email" placeholder="Email address"  class="form-control @error('email') is-invalid @enderror">
                        <span id="emailError"></span>
                    </div>
                    <div class="col-sm-12">
                        <input type="number" name="phone" placeholder="Phone number"  class="form-control @error('phone') is-invalid @enderror">
                        <span id="phoneError"></span>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" name="address" placeholder="Address"  class="form-control @error('address') is-invalid @enderror">
                        <span id="addressError"></span>
                    </div>
                    <div class="col-sm-12">
                        
                        <select name="major" style="width:209px; height:30px; margin:20px 0 10px; outline:none;">
              
                            

                            @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{$major->name}}</option>   
                            @endforeach
                        </select>
                    </div>
          
                          
          
         
          
                
                </div>
          
                <!-- Add Update Button -->
                <div class="form-group" style="display:flex; margin-top:10px;">
                <div class="col-sm-offset-3 col-sm-3">
                <a href="{{ url('/student')}}" class="back btn btn-primary">Back</a>
                    </div>
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add Student
                        </button>
                    </div>
                </div>
              </form>
              </div>
          

                </div>
            </div>
            </div>
         
        

            {{--Update --}}
            <div class="modal fade" id="update_students" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="margin-top: 15vh;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="padding:40px 0 !important;">
            
                <!-- Display Validation Errors -->
                @include('common.errors')
               
                <!-- New Student Form -->
                <form name="update_form" class="form-horizontal" style="width:400px; margin:0 auto;">
              
                    <!-- Student Data -->
                    <div class="form-group">
    
               
                        <div class="col-sm-12">
                            <input type="text" name="studentName" placeholder="Student name"  class="form-control @error('name') is-invalid @enderror">
                            <span id="nameError"></span>
                        </div>
                        <div class="col-sm-12">
                            <input type="email" name="email" placeholder="Email address"  class="form-control @error('email') is-invalid @enderror">
                            <span id="emailError"></span>
                        </div>
                        <div class="col-sm-12">
                            <input type="number" name="phone" placeholder="Phone number"  class="form-control @error('phone') is-invalid @enderror">
                            <span id="phoneError"></span>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" name="address" placeholder="Address"  class="form-control @error('address') is-invalid @enderror">
                            <span id="addressError"></span>
                        </div>
                        <div class="col-sm-12">
                            {{--<label for="majorlist">Choose a major</label>--}}
                            <select name="major" style="width:209px; margin:20px 0 10px; height:30px; outline:none;">
                                @foreach ($majors as $major)
                                <option value="{{ $major->id }}">{{$major->name}}</option>   
                                @endforeach
                            </select>
                        </div>
    
              
                    
                    </div>
              
                    <!-- Add Update Button -->
                    <div class="form-group" style="display:flex; margin-top:10px;">
                    <div class="col-sm-offset-3 col-sm-3">
                    <a href="{{ url('/student')}}" class="back btn btn-primary">Back</a>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-pen-to-square"></i> Update Student
                            </button>
                        </div>
                    </div>
                  </form>
                  </div>
              
    
                    </div>
                </div>
                </div>

<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script>
                    console.log("initialization");
                    var tableBody = document.getElementById('tableBody');
                    var nameList = document.getElementsByClassName('nameList');
                    var emailList = document.getElementsByClassName('emailList');
                    var phoneList = document.getElementsByClassName('phoneList');
                    var addressList  = document.getElementsByClassName('addressList');
                    var majorList = document.getElementsByClassName('majorList');
                    var idList = document.getElementsByClassName('idList');
                    var btnList = document.getElementsByClassName('btnList');
                    var majorText = "undefined";
    //Read 
        axios.get('/api/index_students')
            .then(response => {


                response.data[0].forEach(item => {

                    displayData(item);
                });
                
            })
            .catch(err => { 
                console.log(err);

                if(err.response.status == 404)
                {
                    console.log('"'+err.response.config.url+'" url is not found!');
                }
            });


    //Create
            var student_form = document.forms['student_form'];
            var stuname = student_form['studentName'];
            var stuphone = student_form['phone'];
            var stuemail = student_form['email'];
            var stuaddress = student_form['address'];
            var stumajor = student_form['major'];
            //console.log(name);
            student_form.onsubmit = function(e){
                //console.log(student_form['studentName'].value);
                e.preventDefault();


                
                axios.post('/api/index_students',{
                    name: stuname.value,
                    email: stuemail.value,
                    phone: stuphone.value,
                   address: stuaddress.value,
                    major: stumajor.value,
                })
                .then(response => {
                    console.log(response.data);
                    if(response.data.msg == 'Data created Successfully')
                    {
                       
                       
                        student_form.reset();

                        // to change output major id to text 
                        var currentMajorid = response.data[0].major;
                        console.log();
                        
                        for(var i=0;i<response.data[1].length;i++)
                        {
                            var currentMajorTextid = response.data[1][i].id;
                            if((currentMajorTextid) == currentMajorid)
                            {
                                majorText = response.data[1][i].name;

                            }
                        }
                        fixData(response.data[0],majorText);
                        alertMsg(response.data.msg);

                        $('#create_students').modal('hide');
                    } else {
                        console.log(response.data.msg.name);
                        document.getElementById('nameError').innerHTML = '<i class="text-danger">'+response.data.msg.name+'</i>';
                        document.getElementById('emailError').innerHTML = '<i class="text-danger">'+response.data.msg.email+'</i>';
                        document.getElementById('phoneError').innerHTML = '<i class="text-danger">'+response.data.msg.phone+'</i>';
                        document.getElementById('addressError').innerHTML = '<i class="text-danger">'+response.data.msg.address+'</i>';


                    }
                            //alertbox 
                            $("#successMsg").delay(2000).fadeOut(400);
                    
                })
                .catch(err => {
                    console.log(err);

                    if(err.response.status == 404)
                    {
                        console.log('"'+err.response.config.url+'" url is not found!');
                    } 
                });

            }
    //Update 
            var editForm = document.forms['update_form']
            var editName = editForm['studentName'];
            var editPhone =  editForm['phone'];
            var editEmail = editForm['email'];
            var editAddress = editForm['address'];
            var editMajor = editForm['major'];
            var postIdToUpdate;
            var oldName, oldPhone, oldEmail, oldAddress,oldMajor;
            function editBtn(getid)
            {
                document.cookie = 'search=0';
                console.log("update");
                console.log(getid);
                postIdToUpdate = getid;
                console.log("edit");
                axios.get('api/index_students/'+getid)
                    .then(response => {
                        console.log(response.data);

                        
                        editName.value = response.data.name;
                        editPhone.value = response.data.phone;
                        editEmail.value = response.data.email;
                        editAddress.value = response.data.address;
                        editMajor.value = response.data.major;

                        console.log(response.data);
                       

                        //data[0][0] from response old value
                        oldName = response.data.name; 
                        oldPhone = response.data.phone;
                        oldEmail = response.data.email;
                        oldAddress = response.data.address;
                        oldMajor = response.data.major;
                       

                })
                .catch(err=>console.log(err));
            }
    //UPDATE action
            editForm.onsubmit =function (event)
            {
                event.preventDefault();
                    axios.put('api/index_students/'+postIdToUpdate,{
                        name: editName.value,
                        email: editEmail.value,
                        phone: editPhone.value,
                        address: editAddress.value,
                        major: editMajor.value,
                    })
                    .then(response => {
                        console.log(response.data);
                        
                        alertMsg(response.data.msg);
                        $('#update_students').modal('hide');

    

                        console.log(editMajor.value);
                        console.log(response.data[1].length);
                        for(var i=0;i<response.data[1].length;i++)
                        {
                            console.log(response.data[1][i].id);
                            if(editMajor.value == response.data[1][i].id)
                            {
                                majorText = response.data[1][i].name;
                            }
                        }

                        for(var i=0; i<nameList.length; i++)
                        {
                            //only compare with oldName beacuse
                            //assign to new value if have or not(old value)
                            if(nameList[i].innerHTML == oldName)
                            {
                                //edit value is input from input field
                                nameList[i].innerHTML = editName.value;
                                console.log(editName.value);
                                phoneList[i].innerHTML = editPhone.value;
                                emailList[i].innerHTML = editEmail.value;
                                addressList[i].innerHTML = editAddress.value;
                                majorList[i].innerHTML = majorText;
                            }
                        }
                            //alertbox 
                            $("#successMsg").delay(2000).fadeOut(400);
                    })
                    .catch(err=>console.log(err));
            }
    //DELETE 
            function deleteBtn(postId)
            {
                axios.delete('api/index_students/'+postId)
                .then(response => {
                    console.log(response.data.deletePost.name);
                    alertMsg(response.data.msg);
                    for(var i=0; i<nameList.length; i++)
                    {
                        if(nameList[i].innerHTML == response.data.deletePost.name)
                        {
                            nameList[i].style.display = 'none';
                            emailList[i].style.display = 'none';
                            phoneList[i].style.display = 'none';
                            addressList[i].style.display = 'none';
                            majorList[i].style.display = 'none';
                            btnList[i].style.display = 'none';
                        }
                    }
                            //alertbox 
                            $("#successMsg").delay(2000).fadeOut(400);                    
                })
                .catch(error => console.log(error));
            }
        //Search 
        
        function search()
        {
            document.cookie = 'search=1';
            console.log("search");
            var searchText = document.getElementById("searchId").value;
            console.log(searchText);

                axios.get('api/index_students/'+searchText)
            .then(response => {

                tableBody.innerHTML = null;
                console.log(response.data.msg);
                console.log('search working'+ searchText);
                console.log(response.data);

                response.data[0].forEach(item => {
                    displayData(item);
                });
            })
            .catch(err => { 
                console.log(err);

                if(err.response.status == 404)
                {
                    console.log('"'+err.response.config.url+'" url is not found!');
                }
            });
        }


        //Mail alert

            function mailBtn()
            {
                document.getElementById('successMsg').innerHTML = '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="padding:15px 30px; width:426px; text-align:center; "><strong>Mail send successfully</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right; border: none; background: transparent; margin-bottom: 10px;"><span aria-hidden="true">&times;</span></button></div>';
            }


        


    //HELPER FUNCTION
            function fixData(data, majorText)
            {
                <?php $mailto = "shinoharaakira35@gmail.com" ?>        

                
                tableBody.innerHTML +=
                    '<tr>'+
                        '<input type="hidden" class="idList" value="'+data.id+'">'+
                        '<td class="nameList">'+data.name+'</td>'+
                        '<td class="emailList">'+data.email+'</td>'+
                        '<td class="phoneList">'+data.phone+'</td>'+
                        '<td class="addressList">'+data.address+'</td>'+
                        '<td class="majorList">'+majorText+'</td>'+
                        '<td class="btnList"><button class="btn btn-sm btn-success" onclick="editBtn('+data.id+')" data-bs-toggle="modal" data-bs-target="#update_students">Edit</button>'+
                        '<button class="btn btn-sm btn-danger" style="margin-left:5px;" onclick="deleteBtn('+data.id+')">Delete</button>'+
                    '</tr>';
            }
            function displayData(data)
            {


              


<?PHP $mailto = "shinoharaakira35@gmail.com" ?>


                tableBody.innerHTML +=
                    '<tr>'+
                        '<input type="hidden" class="idList" value="'+data.id+'">'+
                        '<td class="nameList">'+data.name+'</td>'+
                        '<td class="emailList">'+data.email+'</td>'+
                        '<td class="phoneList">'+data.phone+'</td>'+
                        '<td class="addressList">'+data.address+'</td>'+
                        '<td class="majorList">'+data.major+'</td>'+
                        '<td class="btnList"><button class="btn btn-sm btn-success" onclick="editBtn('+data.id+')" data-bs-toggle="modal" data-bs-target="#update_students">Edit</button>'+
                        '<button class="btn btn-sm btn-danger" style="margin-left:5px;" onclick="deleteBtn('+data.id+')">Delete</button>'+
                    '</tr>';
            }
            function searchData(data){

                <?php $mailto = "shinoharaakira35@gmail.com" ?> 
                var jvalue = "shinoharaakira35@gmail.com";

<?php $abc = "<script>document.write(jvalue)</script>" ?>

                
                
                tableBody.innerHTML +=
                    '<tr>'+
                        '<input type="hidden" class="idList" value="'+data.id+'">'+
                        '<td class="nameList">'+data.name+'</td>'+
                        '<td class="emailList">'+data.email+'</td>'+
                        '<td class="phoneList">'+data.phone+'</td>'+
                        '<td class="addressList">'+data.address+'</td>'+
                        '<td class="majorList">'+data.major+'</td>'+
                        '<td class="btnList"><button class="btn btn-sm btn-success" onclick="editBtn('+data.id+')" data-bs-toggle="modal" data-bs-target="#update_students">Edit</button>'+
                        '<button class="btn btn-sm btn-danger" style="margin-left:5px;" onclick="deleteBtn('+data.id+')">Delete</button>'+
                    '</tr>';
            }
            function alertMsg(msg)
            {
                document.getElementById('successMsg').innerHTML = '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="padding:15px 30px; width:426px; text-align:center; "><strong>'+msg+'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right; border: none; background: transparent; margin-bottom: 10px;"><span aria-hidden="true">&times;</span></button></div>';
            }



</script>
@endsection
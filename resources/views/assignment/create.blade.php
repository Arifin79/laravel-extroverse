@extends('assignment.layout.main')

@section('content')

<div class="text-wrapper-6">Assignment</div>
    <div class="frame">
        <main class="container">
            <section>
                <form action="{{ route('assignment/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="titlebar">
                        <h1>Add Task</h1>
                    </div>
                    <div class="card">
                       <div>
                            <label>Project Name</label>
                            <input type="text" name="project_name">
                            <hr>
                            <label>Customer Name</label>
                            <input type="text" name="customer_name">
                            <hr>
                            <label>Add Image</label>
                            <img src="" alt="" class="img-product" id="file-preview" />
                            <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                        </div>
                       <div>
                            <label>Deadline</label>
                            <input type="date" name="deadline" />
                            <hr>
                            <label>Project Type</label>
                            <input type="text" class="input" name="project_type">
                            <hr>
                            <label>Customer Type</label>
                            <input type="text" class="input" name="customer_type">
                       </div>
                    </div>
                    <div class="titlebar">
                        <h1></h1>
                        <button>Save</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>

<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>

@endsection

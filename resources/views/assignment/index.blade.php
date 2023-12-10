@extends('assignment.layout.main')

@section('content')

<div class="text-wrapper-6">Assignment</div>
    <div class="frame">
        <main class="container">
            <section>
                <div class="titlebar">
                    <h1>Task Assignment</h1>
                    <a href="{{ route('assignment/create') }}" class="btn-link">Add Task</a>
                </div>
                @if ($message = Session::get('success'))
                    <script type="text/javascript">
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                            });
                                Toast.fire({
                                icon: "success",
                                title: "{{ $message }}"
                        });
                    </script>
                @endif
                <div class="table">
                    <div class="table-filter">
                        <div>
                            <ul class="table-filter-list">
                                <li>
                                    <p class="table-filter-link link-active">All</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('assignment/index') }}" accept-charset="UTF-8" role="search">
                        <div class="table-search">
                            <div>
                                <button class="search-select">
                                   Search Assignments
                                </button>
                            </div>
                            <div class="relative">
                                <input class="search-input" type="text" name="search" placeholder="Search assignment..." value="{{ request('search') }}">
                            </div>
                        </div>
                    </form>
                    <div class="table-product-head">
                        <p>Image</p>
                        <p>Name</p>
                        <p>Category</p>
                        <p>Inventory</p>
                        <p>Actions</p>
                    </div>
                    <div class="table-product-body">
                        @if (count($assignment) > 0)
                            @foreach ($assignment as $product)
                                <img src="{{ asset('images/' . $product->image)}}"/>
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->category }}</p>
                                <p>{{ $product->quantity }}</p>
                                <div style="display: flex">
                                    <a href="{{ route('assignment/edit', ['id' => $product->id]) }}" class="btn-link btn btn-success" style="margin-top: -0px; padding-bottom:0px; margin-right:15px;">
                                        <i class="fas fa-pencil-alt" ></i>
                                    </a>
                                    <form method="post" action="{{ route('assignment/destroy', ['id' => $product->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="deleteConfirm(event)" style="margin-top: -0px; padding-bottom:12px;">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <p>product not found</p>
                        @endif
                    </div>
                    <div class="table-paginate">
                        {{ $assignment->links('assignment/layout/pagination') }}
                    </div>
                </div>
            </section>
            <br>
        </main>
      </div>
</div>

<script>
    window.deleteConfirm = function (e) {
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
        });
    }
</script>

@endsection

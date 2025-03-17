@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Category</h1>

        <form id="addCategoryForm">
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" id="category_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <hr>

        <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="categoryTable">
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <button class="btn btn-warning btn-sm editBtn" data-id="{{ $category->id }}" data-name="{{ $category->name }}">Edit</button>
                    <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $category->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <script>
    $(document).ready(function () {
        // Add category
        $("#addCategoryForm").submit(function (e) {
            e.preventDefault();
            let name = $("#category_name").val();
            $.ajax({
                url: "http://127.0.0.1:8000/api/categories",
                type: "POST",
                data: { name: name, _token: "{{ csrf_token() }}" },
                success: function () {
                    alert("Category added successfully");
                    location.reload();
                }
            });
        });
    });
</script>
@endsection
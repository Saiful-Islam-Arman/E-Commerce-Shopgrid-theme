@extends('master.admin.master')

@section('title')
   Sub Category Manage
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Sub Category Iffo</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                         @foreach($sub_categories as $sub_category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$sub_category->category->name}}</td>
                            <td>{{$sub_category->name}}</td>
                            <td>{{$sub_category->description}}</td>
                            <td><img src="{{asset($sub_category->image)}}" width="80" height="80" alt="Sub Category Image"></td>
                            <td>{{$sub_category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('subCategory.edit', ['id' => $sub_category->id])}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('subCategorydeleteForm{{$sub_category->id}}').submit();">
                                    <i class="fa fa-trush"></i> Delete
                                </a>
                                <form action="{{route('sub-category.delete', ['id' => $sub_category->id])}}" method="POST" id="subCategorydeleteForm{{$sub_category->id}}">
                                @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection


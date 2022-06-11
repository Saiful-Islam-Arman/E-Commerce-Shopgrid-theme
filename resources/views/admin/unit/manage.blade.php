@extends('master.admin.master')

@section('title')
    Manage Unit
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Unit List</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($units as $unit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->description}}</td>
                            <td>{{$unit->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('unit.edit', ['id' => $unit->id])}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('unitInfoDelete{{$unit->id}}').submit();">
                                    <i class="fa fa-trush"></i> Delete
                                </a>
                                <form action="{{route('unit.delete', ['id' => $unit->id])}}" method="POST" id="unitInfoDelete{{$unit->id}}">
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


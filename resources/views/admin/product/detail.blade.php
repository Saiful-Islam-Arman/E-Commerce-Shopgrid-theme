@extends('master.admin.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Detail</h4>
                    <p class="text-center text-info">{{Session::get('message')}}</p>
                    <table  class="table table-bordered dt-responsive nowrap">
                       <tr>
                           <th>Product Id</th>
                           <td>{{$product->id}}</td>
                       </tr>
                       <tr>
                           <th>Product Name</th>
                           <td>{{$product->name}}</td>
                       </tr>
                       <tr>
                        <th>Product Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Product Category</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Sub Category</th>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Brand</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Product Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Product Stock Amount</th>
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Product Short Description</th>
                        <td>{{$product->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Product Long Description</th>
                        <td>{!! $product->long_description!!}</td>
                    </tr>
                    <tr>
                        <th>Product Main Image</th>
                        <td>
                            <img src="{{asset($product->image)}}" height="50" width="50" alt="product">
                        </td>
                    </tr>
                    <tr>
                        <th>Product Other Image</th>
                        @foreach($product->otherImages as $otherImage)
                        <img src="{{asset($otherImage->image)}}" height="50" width="50" alt="product">
                        @endforeach
                    </tr>
                    <tr>
                        <th>Product Status</th>
                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                    </tr>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

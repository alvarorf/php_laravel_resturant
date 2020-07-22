@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ml-2 mr-2" style="max-width:100%;">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card" style="min-width: 600px!important;
            margin-left: auto!important; 
            margin-right: auto!important;">
                <div class="card-header">All food
                    <span class="float-right">
                        <a href="{{route('food.create')}}">
                            <button class="btn 
                            btn-outline-secondary">
                            Add food
                            </button>
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table ml-0 mr-0" 
                    style="min-width:200px;">
                        <thead class="thead-dark" 
                        style="min-width:200px;">
                            <tr style="min-width:200px; 
                            vertical-align: middle!important;">
                                <th class="p-2" style="vertical-align: middle!important;" scope="col">Image</th>
                                <th class="p-2" scope="col">Name</th>
                                <th class="p-2" scope="col">Description</th>
                                <th class="p-2" scope="col">Price</th>
                                <th class="p-2" scope="col">Category</th>
                                <th class="p-2" scope="col">Edit</th>
                                <th class="p-2" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody style="min-width:200px;">
                            @if(count($foods)>0)
                            @foreach($foods as $key=>$food)
                            <tr style="min-width:200px;">
                                <td style="
                                vertical-align: middle!important;">
                                <img 
                                src="{{asset('images')}}/{{$food->image}}" 
                                width="100"
                                alt="Food image"
                                ></td>
                                <td  style="
                                vertical-align: middle!important;">
                                {{$food->name}}</td>
                                <td  style="vertical-align: middle!important;">
                                {{$food->description}}</td>
                                <td  style="
                                vertical-align: middle!important;">
                                ${{$food->price}}</td>
                                <td  style="vertical-align: middle!important;">
                                {{$food->category->name}}</td>
                                <td  style="
                                vertical-align: middle!important;">
                                    <a style="display: inline" 
                                    href="{{route('food.edit'
                                    ,[$food->id])}}">
                                        <button class="btn btn-outline-success">
                                            Edit
                                        </button>
                                    </a>
                                </td>
                                <td  style="
                                vertical-align: middle!important;">
                                    <button 
                                    type="button" 
                                    class="btn btn-primary" 
                                    data-toggle="modal"
                                     data-target="#exampleModal{{$food->id}}">
                                    Delete
                                    </button>

                                    
                                    <!-- Modal -->
                                    <div class="modal fade" 
                                    id="exampleModal{{$food->id}}" 
                                        tabindex="-1" role="dialog" aria-labelledby="
                                        exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <form action="
                                            {{route('food.destroy',[$food->id])}}" 
                                                method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" 
                                                    class="btn btn-secondary" 
                                                    data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" 
                                                    class="btn btn-outline-danger">Delete
                                                    </button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                
                                </td>
                            </tr>
                            @endforeach

                            @else
                            <td style="min-width:200px;">No food to display</td>
                            @endif
                            
                        </tbody>
                    </table>
                    {{$foods->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Form</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                @auth
                    <div>
                        <h1>{{Auth::user()->name}}</h1>
                    
                        <form id="" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button>Logout</button>
                        </form>
                        
                    </div>
                @endauth
             

                <div class="card">
                    <div class="cardbody"><br>
                        <h3>Add New Item Form</h3>
                        <hr>

                    @if(session('reqname'))
                            {{session('reqname')}}
                        @endif 

                        @if(session('update'))
                        {{session('update')}}
                         @endif 

                        {{-- //For Display Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                          {{-- //For Delete --}}

                          @if(session('deleted_id'))
                            <p class="alert alret-danger">{{session('deleted_id')}}</p>
                          @endif 

                          @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif


                        <form action="{{route('form_store')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="" class="@error('name') text-danger @enderror">Add New Item</label>
                                <input type="text" name="name" class="form-control " value="{{old('name')}}">
                               
                                @error('name')
                                <div class="text-danger font-weight-bold">{{ $message }}</div>
                                @enderror


                            </div><hr>
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="price">Price(MMK)</label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                        <div class="text-danger font-weight-bold">{{ $message }}</div>
                                        @enderror
            
                                    </div>
                                </div><hr>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stock">Stock(Qty)</label>
                                        <input type="number" name="stock" class="form-control">
                                    </div>
                                </div><hr>
                                <button class="btn btn-primary">Save Item</button>
                        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Items Table</h1>
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-between align-item-center">
                    <h3>Item List</h3>
                    <a href="{{route('form_create')}}" class="btn btn-primary btn-md text-right">Add Item</a>
                    
                </div>
                <div class="card-body">
                    <table class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#id</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Created time</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach (\App\Items::all() as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->stock}}</td>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('form_edit',$item->id)}}" class="btn btn-danger">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{route('form_destroy',$item->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
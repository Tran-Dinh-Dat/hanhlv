<!doctype html>
<html lang="en">
  <head>
    <title>Crud Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('product.create')}}" class="btn btn-success">Add product</a>
            </div>
            <div class="col-md-12 m-3">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success')}}
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td scope="row">{{ $item->id}}</td>
                                    <td><img style="width: 70px" src="{{ asset('upload/images/' . $item->image)}}" alt=""></td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->description}}</td>
                                    <td>{{ $item->price}}</td>
                                    <td>{{ $item->qty}}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                        <!-- Button trigger modal -->
                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modelId{{$item->id}}">Delete</a>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete product</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('product.destroy', $item->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                </table>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
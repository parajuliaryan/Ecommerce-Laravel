<title>Edit Product</title>
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <form method="POST" action="/electronic-devices/{{ $id }}" enctype="multipart/form-data">
    @method('PUT')  
    @csrf
      <input type="text" name="product_name" placeholder="Enter the product name">
      <input type="file" name="photo"> <br>
      <input type="text" name="price" placeholder="Enter the price"><br>
      <button class="btn btn-success mt-3 mb-3" type="submit">Update</button>
  </form>
  <form action="/electronic-devices/{{ $id }}" >
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit">Delete</button>
  </form>
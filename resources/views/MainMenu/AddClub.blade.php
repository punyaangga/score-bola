<div id="menu1" class="container tab-pane active"><br>
    {{-- section for alert --}}
    @if (session('MessageFunction'))
        <div class="alert alert-success">
            {{ session('MessageFunction') }}
        </div>
    @endif
    {{-- section for alert --}}

    {{-- alert error section --}}
    @include('MainMenu.Error')
    {{-- end alert error section --}}
    <h3>Input Data Klub Sepak Bola</h3>
    <form method="POST" action="{{route('master_data_clubs.store')}}">
    @csrf
      <div class="form-group">
        <label for="data1">Nama Klub</label>
        <input type="text" class="form-control" name="name_clubs" placeholder="Masukkan Data Klub" value="{{old('name_clubs')}}">
      </div>
      <div class="form-group">
        <label for="data1">Kota Klub</label>
        <input type="text" class="form-control" name="city_clubs"  placeholder="Masukkan Kota Klub" value="{{old('city_clubs')}}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
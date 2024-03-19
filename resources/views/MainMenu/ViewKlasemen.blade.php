<div id="menu3" class="container tab-pane fade"><br>
    <h3>Klasemen Bola</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Klub</th>
            <th>Ma</th>
            <th>Me</th>
            <th>S</th>
            <th>K</th>
            <th>GM</th>
            <th>GK</th>
            <th>Point</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $clubName => $clubData)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $clubName }}</td>
              <td>{{ $clubData['Ma'] }}</td>
              <td>{{ $clubData['Me'] }}</td>
              <td>{{ $clubData['S'] }}</td>
              <td>{{ $clubData['K'] }}</td>
              <td>{{ $clubData['GM'] }}</td>
              <td>{{ $clubData['GK'] }}</td>
              <td>{{ $clubData['Point'] }}</td>    
            </tr>
         @endforeach
        </tbody>
   
</div>
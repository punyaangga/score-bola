<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Input Data</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<h2>Input Bola</h2>
<!-- section for menu -->
  @include('MainMenu.Menu')
<!-- end section for menu -->

<!-- section for form -->
<div class="tab-content">
    @include('MainMenu.AddClub')
    @include('MainMenu.AddScore')
    @include('MainMenu.ViewKlasemen')
</div>
 
<!-- end section for form -->  
  

</body>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- End Bootstrap JS -->

<!-- logic -->
<script>
    function addRow() {
        var container = document.getElementById('container');
        var row = document.createElement('div');
        row.className = 'form-row';
        row.innerHTML = `
            <div class="col-md-3 mb-3">
                <label>Klub Sepak Bola 1</label>
                <select class="form-control" name="id_clubs_1[]">
                    <option selected disabled>Pilih Club Bola</option>
                    @foreach($data as $clubName => $clubData)
                        <option value="{{ $clubData['id_clubs'] }}">{{ $clubName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label>Klub Sepak Bola 2</label>
                <select class="form-control" name="id_clubs_2[]">
                    <option selected disabled>Pilih Club Bola</option>
                    @foreach($data as $clubName => $clubData)
                        <option value="{{ $clubData['id_clubs'] }}">{{ $clubName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label>Skor 1</label>
                <input type="text" class="form-control" name="club_scores_1[]" placeholder="Data 1">
            </div>
            <div class="col-md-3 mb-3">
                <label>Skor 2</label>
                <input type="text" class="form-control" name="club_scores_2[]" placeholder="Data 1">
            </div>
        `;
        container.appendChild(row);
    
        // Disable selected option in other select boxes
        var selects = container.querySelectorAll('select');
        var selectedOptions = [];
        selects.forEach(function(select) {
            var selectedValue = select.value;
            if (selectedValue !== '') {
                selectedOptions.push(selectedValue);
            }
        });
        selects.forEach(function(select) {
            var options = select.options;
            for (var i = 0; i < options.length; i++) {
                if (selectedOptions.includes(options[i].value)) {
                    options[i].disabled = true;
                } else {
                    options[i].disabled = false;
                }
            }
        });
    }
    </script>
<!-- logic -->
</html>
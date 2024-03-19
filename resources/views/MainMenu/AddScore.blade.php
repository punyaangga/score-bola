<div id="menu2" class="container tab-pane fade"><br>
    <h3>Input Data Skor Sepak Bola</h3>
    <form method="post" action="{{ route('scores.store') }}">
        @csrf
        <div class="form-row" id="container">
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
        </div>
        <button type="button" class="btn btn-primary" onclick="addRow()">Add More</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
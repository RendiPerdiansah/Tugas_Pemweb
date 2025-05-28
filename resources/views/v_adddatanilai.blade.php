@extends('layout.v_tamplate')

@section('title', 'Add Data Nilai')

@section('page', 'Add Data Nilai')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Data Nilai</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('nilai.insert') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nidn">Dosen</label>
                <select name="nidn" id="nidn" class="form-control" required>
                    <option value="">-- Select Dosen --</option>
                    @foreach ($dosen as $d)
                    <option value="{{ $d->nidn }}">{{ $d->nama_dosen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_matakuliah">Mata Kuliah</label>
                <select name="id_matakuliah" id="id_matakuliah" class="form-control" required>
                    <option value="">-- Select Mata Kuliah --</option>
                    @foreach ($mata_kuliah as $m)
                    <option value="{{ $m->id_matakuliah }}">{{ $m->nama_matakuliah }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tahun_akademik">Tahun Akademik</label>
                <select name="id_tahun_akademik" id="id_tahun_akademik" class="form-control" required>
                    <option value="">-- Select Tahun Akademik --</option>
                    @foreach ($tahun_akademik as $t)
                    <option value="{{ $t->id_tahun_akademik }}">{{ $t->tahun_akademik }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="komposisi_nilai_lain">Komposisi Nilai Lain-lain (%)</label>
                <input type="number" step="0.01" name="komposisi_nilai_lain" id="komposisi_nilai_lain" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="komposisi_nilai_uts">Komposisi Nilai UTS (%)</label>
                <input type="number" step="0.01" name="komposisi_nilai_uts" id="komposisi_nilai_uts" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="komposisi_nilai_uas">Komposisi Nilai UAS (%)</label>
                <input type="number" step="0.01" name="komposisi_nilai_uas" id="komposisi_nilai_uas" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection

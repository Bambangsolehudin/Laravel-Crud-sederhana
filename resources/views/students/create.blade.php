	@extends('layout.main')

	@section('title', 'Form Tambah Mahasiswa')

	@section('container')
	<div class="container">
		<div class="row">
			<div class="col-8">	
  		  <h1 class="mt-2">Form Tambah Data Mahasiswa</h1>
  		  
         <form method="post" action="/students">
          @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror"  id="nama" placeholder="Masukan Nama" name="nama" value="{{ old('nama') }}">
              <div class="invalid-feedback">
                @error('nama')
                {{$message}}
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="nrp">NRP</label>
              <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="Masukan NRP" name="nrp" value="{{ old('nrp') }}">
               <div class="invalid-feedback">
                @error('nrp')
                {{$message}}
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan Email" name="email" value="{{ old('email') }}">
               @error('email')
                {{$message}}
               @enderror
            </div>
              <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" placeholder="Masukan Jurusan" name="jurusan" value="{{ old('jurusan') }}">
               @error('jurusan')
                {{$message}}
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>

			</div>
		</div>
	</div>
	@endsection


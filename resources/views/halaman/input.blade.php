@extends('layouts.app')
@push('after-style')
    <style>
        .container {
            margin-top: 10px; 
            width: 100% ;
            height: 350px;
        }
    </style>
    
@endpush

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-center">
                <img src="{{ asset('gambar/energeek.png') }}" alt="" width="320">
            </div>
            <div class="bg-white my-4">
                <h1 class="p-4" style="text-align: center">Apply Lamaran</h1>  
                <form action="{{ route('inputan.store') }}" method="POST">
                    @csrf
                    <div class="p-4">
                        <label for="name" class="form-label">Nama Lengkap <span class="required"></span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Cth : Jonathan Akbar">
                        <div class="invalid-feedback">
                            Isi nama lengkap.
                        </div>
                    </div>
                    <div class="p-4">
                        <label for="jabatan" class="form-label">Jabatan <span class="required"></span></label>
                        <select class="form-select text-muted" required name="jabatan" id="jabatan">
                            <option value="">- Pilih -</option>
                            @foreach ($jobs as $j)
                                <option value="{{ $j->id }}">{{ $j->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-4">
                        <label for="telp" class="form-label">No. Telepon<span class="required"></span></label>
                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Cth : 0812990121">
                        <div class="invalid-feedback">
                            Invalid input.
                        </div>
                    </div>
                    <div class="p-4">
                        <label for="emai" class="form-label p-2">Email <span class="required"></span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
                        <div class="invalid-feedback">
                            Invalid input.
                        </div>
                    </div>
                    <div class="p-4">
                        <label for="year" class="form-label">Tahun Lahir <span class="required"></span></label>
                        <select class="form-select text-muted" required name="year" id="year">
                            <option value="">- Pilih Tahun -</option>
                            @for ($year; $year <= 2015; $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="p-4">
                        <label for="skill" class="form-label">Skill Sets <span class="required"></span></label>
                        <select class="form-select text-muted" required value="{{ old('skill_id[]') }}" name="skill_id[]" id="floatingSelect" multiple="multiple">
                            @foreach ($skills as $d)
                            <option value="{{ $d->id }}" {{ (collect(old('skills'))->contains($d->id)) ? 'selected':'' }}>{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto" style="margin-bottom: 10px">
                        <button class="btn btn-danger" type="submit">Apply</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>
</div>

@push('after-script')
    <script> 
        $(document).ready(function() {
            $("#floatingSelect").select2({  
                placeholder: "Pilih Skill",
                theme: "classic"
            });
        });
    </script>   
@endpush

@endsection

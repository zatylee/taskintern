@extends('layouts.app')

@section('contents')
<style>
    .breadcrumb {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 5px;
        font-size: 14px;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: #007bff;
    }

    .breadcrumb-item.active {
        color: #6c757d;
    }

    .breadcrumb-item i {
        font-size: 14px;
        vertical-align: middle;
    }

    .text-success {
        color: #28a745 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }
</style>

<div class="container mt-4">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#">Maklumat Kesatuan Sekerja</a>
                <i class="bi bi-check-circle text-success"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Butiran Pemohon</a>
                <i class="bi bi-check-circle text-success"></i>
            </li>
            <li class="breadcrumb-item">
                Butiran Pegawai
                <i class="bi bi-x-circle text-danger"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Nombor Peraturan</a>
                <i class="bi bi-check-circle text-success"></i>
            </li>
        </ol>
    </nav>

    <!-- Main Form -->
    <form method="POST" action="{{ route('formb.submit') }}">
        @csrf
        <h3 class="mb-4">Permohonan Pendaftaran Kesatuan Sekerja</h3>

        <!-- Nama Kesatuan Sekerja -->
        <div class="form-group mb-3">
            <label for="union_name">Nama Kesatuan Sekerja <span class="text-danger">*</span></label>
            <input type="text" name="union_name" id="union_name" class="form-control" value="{{ old('union_name') }}" required>
        </div>

        <!-- Alamat Berdaftar -->
        <div class="form-group mb-3">
            <label for="registered_address">Alamat Berdaftar <span class="text-danger">*</span></label>
            <textarea name="registered_address" id="registered_address" class="form-control" required>{{ old('registered_address') }}</textarea>
        </div>

        <!-- Tarikh Mesyuarat Penubuhan -->
        <div class="form-group mb-3">
            <label for="meeting_date">Tarikh Mesyuarat Penubuhan <span class="text-danger">*</span></label>
            <input type="date" name="meeting_date" id="meeting_date" class="form-control" value="{{ old('meeting_date') }}" required>
        </div>

        <!-- Cawangan -->
        <div class="form-group mb-3">
            <label>Cawangan <span class="text-danger">*</span></label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="branch" value="Cawangan" id="branch_cawangan" class="form-check-input" {{ old('branch') == 'Cawangan' ? 'checked' : '' }}>
                <label for="branch_cawangan" class="form-check-label">Cawangan</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="branch" value="Tidak Bercawangan" id="branch_tidak" class="form-check-input" {{ old('branch') == 'Tidak Bercawangan' ? 'checked' : '' }}>
                <label for="branch_tidak" class="form-check-label">Tidak Bercawangan</label>
            </div>
        </div>

        <!-- Jenis Kesatuan -->
        <div class="form-group mb-3">
            <label>Jenis Kesatuan <span class="text-danger">*</span></label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="union_type" value="Majikan" id="union_type_majikan" class="form-check-input" {{ old('union_type') == 'Majikan' ? 'checked' : '' }}>
                <label for="union_type_majikan" class="form-check-label">Majikan</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="union_type" value="Pekerja" id="union_type_pekerja" class="form-check-input" {{ old('union_type') == 'Pekerja' ? 'checked' : '' }}>
                <label for="union_type_pekerja" class="form-check-label">Pekerja</label>
            </div>
        </div>

        <!-- Sektor -->
        <div class="form-group mb-3">
            <label>Sektor <span class="text-danger">*</span></label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="sector" value="Kerajaan" id="sector_kerajaan" class="form-check-input" {{ old('sector') == 'Kerajaan' ? 'checked' : '' }}>
                <label for="sector_kerajaan" class="form-check-label">Kerajaan</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="sector" value="Swasta" id="sector_swasta" class="form-check-input" {{ old('sector') == 'Swasta' ? 'checked' : '' }}>
                <label for="sector_swasta" class="form-check-label">Swasta</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="sector" value="Badan Berkanun" id="sector_badan" class="form-check-input" {{ old('sector') == 'Badan Berkanun' ? 'checked' : '' }}>
                <label for="sector_badan" class="form-check-label">Badan Berkanun</label>
            </div>
        </div>

        <!-- Industri -->
        <div class="form-group mb-3">
            <label for="industry">Industri <span class="text-danger">*</span></label>
            <select name="industry" id="industry" class="form-control" required>
                <option value="">-- Pilih Industri --</option>
                <option value="Maklumat dan Komunikasi" {{ old('industry') == 'Maklumat dan Komunikasi' ? 'selected' : '' }}>Maklumat dan Komunikasi</option>
                <!-- Add more options here -->
            </select>
        </div>

        <!-- Bilangan Ahli -->
        <div class="form-group mb-3">
            <label for="member_count">Bilangan Ahli <span class="text-danger">*</span></label>
            <input type="number" name="member_count" id="member_count" class="form-control" value="{{ old('member_count') }}" required>
        </div>

        <!-- Tarikh Permohonan -->
        <div class="form-group mb-3">
            <label for="application_date">Tarikh Permohonan <span class="text-danger">*</span></label>
            <input type="date" name="application_date" id="application_date" class="form-control" value="{{ old('application_date') }}" required>
        </div>

        <!-- Melalui (Jenis Mesyuarat) -->
        <div class="form-group mb-3">
            <label for="meeting_type">Melalui (Jenis Mesyuarat) <span class="text-danger">*</span></label>
            <input type="text" name="meeting_type" id="meeting_type" class="form-control" value="{{ old('meeting_type') }}" required>
        </div>

        <!-- Nama Setiausaha Penaja -->
        <div class="form-group mb-3">
            <label for="secretary_name">Nama Setiausaha Penaja <span class="text-danger">*</span></label>
            <input type="text" name="secretary_name" id="secretary_name" class="form-control" value="{{ old('secretary_name') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Seterusnya</button>
    </form>
</div>
@endsection

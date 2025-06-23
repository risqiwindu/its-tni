@extends('layouts.admin')
@section('innerTitle','Input Nilai Sikap Massal')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
        'crumbs'=>[
            route('admin.dashboard') => 'Dashboard', 
            route('admin.sikap.index') => 'Penilaian Sikap', 
            '#' => 'Input Massal'
        ]
    ])
@endsection

@section('content')
<form method="POST" action="{{ route('admin.sikap.mass_store_sikap') }}" onsubmit="return validateForm()">
    @csrf
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari nama atau NIP siswa...">
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>
                    <label> Centang Semua Siswa</label>
                </th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">NIP</th>
                <th>Kreatif</th>
                <th>Kerjasama</th>
                <th>Tanggung Jawab</th>
                <th>Keaktifan</th>
                <th>Toleran</th>
            </tr>
            <tr>
                <th><input type="checkbox" id="checkAll"></th>
                @foreach (['kreatif', 'kerjasama', 'tanggung_jawab', 'keaktifan', 'toleran'] as $param)
               <th>
                    <select id="bulk_nilai_{{ $param }}" class="form-control d-inline-block" style="width:auto;">
                        <option value="">--</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">
                                @switch($i)
                                @case(1) Tidak Baik @break
                                @case(2) Kurang Baik @break
                                @case(3) Cukup @break
                                @case(4) Baik @break
                                @case(5) Baik Sekali @break
                            @endswitch
                             ({{ $i }})
                            </option>
                        @endfor
                    </select>
                    <button type="button" class="btn btn-sm btn-secondary" onclick="setBulkValue('{{ $param }}')">Set ke Semua</button>
                </th>
            @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
                @php
                    $sudahDinilai = $nilai_sikap->firstWhere('student_id', $student->id);
                @endphp
                <tr>
                    <td>
                        <input type="checkbox" name="penilaian[{{ $index }}][aktif]"
                            onchange="toggleForm(this, '{{ $index }}')" {{ $sudahDinilai ? 'disabled' : '' }}>
                        <input type="hidden" name="penilaian[{{ $index }}][student_id]" value="{{ $student->id }}">
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nip }}</td>
                    @foreach (['kreatif', 'kerjasama', 'tanggung_jawab', 'keaktifan', 'toleran'] as $param)
                        <td>
                            <select name="penilaian[{{ $index }}][{{ $param }}]" class="form-control form-input-{{ $index }} form-{{ $param }}" required disabled>
                                <option value="">--</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">
                                        @switch($i)
                                            @case(1) Tidak Baik @break
                                            @case(2) Kurang Baik @break
                                            @case(3) Cukup @break
                                            @case(4) Baik @break
                                            @case(5) Baik Sekali @break
                                        @endswitch
                                        ({{ $i }})
                                    </option>
                                @endfor
                            </select>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</form>

<script>
    function toggleForm(checkbox, index) {
        document.querySelectorAll('.form-input-' + index).forEach(el => {
            el.disabled = !checkbox.checked;
        });
    }

    // Centang semua siswa
    document.getElementById('checkAll').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name^="penilaian"]');
        checkboxes.forEach(checkbox => {
            if (!checkbox.disabled) {
                checkbox.checked = this.checked;
                const index = checkbox.name.match(/penilaian\[(\d+)\]/)[1];
                toggleForm(checkbox, index);
            }
        });
    });

    // Set nilai massal berdasarkan nama field
    function setBulkValue(field) {
        const selectedValue = document.getElementById('bulk_nilai_' + field).value;
        if (!selectedValue) return;

        const selects = document.querySelectorAll('select.form-' + field);
        selects.forEach(select => {
            if (!select.disabled) {
                select.value = selectedValue;
            }
        });
    }

    // 🚫 Validasi sebelum submit
    function validateForm() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name^="penilaian"]');
        let isAnyChecked = false;

        for (const checkbox of checkboxes) {
            if (checkbox.checked) {
                isAnyChecked = true;
                const index = checkbox.name.match(/penilaian\[(\d+)\]/)[1];

                // Cek semua nilai pada baris ini
                const selects = document.querySelectorAll('.form-input-' + index);
                for (const select of selects) {
                    if (select.value === "") {
                        alert("Semua nilai harus diisi untuk siswa yang dicentang.");
                        return false;
                    }
                }
            }
        }

        if (!isAnyChecked) {
            alert("Silakan pilih minimal satu siswa.");
            return false;
        }

        return true;
    }

    // Pencarian baris siswa berdasarkan nama atau NIP
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(row => {
            const name = row.cells[1]?.textContent.toLowerCase();
            const nip  = row.cells[2]?.textContent.toLowerCase();

            if (name.includes(searchTerm) || nip.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection

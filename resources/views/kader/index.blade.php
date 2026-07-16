<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kader – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --g-bg: #F7FBFF;
            --g-bg2: #EEF9F4;
            --g-green: #0E9E72;
            --g-green-lite: #E6F7F1;
            --g-green-border: rgba(14, 158, 114, .18);
            --g-blue: #1565C0;
            --g-blue-mid: #1976D2;
            --g-dark: #0A1628;
            --g-text: #1A2E3B;
            --g-text2: #3D5A6C;
            --g-muted: #7A9BB0;
            --g-border: rgba(21, 101, 192, .1);
            --g-white: #FFFFFF;
            --sidebar-w: 240px;
        }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--g-bg);
            color: var(--g-text);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-w);
            background: var(--g-white);
            border-right: 1px solid var(--g-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 50;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--g-border);
            text-decoration: none;
        }

        .sidebar-brand span {
            font-size: 17px;
            font-weight: 900;
            color: var(--g-dark);
        }

        .sidebar-section {
            padding: 20px 12px 8px;
        }

        .sidebar-section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--g-muted);
            padding: 0 8px;
            margin-bottom: 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--g-text2);
            font-size: 14px;
            margin-bottom: 2px;
        }

        .nav-item:hover {
            background: var(--g-bg2);
            color: var(--g-green);
        }

        .nav-item.active {
            background: var(--g-green-lite);
            color: var(--g-green);
            font-weight: 700;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--g-green);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 100px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px 12px;
            border-top: 1px solid var(--g-border);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: var(--g-bg);
            border: 1px solid var(--g-border);
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--g-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 900;
            color: #fff;
        }

        .user-info .user-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--g-dark);
        }

        .user-info .user-role {
            font-size: 11px;
            color: var(--g-muted);
        }

        .logout-btn {
            margin-left: auto;
            color: var(--g-muted);
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: var(--g-white);
            border-bottom: 1px solid var(--g-border);
            padding: 16px 32px;
        }

        .topbar h1 {
            font-size: 20px;
            font-weight: 900;
            color: var(--g-dark);
        }

        .topbar p {
            font-size: 13px;
            color: var(--g-muted);
            margin-top: 2px;
        }

        .content {
            padding: 28px 32px;
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 24px;
            align-items: start;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
            grid-column: 1 / -1;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-success {
            background: var(--g-green-lite);
            border: 1px solid var(--g-green-border);
            color: var(--g-green);
        }

        .alert-danger {
            background: rgba(239, 68, 68, .08);
            border: 1px solid rgba(239, 68, 68, .2);
            color: #DC2626;
        }

        .card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 16px;
            overflow: hidden;
        }

        .card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--g-border);
        }

        .card-title {
            font-size: 15px;
            font-weight: 900;
            color: var(--g-dark);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--g-muted);
            padding: 12px 24px;
            background: var(--g-bg);
            border-bottom: 1px solid var(--g-border);
        }

        td {
            padding: 14px 24px;
            border-bottom: 1px solid rgba(21, 101, 192, .05);
            font-size: 13px;
        }

        .role-badge {
            padding: 4px 10px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 700;
        }

        .role-admin {
            background: rgba(21, 101, 192, .1);
            color: var(--g-blue);
        }

        .role-kader {
            background: var(--g-green-lite);
            color: var(--g-green);
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            background: rgba(239, 68, 68, .08);
            color: #DC2626;
        }

        .form-card {
            padding: 24px;
        }

        .form-card h2 {
            font-size: 15px;
            font-weight: 900;
            color: var(--g-dark);
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--g-text2);
            margin-bottom: 6px;
        }

        input, select {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--g-border);
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-size: 14px;
            background: var(--g-bg);
        }

        .btn-submit {
            width: 100%;
            margin-top: 8px;
            padding: 10px;
            background: var(--g-blue);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .pagination-wrap {
            padding: 16px 24px;
            border-top: 1px solid var(--g-border);
        }

        @media (max-width: 1024px) {
            .content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    @include('partials.admin-sidebar', ['active' => 'kader'])

    <div class="main">
        <div class="topbar">
            <h1>Kelola Kader</h1>
            <p>Daftar akun kader dan admin posyandu</p>
        </div>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Daftar Kader ({{ $kaders->total() }})</div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No HP</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kaders as $kader)
                            <tr>
                                <td>{{ $kader->nama_kader }}</td>
                                <td>{{ $kader->username }}</td>
                                <td>{{ $kader->no_hp ?? '-' }}</td>
                                <td>
                                    <span class="role-badge role-{{ $kader->role }}">
                                        {{ ucfirst($kader->role) }}
                                    </span>
                                </td>
                                <td>
                                    @if((int) $kader->id_user !== (int) Auth::id())
                                        <form method="POST" action="{{ route('kader.destroy', $kader->id_user) }}" onsubmit="return confirm('Hapus akun {{ $kader->username }}?')" style="margin: 0">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn-icon" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span style="font-size: 12px; color: var(--g-muted)">Akun aktif</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrap">
                    {{ $kaders->links() }}
                </div>
            </div>

            <div class="card">
                <div class="form-card">
                    <h2><i class="bi bi-person-plus" style="color: var(--g-green)"></i> Tambah Kader</h2>
                    <form method="POST" action="{{ route('kader.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kader</label>
                            <input type="text" name="nama_kader" value="{{ old('nama_kader') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" required>
                                <option value="kader" {{ old('role') === 'kader' ? 'selected' : '' }}>Kader</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-submit">Simpan Kader</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>



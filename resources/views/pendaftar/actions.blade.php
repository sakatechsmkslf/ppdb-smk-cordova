<div class="btn-group" role="group">
    <a href="{{ route('pendaftaran.edit', $row->id) }}" class="btn btn-sm btn-warning" title="Edit">
        <i class="bi bi-pencil"></i>
    </a>

    <a href="{{ route('pendaftaran.show', $row->id) }}" class="btn btn-sm btn-info" title="Detail">
        <i class="bi bi-eye-fill"></i>
    </a>

    <form action="{{ route('pendaftaran.destroy', $row->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger btn-delete" title="Delete">
            <i class="bi bi-trash"></i>
        </button>
    </form>

    <button type="button"
        class="btn btn-sm btn-primary edit-status-btn"
        data-bs-toggle="modal"
        data-bs-target="#statusModal"
        data-id="{{ $row->id }}"
        data-nama="{{ $row->nama_lengkap }}"
        data-status="{{ $row->status }}">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>

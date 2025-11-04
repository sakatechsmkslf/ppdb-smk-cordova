<div class="btn-group" role="group" aria-label="Actions">
    <a href="{{ route('gelombang.edit', $row->id) }}" class="btn btn-sm btn-warning" title="Edit">
        <i class="bi bi-pencil"></i>
    </a>

    <a href="{{ route('gelombang.show', $row->id) }}" class="btn btn-sm btn-info" title="Detail">
        <i class="bi bi-eye-fill"></i>
    </a>

    <a href="{{ route('gelombang.print', $row->id) }}" target="_blank" class="btn btn-sm btn-success" title="Print">
        <i class="bi bi-printer"></i>
    </a>
</div>

<form action="{{ route('gelombang.destroy', $row->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-delete">
        <i class="bi bi-trash"></i>
    </button>
</form>

<td>
    <div class="hstack gap-3 flex-wrap">
        <a href="{{ route('admin.teachers.edit' , $id) }}" class="link-success fs-15 icon1"><i class="ri-edit-2-line"></i></a>
        <a href="#" class="link-danger fs-15 icon4" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{ $id }}"><i class="ri-delete-bin-line"></i></a>
    </div>
</td>


@php
    $teacher = App\Models\Teacher::where('id' , $id)->first();
@endphp


<!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal{{ $id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ route('admin.teachers.destroy' , $id) }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h5 >Are you Sure You want to Remove this Record ? </h5>
                                <p class="text-muted mx-4 mb-0">{{ $teacher->name }}</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger">Yes, Delete It!</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<!--end modal -->

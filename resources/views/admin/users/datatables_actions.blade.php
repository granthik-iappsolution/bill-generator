<div class="d-flex justify-content-end datatables_action">
    <a href="{{ route('admin.users.edit', $uuid) }}" title="Edit User" class="text-primary px-2 py-0">
        <i class="tf-icons bx bx-edit"></i></a>
    <div class="btn-group dropstart " title="More options">
        <a type="button" class="px-2 py-0 pe-0" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='tf-icons bx bx-dots-vertical-rounded'></i>
        </a>
        <ul class="dropdown-menu py-0">
            <li>
                <a href="{{ route('admin.users.changePassword.index', $uuid) }}" class="dropdown-item py-2">
                    <i class='bx bxs-key'></i>&nbsp;&nbsp;Change Password</a>
            </li>
            <li>
                <a class='dropdown-item py-2 bg-danger' href="javascript:void(0);"
                   style="color: white; padding-bottom: 10px"
                   onclick="ajaxCallDelete('{{ route('admin.users.destroy', $uuid) }}',
                    'Are you sure?', 'User-index')">
                    <i class='bx bxs-trash' ></i>&nbsp;&nbsp;Delete
                </a>
            </li>
        </ul>
    </div>
</div>


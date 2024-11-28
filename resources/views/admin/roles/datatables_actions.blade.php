<div class="d-flex justify-content-end datatables_action">
    <a href="{{ route('admin.roles.permissions.manage.index', $role->name) }}" title="Manage Permissions" class="text-primary px-2 py-0">
        <i class='bx bxs-key'></i></a>

    <div class="btn-group dropstart " title="More options">
        <a type="button" class="px-2 py-0 pe-0" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='tf-icons bx bx-dots-vertical-rounded'></i>
        </a>
        <ul class="dropdown-menu py-0">
            <li>
                <a class='dropdown-item py-2 bg-danger' href="javascript:void(0);"
                   style="color: white; padding-bottom: 10px"
                   onclick="ajaxCallDelete('{{ route('admin.roles.destroy', $role->name) }}',
                'Are you sure?', 'role-index')">
                    <i class='bx bxs-trash' ></i>&nbsp;&nbsp;Delete
                </a>
            </li>
        </ul>
    </div>
</div>



<li class="nav-item">
    <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is('admin.products*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Products</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.contactInquiries.index') }}" class="nav-link {{ Request::is('admin.contactInquiries*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Contact Inquiries</p>
    </a>
</li>

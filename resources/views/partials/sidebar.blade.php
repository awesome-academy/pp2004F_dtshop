<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>Navigation</span>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-gauge"></i>
                    </span>
                    <span class="title">Category</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a href="{{route('categories.index')}}">All Categories</a>
                    </li>
                    <li>
                        <a href="{{route('categories.create')}}">New Category</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-gauge"></i>
                    </span>
                    <span class="title">Menu</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a href="{{route('menus.index')}}">All Menus</a>
                    </li>
                    <li>
                        <a href="{{route('menus.create')}}">New Menu</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-gauge"></i>
                    </span>
                    <span class="title">Product</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a href="{{route('product.index')}}">All Products</a>
                    </li>
                    <li>
                        <a href=" ">New Product</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="mdi mdi-gauge"></i>
                    </span>
                    <span class="title">Discount</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a href="{{route('dis')}}">All Discount</a>
                    </li>
                    <li>
                        <a href="{{route('create_discount')}}">New Discount</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
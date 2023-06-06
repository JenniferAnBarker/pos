<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
    
                <li>
                    <a href="{{ url('/dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
    
                <li>
                    <a href="{{ route('pos')}}">
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> POS </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Manage Customers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.customers')}}">All Customers</a>
                            </li>
                            <li>
                                <a href="{{ route('add.customer')}}">Add Customer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Manage Suppliers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.suppliers')}}">All Suppliers</a>
                            </li>
                            <li>
                                <a href="{{ route('add.supplier')}}">Add Supplier</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Manage Employees </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.employee')}}">All Employees</a>
                            </li>
                            <li>
                                <a href="{{ route('add.employee')}}">Add an Employee</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSalary" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Salaries </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSalary">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.advance.salary')}}">Add Advance Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('all.advance.salary')}}">All Advances</a>
                            </li>
                            <li>
                                <a href="{{ route('pay.salary')}}">Pay Salary</a>
                            </li>
                            <li>
                                <a href="{{ route('previous.salary')}}">Previous Salaries</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#attendance" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="attendance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('employee.attendance.list')}}">Employee Attendance</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a href="#category" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category')}}">All Categories</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a href="#products" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="products">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.product')}}">All Products</a>
                            </li>
                            <li>
                                <a href="{{ route('add.product')}}">Add Products</a>
                            </li>
                            <li>
                                <a href="{{ route('import.product')}}">Import Products</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#orders" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Orders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('pending.orders')}}">Pending Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('complete.orders')}}">Complete Orders</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#stock" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Manage Stock </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('manage.stock')}}">Stock</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#permission" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Roles and Permissions </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="permission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.permissions')}}">All Permissions</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles')}}">All Roles</a>
                            </li>
                            <li>
                                <a href="{{ route('add.roles.permission')}}">Roles in Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles.permission')}}">All Roles in Permission</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#admin" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Admin Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admin')}}">All Admin</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admin')}}">Add Admin</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- ///////////////////////////////////////////////////////////////////////////////////////// --}}

                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Expense </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.expense')}}">Add Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('daily.expense')}}">Daily Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('month.expense')}}">Monthy Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('year.expense')}}">Yearly Expense</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>
                            <li>
                                <a href="pages-sitemap.html">Sitemap</a>
                            </li>
                            <li>
                                <a href="pages-invoice.html">Invoice</a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
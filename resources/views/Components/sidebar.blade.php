<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="ic-sidenav">
            <div class="ic-sidenav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-home"></i>
                            <span class="nav-text">Club</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('club.create')}}">Create </a></li>
                            <li><a href="{{route('club.list')}}">List</a></li>
                            <li><a href="{{route('club.admform')}}">Club Administrator</a></li>
                            
                        </ul>
                    </li>
                     <li><a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
                            <i class="flaticon flaticon-user-1"></i>
                            <span class="nav-text">Team a</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Create </a></li>
                            <li><a href="#">List</a></li>
                            
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
                            <i class="flaticon-cms"></i>
                            <span class="nav-text">Administrator</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Create </a></li>
                            <!-- <li><a href="#">List</a></li> -->
                            
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
                            <i class="flaticon-cms"></i>
                            <span class="nav-text">Player</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('player.add')}}">Player administrator </a></li>
                            <!-- <li><a href="#">List</a></li> -->
                            
                        </ul>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-calendar-2"></i>
                            <span class="nav-text">Roster</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-price-tag"></i>
                            <span class="nav-text">Payment</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-incoming-message"></i>
                            <span class="nav-text">Notification</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-calendar-1"></i>
                            <span class="nav-text">Events</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-grid"></i>
                            <span class="nav-text">Schedule</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-bar-chart"></i>
                            <span class="nav-text">Chat</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-phone-book"></i>
                            <span class="nav-text">Contact us</span>
                        </a>
                    </li>




                    <!-- <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-cms"></i>
                            <span class="nav-text">CMS</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="content.html">Content</a></li>
                            <li><a href="content-add.html">Add Content</a></li>
                            <li><a href="menu.html">Menus</a></li>
                            <li><a href="email-template.html">Email Template</a></li>
                            <li><a href="add-email.html">Add Email</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="add-blog.html">Add Blog</a></li>
                            <li><a href="blog-category.html">Blog Category</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon flaticon-user-1"></i>
                            <span class="nav-text">Profile</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="profile/overview.html">Overview</a></li>
                            <li><a href="profile/projects.html">Projects</a></li>
                            <li><a href="profile/projects-details.html">Projects Details</a></li>
                            <li><a href="profile/campaigns.html">Campaigns</a></li>
                            <li><a href="profile/documents.html">Documents</a></li>
                            <li><a href="profile/followers.html">Followers</a></li>
                            <li><a href="profile/activity.html">Activity</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon flaticon-app"></i>
                            <span class="nav-text">Account</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="account/overview.html">Overview</a></li>
                            <li><a href="account/settings.html">Settings</a></li>
                            <li><a href="account/security.html">Security</a></li>
                            <li><a href="account/activity.html">Activity</a></li>
                            <li><a href="account/billing.html">Billing</a></li>
                            <li><a href="account/statements.html">Statements</a></li>
                            <li><a href="account/referrals.html">Referrals</a></li>
                            <li><a href="account/api-keys.html">Api keys</a></li>
                            <li><a href="account/logs.html">Logs</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon flaticon-app"></i>
                            <span class="nav-text">AIKit</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="aikit/auto-write.html">Auto Write</a></li>
                            <li><a href="aikit/scheduled.html">Scheduled</a></li>
                            <li><a href="aikit/repurpose.html">Repurpose</a></li>
                            <li><a href="aikit/rss.html">RSS</a></li>
                            <li><a href="aikit/chatbot.html">Chatbot</a></li>
                            <li><a href="aikit/fine-tune-models.html">Fine Tune Models</a></li>
                            <li><a href="aikit/prompt.html">Prompt</a></li>
                            <li><a href="aikit/setting.html">Setting</a></li>
                            <li><a href="aikit/import.html">Import</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-user"></i>
                            <span class="nav-text">User</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="app-profile.html">Profile</a></li>
                            <li><a href="edit-profile.html">Edit Profile</a></li>
                            <li><a href="post-details.html">Post Details</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-blog"></i>
                            <span class="nav-text">Blog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="blog-post.html">Blog Post</a></li>
                            <li><a href="blog-home.html">Blog Home</a></li>
                        </ul>
                    </li>
                    <li><a href="pricing.html" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-price-tag"></i>
                            <span class="nav-text">Pricing</span>
                        </a>
                    </li>
                    <li class="menu-title">Apps</li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-shopping-bag"></i>

                            <span class="nav-text">Ecommerce</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Categories</a>
                                <ul aria-expanded="false">
                                    <li><a href="category-table.html">Category Table</a></li>
                                    <li><a href="add-categary.html">Add Category</a></li>
                                    <li><a href="edit-categary.html">Edit Category</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Products</a>
                                <ul aria-expanded="false">
                                    <li><a href="product-table.html">Product Table</a></li>
                                    <li><a href="add-product.html">Add product</a></li>
                                    <li><a href="edit-product.html">Edit Product</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Shop</a>
                                <ul aria-expanded="false">
                                    <li><a href="ecom-product-grid.html">Product Grid</a></li>
                                    <li><a href="ecom-product-list.html">Product List</a></li>
                                    <li><a href="ecom-product-detail.html">Product Details</a></li>
                                    <li><a href="ecom-product-order.html">Order</a></li>
                                    <li><a href="ecom-checkout.html">Checkout</a></li>
                                    <li><a href="ecom-invoice.html">Invoice</a></li>
                                    <li><a href="ecom-customers.html">Customers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-rocket"></i>
                            <span class="nav-text">Projects</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="project-list.html">Project List</a></li>
                            <li><a href="project-card.html">Project Card</a></li>
                            <li><a href="add-project.html">Add Project</a></li>
                        </ul>
                    </li>
                    <li><a href="note.html" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-notes"></i>
                            <span class="nav-text">Notes</span>
                        </a>
                    </li>
                    <li><a href="file-manger.html" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-approved"></i>
                            <span class="nav-text">File Manager</span>
                        </a>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-phone-book"></i>
                            <span class="nav-text">Contacts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="contact-list.html">Contact List</a></li>
                            <li><a href="contact-card.html">Contact Card</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-email"></i>
                            <span class="nav-text">Inbox</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">Compose</a></li>
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calender.html" class aria-expanded="false">
                            <i class="flaticon-calendar-2"></i>
                            <span class="nav-text">Calender</span>
                        </a>
                    </li>
                    <li class="menu-title">Components</li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-bar-chart"></i>
                            <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="apex.html">Apex Chart</a></li>
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chart-chartjs.html">Chartjs</a></li>
                            <li><a href="chart-chartist.html">Chartist</a></li>
                            <li><a href="chart-sparkline.html">Sparkline</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-web"></i>
                            <span class="nav-text">Bootstrap</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="ui-accordion.html">Accordion</a></li>
                            <li><a href="ui-alert.html">Alert</a></li>
                            <li><a href="ui-badge.html">Badge</a></li>
                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-modal.html">Modal</a></li>
                            <li><a href="ui-button-group.html">Button Group</a></li>
                            <li><a href="ui-list-group.html">List Group</a></li>
                            <li><a href="ui-card.html">Cards</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>
                            <li><a href="ui-popover.html">Popover</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-pagination.html">Pagination</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-puzzle"></i>
                            <span class="nav-text">Plugins</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="uc-select2.html">Select 2</a></li>
                            <li><a href="uc-nestable.html">Nestedable</a></li>
                            <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="map-jqvmap.html">Jqv Map</a></li>
                            <li><a href="uc-lightgallery.html">Light Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="widget-basic.html" class aria-expanded="false">
                            <i class="flaticon-app"></i>
                            <span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-registration"></i>
                            <span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="form-element.html">Form Elements</a></li>
                            <li><a href="form-wizard.html">Wizard</a></li>
                            <li><a href="form-ckeditor.html">CkEditor</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation.html">Form Validate</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-grid"></i>
                            <span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-file"></i>
                            <span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="page-error-400.html">Error 400</a></li>
                                    <li><a href="page-error-403.html">Error 403</a></li>
                                    <li><a href="page-error-404.html">Error 404</a></li>
                                    <li><a href="page-error-500.html">Error 500</a></li>
                                    <li><a href="page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="page-lock-screen.html">Lock Screen</a></li>
                            <li><a href="empty-page.html">Empty Page</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
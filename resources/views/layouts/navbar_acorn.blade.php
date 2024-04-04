<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="Dashboards.Default.html">
            <!-- Logo can be added directly -->
            <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

            <!-- Or added via css to provide different ones for different color themes -->
            <div class="img"></div>
        </a>
    </div>
    <!-- Logo End -->

    <!-- Language Switch Start -->
    <div class="language-switch-container">
        <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">EN</button>
        <div class="dropdown-menu">
            <a href="#" class="dropdown-item">DE</a>
            <a href="#" class="dropdown-item active">EN</a>
            <a href="#" class="dropdown-item">ES</a>
        </div>
    </div>
    <!-- Language Switch End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="profile" alt="profile" src="img/profile/profile-9.webp" />
            <div class="name">Lisa Jackson</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">ACCOUNT</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">User Info</a>
                        </li>
                        <li>
                            <a href="#">Preferences</a>
                        </li>
                        <li>
                            <a href="#">Calendar</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Security</a>
                        </li>
                        <li>
                            <a href="#">Billing</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                    <div class="text-extra-small text-primary">APPLICATION</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Themes</a>
                        </li>
                        <li>
                            <a href="#">Language</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Devices</a>
                        </li>
                        <li>
                            <a href="#">Storage</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Help</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Docs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true"
                aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <i data-acorn-icon="bell" data-acorn-size="18"></i>
                    <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                    <ul class="list-unstyled border-last-none">
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center"
                                alt="..." />
                            <div class="align-self-center">
                                <a href="#">Joisse Kaycee just sent a new comment!</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center"
                                alt="..." />
                            <div class="align-self-center">
                                <a href="#">New order received! It is total $147,20.</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center"
                                alt="..." />
                            <div class="align-self-center">
                                <a href="#">3 items just added to wish list by a user!</a>
                            </div>
                        </li>
                        <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center"
                                alt="..." />
                            <div class="align-self-center">
                                <a href="#">Kirby Peters just sent a new message!</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="#dashboards" data-href="Dashboards.html">
                    <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboards</span>
                </a>
                <ul id="dashboards">
                    <li>
                        <a href="Dashboards.Default.html">
                            <span class="label">Default</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboards.Visual.html">
                            <span class="label">Visual</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboards.Analytic.html">
                            <span class="label">Analytic</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#apps" data-href="Apps.html">
                    <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                    <span class="label">Apps</span>
                </a>
                <ul id="apps">
                    <li>
                        <a href="Apps.Calendar.html">
                            <span class="label">Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Chat.html">
                            <span class="label">Chat</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Contacts.html">
                            <span class="label">Contacts</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Mailbox.html">
                            <span class="label">Mailbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Tasks.html">
                            <span class="label">Tasks</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pages" data-href="Pages.html">
                    <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                    <span class="label">Pages</span>
                </a>
                <ul id="pages">
                    <li>
                        <a href="#authentication" data-href="Pages.Authentication.html">
                            <span class="label">Authentication</span>
                        </a>
                        <ul id="authentication">
                            <li>
                                <a href="Pages.Authentication.Login.html">
                                    <span class="label">Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Authentication.Register.html">
                                    <span class="label">Register</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Authentication.ForgotPassword.html">
                                    <span class="label">Forgot Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Authentication.ResetPassword.html">
                                    <span class="label">Reset Password</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#blog" data-href="Pages.Blog.html">
                            <span class="label">Blog</span>
                        </a>
                        <ul id="blog">
                            <li>
                                <a href="Pages.Blog.Home.html">
                                    <span class="label">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Blog.Grid.html">
                                    <span class="label">Grid</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Blog.List.html">
                                    <span class="label">List</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Blog.Detail.html">
                                    <span class="label">Detail</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#miscellaneous" data-href="Pages.Miscellaneous.html">
                            <span class="label">Miscellaneous</span>
                        </a>
                        <ul id="miscellaneous">
                            <li>
                                <a href="Pages.Miscellaneous.Faq.html">
                                    <span class="label">Faq</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.KnowledgeBase.html">
                                    <span class="label">Knowledge Base</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.Error.html">
                                    <span class="label">Error</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.ComingSoon.html">
                                    <span class="label">Coming Soon</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.Pricing.html">
                                    <span class="label">Pricing</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.Search.html">
                                    <span class="label">Search</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.Mailing.html">
                                    <span class="label">Mailing</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Miscellaneous.Empty.html">
                                    <span class="label">Empty</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#portfolio" data-href="Pages.Portfolio.html">
                            <span class="label">Portfolio</span>
                        </a>
                        <ul id="portfolio">
                            <li>
                                <a href="Pages.Portfolio.Home.html">
                                    <span class="label">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Portfolio.Detail.html">
                                    <span class="label">Detail</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#profile" data-href="Pages.Profile.html">
                            <span class="label">Profile</span>
                        </a>
                        <ul id="profile">
                            <li>
                                <a href="Pages.Profile.Standard.html">
                                    <span class="label">Standard</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Profile.Settings.html">
                                    <span class="label">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#blocks" data-href="Blocks.html">
                    <i data-acorn-icon="grid-5" class="icon" data-acorn-size="18"></i>
                    <span class="label">Blocks</span>
                </a>
                <ul id="blocks">
                    <li>
                        <a href="Blocks.Cta.html">
                            <span class="label">Cta</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Details.html">
                            <span class="label">Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Gallery.html">
                            <span class="label">Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Images.html">
                            <span class="label">Images</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.List.html">
                            <span class="label">List</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Stats.html">
                            <span class="label">Stats</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Steps.html">
                            <span class="label">Steps</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.TabularData.html">
                            <span class="label">Tabular Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Thumbnails.html">
                            <span class="label">Thumbnails</span>
                        </a>
                    </li>
                    <li>
                        <a href="Blocks.Users.html">
                            <span class="label">Users</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->

        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->

        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>

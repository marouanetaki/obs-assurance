<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none" style="background-color: black;">
        {{-- <a class="c-sidebar-brand-full h4" href="#"> --}}
        <a href="/login" rel="home">
            <img src="https://plazza.orange.com//themes/orange-global/favicon.ico" alt="consalti" height="30" >
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-location-arrow c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('beneficiaire_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.beneficiaires.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiaires") || request()->is("admin/beneficiaires/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.beneficiaire.title') }}
                </a>
            </li>
        @endcan
        @can('dossier_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.dossiers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/dossiers") || request()->is("admin/dossiers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-folder-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.dossier.title') }}
                </a>
            </li>
        @endcan
        @can('accident_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.accidents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/accidents") || request()->is("admin/accidents/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-ticket-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.accident.title') }}
                </a>
            </li>
        @endcan
        @can('prise_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.prises.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/prises") || request()->is("admin/prises/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-address-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.prise.title') }}
                </a>
            </li>
        @endcan
        @can('facture_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.factures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/factures") || request()->is("admin/factures/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-money-bill-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.facture.title') }}
                </a>
            </li>
        @endcan
        @can('sante_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/medecins*") ? "c-show" : "" }} {{ request()->is("admin/specialites*") ? "c-show" : "" }} {{ request()->is("admin/cliniques*") ? "c-show" : "" }} {{ request()->is("admin/medicaments*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hand-holding-heart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sante.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('medecin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.medecins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/medecins") || request()->is("admin/medecins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.medecin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('specialite_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.specialites.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/specialites") || request()->is("admin/specialites/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-notes-medical c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.specialite.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('clinique_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cliniques.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cliniques") || request()->is("admin/cliniques/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hospital-symbol c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinique.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('medicament_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.medicaments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/medicaments") || request()->is("admin/medicaments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase-medical c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.medicament.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
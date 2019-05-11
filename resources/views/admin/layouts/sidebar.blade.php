<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/admin/images/admin.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-item ">
                    <a href="{{url('/admin/home')}}" class="nav-link @if($active == 'home') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('users.edit', ['id' => Auth::user()->id])}}" class="nav-link @if($active == 'users_edit') active @endif">
                        <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                        <p>Admin Information</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'plans') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Recipes Plans
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('plans.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'plans_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Recipes Plans List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('plans.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_plan') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Plan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('/admin/plans/trash')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'trash') active  @endif">
                                <i class="fa fa-trash nav-icon" aria-hidden="true"></i>
                                <p>Trash</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'recipe') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Recipe
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('recipes.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'recipe_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Recipe List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('recipes.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_recipe') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Recipe</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'instruction') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Instruction
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('instructions.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'instruction_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Instruction List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('instructions.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_instruction') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Instruction</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'subscribe') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Subscribe
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('subscribes.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'subscribe_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Subscribe List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('subscribes.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_subscribe') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Subscribe</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'order') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Order
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('orders.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'order_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Order List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('orders.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_order') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Order</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'component') active  @endif">
                            <i class="nav-icon fa fa-table"></i>
                        <p>
                            Main Component
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('components.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'component_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Main Component List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('components.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_component') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Main Component</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'dish') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Dishes
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('dishes.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'dish_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Dishes List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('dishes.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_dish') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Dishes</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'season') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Seasonal Recipes
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('seasons.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'season_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Seasonal Recipes List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('seasons.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_season') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Seasonal Recipes</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'nutrition') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Nutrition
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('nutritions.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'nutrition_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Nutrition List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('nutritions.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_nutrition') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Nutrition</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'date') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Date
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('dates.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'date_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Date List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('dates.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_date') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Date</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'tag') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Tag
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('tags.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'tag_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Tag List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('tags.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_tag') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Tag</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'put') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Put
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('puts.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'put_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Put List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('puts.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_put') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Put</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'contain') active  @endif">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Ingredients
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('contains.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'contain_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>Ingredients List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('contains.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_contain') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create Ingredients</p>
                            </a>
                        </li>

                    </ul>
                </li>
               
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @if($active == 'faq') active  @endif">
                            <i class="nav-icon fa fa-question"></i>
                        <p>
                            FAQ
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('faq.index')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'faq_list') active  @endif">
                                <i class="fa fa-list nav-icon" aria-hidden="true"></i>
                                <p>FAQ List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('faq.create')}}" class="nav-link @if(isset($sub_active) && $sub_active == 'create_faq') active  @endif">
                                <i class="fa fa-plus nav-icon" aria-hidden="true"></i>
                                <p>Create FAQ</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('settings.edit', ['id' => 1])}}" class="nav-link @if($active == 'settings') active @endif">
                        <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
                        <p>Website Settings</p>
                    </a>
                </li>
                

            </ul>
        </nav>

    </div>

</aside>
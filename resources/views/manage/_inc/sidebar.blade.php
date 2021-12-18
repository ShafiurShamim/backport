<div class="text-right lg:hidden">
    <button id="btnSidebarClose" class="focus:outline-none pt-4 pr-4">
    <i class="fa fa-times"></i>
    </button>
</div>
<!-- sidebar content -->
 <div class="flex flex-col pl-6 pb-6 lg:p-6">

  <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

  <!-- link -->
  <a href="{{ route('manage.dashboard') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
    <i class="text-xs mr-2"></i>                
    Dashboard
  </a>
  <!-- end link -->
  
  <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Users</p>

  <!-- link -->
  <a href="{{ route('manage.admins.index') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
    <i class="text-xs mr-2"></i>
    Admins
  </a>
  <!-- end link -->
  <!-- link -->
  <a href="{{ route('manage.users.index') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
    <i class="text-xs mr-2"></i>
    General Users
  </a>
  <!-- end link -->
  <!-- link -->
  <a href="{{route('manage.roles.index')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
    <i class="text-xs mr-2"></i>
    Roles
  </a>
  <!-- end link -->
    <!-- link -->
    <a href="{{route('manage.permissions.index')}}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
      <i class="text-xs mr-2"></i>
      Permissions
    </a>
    <!-- end link -->
    
</div>
<!-- end sidebar content -->


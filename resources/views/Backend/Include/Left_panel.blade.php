<div class="br-logo"><a href=""><span>[</span>Pointsoft <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('home') }}" class="br-menu-link  {{ Route::is('home') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="{{route('sale.create')}}" class="br-menu-link {{ Route::is('sale.create') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Sale File Upload</span>
          </a>

          <a href="{{route('sale.list')}}" class="br-menu-link {{ Route::is('sale.list') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Sale List</span>
          </a>
        </li>

       
        
      </ul><!-- br-sideleft-menu -->

     
     

      <br>
    </div><!-- br-sideleft -->
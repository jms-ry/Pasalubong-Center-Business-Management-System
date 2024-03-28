<div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel" data-bs-backdrop="false">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-light fw-bold" id="sidebarLabel">Store Administration</h5>
    <button type="button" class="btn-close btn-close-white fw-bold" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="d-grid gap-2">
      <button class="btn btn-lg btn-outline-success fw-bold text-light" type="button" onclick="window.location.href='/dashboard'">
        <div class="d-flex align-items-center">
          <i class="bi bi-grid me-2 fs-3"></i>
          <span class="flex-grow-1">Dashboard</span>
        </div>
      </button>
      <button class="btn btn-lg btn-outline-success fw-bold text-light" type="button" onclick="window.location.href='/point-of-sale'">
        <div class="d-flex align-items-center">
          <i class="bi bi-pc-display-horizontal me-2 fs-3"></i>
          <span class="flex-grow-1">Point of Sales</span>
        </div>
      </button>
      <button class="btn btn-lg btn-outline-success fw-bold text-light" type="button" onclick="window.location.href='/employees'">
        <div class="d-flex align-items-center">
          <i class="bi bi-people me-2 fs-3"></i>
          <span class="flex-grow-1">Employees</span>
        </div>
      </button>
      <button class="btn btn-lg btn-outline-success fw-bold text-light" type="button" onclick="window.location.href='/customers'">
        <div class="d-flex align-items-center">
          <i class="bi bi-person-vcard-fill me-2 fs-3"></i>
          <span class="flex-grow-1">Customers</span>
        </div>
      </button>
      <button class="btn btn-lg btn-outline-success fw-bold text-light" type="button" onclick="window.location.href='/suppliers'">
        <div class="d-flex align-items-center">
          <i class="bi bi-truck me-2 fs-3"></i>
          <span class="flex-grow-1">Suppliers</span>
        </div>
      </button>
      <button type="button" class="btn btn-lg btn-outline-success fw-bold text-light" data-bs-toggle="collapse" data-bs-target="#salesManagementCollapse">
        <div class="d-flex align-items-center">
          <i class="bi bi-currency-dollar me-2 fs-3"></i>
          <span class="flex-grow-1">Sales Management</span>
          <i class="bi bi-caret-right-fill"></i>
        </div>
      </button>
      <div class="collapse" id="salesManagementCollapse">
        <div class="card card-body d-grid gap-2 bg-light">
          <button class="btn btn-sm btn-outline-info fw-bold text-dark" type="button" onclick="window.location.href='/products'">
            <div class="d-flex align-items-center ">
              <i class="bi bi-cart3 me-2 fs-3"></i>
              <span class="flex-grow-1">Product Inventory</span>
            </div>
          </button>
          <button class="btn btn-sm btn-outline-info fw-bold text-dark" type="button" onclick="window.location.href='/sales'">
            <div class="d-flex align-items-center">
              <i class="bi bi-table me-2 fs-3"></i>
              <span class="flex-grow-1">Products Sales</span>
            </div>
          </button>
        </div>
      </div>
      <button type="button" class="btn btn-lg btn-outline-success fw-bold text-light" data-bs-toggle="collapse" data-bs-target="#timeManagementCollapse">
        <div class="d-flex align-items-center">
          <i class="bi bi-clock-history me-2 fs-3"></i>
          <span class="flex-grow-1">Time Management</span>
          <i class="bi bi-caret-right-fill"></i>
        </div>
      </button>
      <div class="collapse" id="timeManagementCollapse">
        <div class="card card-body d-grid gap-2 bg-light">
          <button class="btn btn-sm btn-outline-info fw-bold text-dark" type="button" onclick="window.location.href='/logs'">
            <div class="d-flex align-items-center">
              <i class="bi bi-copy me-2 fs-3"></i>
              <span class="flex-grow-1">Activity Logs</span>
            </div>
          </button>
          <button class="btn btn-sm btn-outline-info fw-bold text-dark" type="button" onclick="window.location.href='/dtrs'">
            <div class="d-flex align-items-center">
              <i class="bi bi-calendar-check me-2 fs-3"></i>
              <span class="flex-grow-1">Daily Time Record</span>
            </div>
          </button>
        </div>
      </div>
      <button class="btn btn-lg btn-outline-success fw-bold text-light" type="button" onclick="window.location.href='/accounts'">
        <div class="d-flex align-items-center ">
          <i class="bi bi-person-workspace me-2 fs-3"></i>
          <span class="flex-grow-1">Accounts</span>
        </div>
      </button>
    </div>
  </div>
</div>

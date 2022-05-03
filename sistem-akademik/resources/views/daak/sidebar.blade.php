@section('sidebar')
      <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="nav-pills sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Layanan Administrasi</li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/daak') }}">
          <i style="color: inherit" class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/daak/jadwal-kuliah') }}">
          <i style="color: inherit" class="bi bi-calendar"></i>
          <span>Jadwal Kuliah</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/daak/matakuliah-kurikulum') }}">
          <i style="color: inherit" class="bi bi-qr-code"></i>
          <span>Matakuliah & Kurikulum</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/daak/pengumuman') }}">
          <i style="color: inherit" class="bi bi-card-list"></i>
          <span>Pengumuman</span>
        </a>
      </li>

      <li class="nav-heading">Pengaturan</li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/daak/mahasiswa') }}">
          <i style="color: inherit" class="bi bi-gear"></i>
          <span>Akun Mahasiswa</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="{{ url('/daak/dosen') }}">
            <i style="color: inherit" class="bi bi-gear"></i>
            <span>Akun Dosen</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/daak/pengguna') }}">
            <i style="color: inherit" class="bi bi-gear"></i>
            <span>Akun Pengguna</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">
          <i style="color: inherit" class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
    <script  src="{{ url("/js/pagerJSTable.js")  }}" ></script>
    <script>
        const navItemsElems = document.getElementsByClassName("nav-link");
        for (const i of navItemsElems){
            if(window.location.href.split('?')[0] == i.getAttribute("href")){
                i.classList.add("active");
                break;
            }
            console.log(i.getAttribute("href"));
        }
        function modalConfirmDeletion(idDeleteVal = -1, modalID = "modal-body-delete") {
            const modalHapusDosen = document.getElementById(modalID);
            modalHapusDosen.innerHTML = `
                <label for="validationCustom02" class="form-label">Tuliskan kembali <code>${idDeleteVal}</code> untuk konfirmasi :</label>
                <input onkeyup="checkInputEnableButtonSubmit(this,${idDeleteVal})" autocomplete="off" type="text" class="form-control was-validated" name="nomor_induk" placeholder="${idDeleteVal}" required>
                <div class="valid-feedback">
                    Tuliskan <code>${idDeleteVal}</code>
                </div>
                `;
        }
        function checkInputEnableButtonSubmit(el,valueCheck = -1, btnConfirmID = "btnDeleteConfirm") {
            const btnHapusDosenConfirm = document.getElementById(btnConfirmID);
            if(el.value == valueCheck){
                btnHapusDosenConfirm.disabled = false;
            }else{
                btnHapusDosenConfirm.disabled = true;
            }
        }
        function filterRedirect(el,destination){
            window.location.replace('{{ url('/') }}' + destination + el.value);
        }

        // Type Alerts = primary,secondary,success, danger
        function showAlerts(typeAlert='primary', message) {
            const sectionElement = document.getElementById('alertsSection');
            if(sectionElement == null){
                return;
            }
            sectionElement.innerHTML += `
              <div class="alert alert-${typeAlert} bg-${typeAlert} text-light border-0 alert-dismissible fade show" role="alert">
                 ${message}
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            `;
        }

        function scanAlertsURL(){
            let params = (new URL(document.location)).searchParams;
            if(params.get("err") == null || params.get("msg") == null){
                console.log(params.get("err") );
                return;
            }
            showAlerts(params.get("err"), params.get("msg"));
        }

        function setYearLimitDate(elIDDateField="datefield", limitYear = -5){
            let today = new Date();
            let dd = today.getDate();
            let mm = today.getMonth()+1; //January is 0!
            let yyyy = today.getFullYear() + limitYear;
            if(dd<10){
                dd='0'+dd
            }
            if(mm<10){
                mm='0'+mm
            }
            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById(elIDDateField).setAttribute("max", today);
        }

    </script>

  </aside><!-- End Sidebar-->
@endsection

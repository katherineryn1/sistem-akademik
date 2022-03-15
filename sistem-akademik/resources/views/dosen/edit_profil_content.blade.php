<main id="main" class="main container">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Edit Profil</h3>
    </div>

    <div class="card" style="padding: 15px;">
        <h4 style="font-weight: bold;">Ubah Email</h4>

        <form>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="textboxEmail" class="col-form-label">Email</label>
                </div>
                <label class="col-form-label">:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="textboxEmail">
                </div>
            </div>

            <button class="btn btn-primary" type="button" id="buttonUbahEmail"
                style="background-color: #33297D;">Ubah Email</button>
        </form>
    </div>

    <div class="card" style="padding: 15px;">
        <h4 style="font-weight: bold;">Ubah Password</h4>

        <form>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="textboxPasswordLama" class="col-form-label">Password lama</label>
                </div>
                <label class="col-form-label">:</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="textboxPasswordLama">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="textboxPasswordBaru" class="col-form-label">Password baru</label>
                </div>
                <label class="col-form-label">:</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="textboxPasswordBaru">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="textboxKonfirmasi" class="col-form-label">Konfirmasi password baru</label>
                </div>
                <label class="col-form-label">:</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="textboxKonfirmasi">
                </div>
            </div>

            <button class="btn btn-primary" type="button" id="buttonUbahPassword"
                style="background-color: #33297D;">Ubah Password</button>
        </form>
    </div>
</main>

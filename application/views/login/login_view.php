<section class="d-flex justify-content-center mt-5">
    <div class="card text-center col-8">
        <div class="card-header">
            Loggin Access
        </div>
        <div class="card-body">
            <form id="form_login" action="access" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="example@mail.com" required minlength="4" maxlength="255">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required minlength="8" maxlength="100h">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            By Antonio Razo
        </div>
    </div>
</section>